<?php

use BearTemplate\BearTemplate;

//error_reporting(E_ALL);
//ini_set('display_errors', '1');


session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/auth.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");

$ac = $_REQUEST['ac'];


/*
 *  광고 신청 관련 DB 처리 Process
 *  1) ad_company에
 *     - 광고신청자 정보 저장 (있으면 update, 없으면 insert) , 자동차는 예외적으로 저장하지 않음
 *  2) 각 광고 종류별로 테이블에 광고 정보 등록
 *     - 구인구직 : community_recruit_listings, community_recruit_listings_sub
 *     - 비지니스 : community_business
 *     - 자동차 : community_car_dealers
 *  3) ad_payments에 결제 정보등록
 *     - 광고신청자 결제정보 저장
 *
 */
if($ac == "write_advertisement") {
    
    $db->transactionBegin();

    try {

       
        // 공통 입력
        $validity_period = $_POST['validity_period'] ?? 1;
        $is_crmls_member = $_POST['is_crmls_member'] ?? "";
        $agent_dre_license = $_POST['agent_dre_license'] ?? "";
        $desired_start_date = CONVERT_DATE_FORMAT($_POST['desired_start_date'] ?? ""); 
        $desired_end_date = ADD_MONTHS_TO_DATE($desired_start_date,$validity_period);

        $office_mls_id = $_POST['office_mls_id'] ?? "";
        $office_name = $_POST['office_name'] ?? "";
        $office_phone = $_POST['office_phone'] ?? "";
        $office_email = $_POST['office_email'] ?? "";
        $office_address1 = $_POST['office_address1'] ?? "";
        $office_address2 = $_POST['office_address2'] ?? "";
        $office_state = $_POST['office_state'] ?? "";
        $office_city = $_POST['office_city'] ?? "";
        $office_zip = $_POST['office_zip'] ?? "";
        
        $agent_key = $_POST['agent_key'] ?? "";
        $specialized_field = $_POST['specialized_field'] ?? "-1";        
        $agent_full_name = $_POST['agent_full_name'] ?? "";
        $agent_phone = $_POST['agent_phone'] ?? "";
        $agent_email = $_POST['agent_email'] ?? "";
        $self_introduction = $_POST['self_introduction'] ?? ""; 
        
        
        $main_image_url = "";
        $logo_image_url = "";
        
        if ($_FILES['main_image_url']['size'] > 0) $main_image_url = $_FILES['main_image_url']['name'];
        if ($_FILES['logo_image_url']['size'] > 0) $logo_image_url = $_FILES['logo_image_url']['name'];       
        
        $today = date("Ymd");
    
        if($desired_start_date <= $today && $today <= $desired_end_date) $has_active_advertisement = 1;
        else $has_active_advertisement = 0;
                
        if($is_crmls_member == "N") {
            
            // dre#을 입력한 경우만
            if($agent_dre_license != "") {
                $sql = "SELECT realestate_agent_id FROM realestate_agents where agent_dre_license = :agent_dre_license";            
                $placeholders = ['agent_dre_license' => $agent_dre_license];
                $result = $db->query($sql, $placeholders);
                $row = $db->fetch();
                if(!empty($row)) {
                    
                    $result_data = [
                        "status" => "fail",
                        "msg" => "사용중인 DRE Lic# 입니다."

                    ];

                    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
                    exit;
                    
                }
            }
            
            $seq = GET_REALESTATE_KEY($db);
            
            $office_key = "O".$seq;
            
            $insert_values = array(
                'office_key' => $office_key,
                'office_name' => $office_name,
                'office_mls_id' => $office_mls_id,
                'office_phone' => $office_phone,
                'office_email' => $office_email,
                'office_address1' => $office_address1,
                'office_address2' => $office_address2,
                'office_city' => $office_city,
                'office_state' => $office_state,
                'office_zip' => $office_zip,
                'logo_image_url' => $logo_image_url,
                'is_active' => 1,
                'is_show_website' => 1
            );

            $result = $db->insert('realestate_office', $insert_values);
            if ($result == false) throw new Exception("realestate_office insert fail");
            unset($insert_values);
            
            $insert_values = array(
                'agent_key' => "A".$seq,
                'specialized_field' => $specialized_field,
                'agent_full_name' => $agent_full_name,
                'agent_dre_license' => $agent_dre_license,
                'agent_phone' => $agent_phone,
                'agent_email' => $agent_email,
                'office_key' => $office_key,
                'office_name' => $office_name,
                'main_image_url' => $main_image_url,
                'is_show_website' => 1,
                'is_approved' => 0,
                'has_active_advertisement' => $has_active_advertisement,
                'user_id' => $SS_ID,
                'self_introduction' => $self_introduction,
                'is_active' => 1
                
            );

            $result = $db->insert('realestate_agents', $insert_values);
            if ($result == false) throw new Exception("realestate_agents insert fail");
            $realestate_agent_id = $db->getLastInsertId();
            unset($insert_values);
                        
            
        }
        else {
                        
            $realestate_agent_id = $_POST['realestate_agent_id'] ?? ""; 
            
            $sql = "SELECT realestate_agent_id,office_key FROM realestate_agents where realestate_agent_id = :realestate_agent_id";            
            $placeholders = ['realestate_agent_id' => $realestate_agent_id];
            $result = $db->query($sql, $placeholders);
            $row = $db->fetch();
            if(empty($row)) {
                throw new Exception("$sql agent DRE# not found");
            }

            $office_key = $row->office_key;
            
            $update_values = array(                
                'is_show_website' => 1,
                'is_active' => 1            
            );
            
            if ($logo_image_url != "")  $update_values['logo_image_url'] = $logo_image_url;
            
            $result = $db->update('realestate_office', $update_values, "office_key = '{$office_key}'");
            unset($update_values);
            
            $update_values = array(                
               'is_show_website' => 1,
               'specialized_field' => $specialized_field,               
               'self_introduction' => $self_introduction,
               'has_active_advertisement' => $has_active_advertisement,
               'is_approved' => 0,
               'is_active' => 1,
               'user_id' => $SS_ID
            );
                        
            if ($main_image_url != "")  $update_values['main_image_url'] = $main_image_url;
            $result = $db->update('realestate_agents', $update_values, 'realestate_agent_id = '.$realestate_agent_id);
            if ($result == false) throw new Exception("realestate_agents update fail");
            unset($update_values);
            
            
            
        }
        
        if ($main_image_url != "")  FILE_UPLOAD("user","agent_files", "agent", $realestate_agent_id, "main_image_url", "main");                    
        if ($logo_image_url != "")  FILE_UPLOAD("user","office_files", "office", $office_key, "logo_image_url", "logo");                    
        

        // 카드 결제 붙인다.
        /*

           https://www.authorize.net 활용

         */

        // 이벤트 기간
        $payment_amount = 0;
        $payment_method = "오픈기념 무료 서비스";
        
//        $desired_start_date = $_POST['desired_start_date'] ?? "";
//        $desired_end_date = GET_FUTURE_DATE($desired_start_date, $validity_period);

        // 결제정보 등록
        $insert_values = array(
            'user_id' => $SS_ID,
            'section_type' => 5,
            'listing_id' => $realestate_agent_id,
            'desired_start_date' => $desired_start_date,
            'desired_end_date' => $desired_end_date,
            'start_date' => $desired_start_date,
            'end_date' => $desired_end_date,
            'validity_period' => $validity_period,
            'is_paid' => 'Y',
            'payment_date' => date('Y-m-d H:i:s'),
            'payment_amount' => $payment_amount,
            'payment_method' => $payment_method,
            'is_active' => 1,
            'created_user' => $SS_NICKNAME,
            'created_at' => date('Y-m-d H:i:s'),
            'ip_address' => $_SERVER['REMOTE_ADDR'],
        );

        $result = $db->insert('ad_payments', $insert_values);
        if ($result == false) throw new Exception("ad_payments insert fail");
        $ad_payments_id = $db->getLastInsertId();
        unset($insert_values);

    }
    catch (Exception $e) {

        $db->transactionRollback();

        $result_data = [
            "status" => "fail",
            "msg" => $e->getMessage()

        ];

        echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
        exit;
    }

 //   $db->transactionRollback();
    $db->transactionCommit();

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "num" => $ad_payments_id

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    exit;

}

if($ac == "dre_search_old") {
 
    $agent_dre_license = $_GET['agent_dre_license'] ?? 1;
    
    if($agent_dre_license == "") {
        
        
        $result_data = [
            "status" => "empty license",
            "msg" => "라이센스정보가 없습니다."

        ];

        echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
        exit;
        
    }
    
    $today = date("Ymd");
    
    $sql = "select A.* from ad_payments A where A.user_id = :user_id and section_type = 5 and '{$today}' BETWEEN start_date AND end_date limit 0,1";    
    $placeholders = ['user_id' => $SS_ID];
    $result = $db->query($sql, $placeholders);
    $row = $db->fetch();
    if(!empty($row)) {
        
        $p_agent_dre_license = $row->agent_dre_license;
        $result_data = [
            "status" => "not",
//            "msg" => "광고를 진행중이므로 다시 광고 신청 하실 필요가 없습니다."            
            "msg" => "이 dre#는 이미 등록되어 있으므로 다시 광고 신청 하실 필요가 없습니다."
            //"msg" => "이 dre#는 이미 등록되어 있으므로 다시 광고 신청 하실 필요가 없습니다."            

        ];

        echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
        exit;
            
    }    
    

    $sql = "select A.* from realestate_agents A where A.agent_dre_license = :agent_dre_license limit 0,1";    
    $placeholders = ['agent_dre_license' => $agent_dre_license];
    $result = $db->query($sql, $placeholders);
    $row = $db->fetch();
    if(!empty($row)) {
        
        $p_agent_dre_license = $row->agent_dre_license;
        $user_id = $row->user_id;
        
        if($SS_ID != $user_id && $user_id != "") {
            $result_data = [
                "status" => "other user",
                "msg" => "해당 유저 아이디는 DRE# {$p_agent_dre_license}로 이미 등록되어 있으므로 다른 DRE# 를 사용할 수 없습니다.",
//                "msg" => "해당 DRE# {$agent_dre_license}는 user ID :{$user_id} 로 이미 등록되어 있으므로 사용하실수 없습니다",
                "items" => array("item" => $p_agent_dre_license),
            ];

            echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
            exit;
        }
            
    }
        
    $find_type = 0;
    
    $sql = "select A.* from realestate_agents A where A.user_id = :user_id limit 0,1";    
    $placeholders = ['user_id' => $SS_ID];
    $result = $db->query($sql, $placeholders);
    $row = $db->fetch();
    if(!empty($row)) {
                
        $p_agent_dre_license = $row->agent_dre_license;
        
        $find_type = 1;
        // 찾은 라이센스로 변경
        $agent_dre_license = $p_agent_dre_license;
            
    }
        
    $sql = "select A.*, B.office_mls_id, B.office_phone, B.office_email, B.office_address1, B.office_address2, B.office_city, B.office_state, B.office_zip, B.logo_image_url from realestate_agents A 
        left join realestate_office B 
        on A.office_key = B.office_key 
        where A.agent_dre_license = :agent_dre_license limit 0,1";    
    $placeholders = ['agent_dre_license' => $agent_dre_license];
    $result = $db->query($sql, $placeholders);
    $row = $db->fetch();
    if(empty($row)) {
        
        $result_data = [
            "status" => "not found",
            "msg" => "라이센스에 해당하는 에이전트 정보가 없습니다.\n오피스정보와 에이전트 정보를 입력하세요."

        ];

        echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
        exit;
            
    }

    $realestate_agent_id = $row->realestate_agent_id;
    $agent_key           = $row->agent_key;
    $specialized_field   = $row->specialized_field;
    $agent_full_name     = $row->agent_full_name;
    $agent_dre_license   = $row->agent_dre_license;
    $agent_phone         = $row->agent_phone;
    $agent_email         = $row->agent_email;
    $office_key          = $row->office_key;
    $office_name         = $row->office_name;
    $main_image_url      = $row->main_image_url;    
    $is_show_website     = $row->is_show_website;
    $office_mls_id    = $row->office_mls_id;
    $office_phone     = $row->office_phone;
    $office_email     = $row->office_email;
    $office_address1  = $row->office_address1;
    $office_address2  = $row->office_address2;
    $office_city      = $row->office_city;
    $office_state     = $row->office_state;
    $office_zip       = $row->office_zip;
    $logo_image_url   = $row->logo_image_url;
    
    $item = array(
        "realestate_agent_id" => $realestate_agent_id,
        "agent_key"           => $agent_key,
        "specialized_field"   => $specialized_field,
        "agent_full_name"     => $agent_full_name,
        "agent_dre_license"   => $agent_dre_license,
        "agent_phone"         => $agent_phone,
        "agent_email"         => $agent_email,
        "office_key"          => $office_key,
        "office_name"         => $office_name,
        "office_mls_id"   => $office_mls_id,
        "office_phone"    => $office_phone,
        "office_email"    => $office_email,
        "office_address1" => $office_address1,
        "office_address2" => $office_address2,
        "office_city"     => $office_city,
        "office_state"    => $office_state,
        "office_zip"      => $office_zip,
    );

    if($find_type == 0) {
        $result_data = [
                "status" => "success",
                "msg" => "라이센스에 해당하는 에이전트 정보가 있습니다.",
                "items" => array("item" => $item),

            ];

    }
    else {
                
        $result_data = [
            "status" => "found",
//            "msg" => "해당 유저 아이디는 DRE# : {$agent_dre_license}로 이미 등록되어 있습니다.",
            "msg" => "해당 유저 아이디는 DRE# {$agent_dre_license}로 이미 등록되어 있으므로 다른 DRE# 를 사용할 수 없습니다.",
            "items" => array("item" => $item, "dre" => $agent_dre_license),

        ];

     
        
    }
    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    exit;
    
    
 
 
    
}

if($ac == "dre_search") {
 
    $agent_dre_license = $_GET['agent_dre_license'] ?? 1;
    
    if($agent_dre_license == "") {
        
        
        $result_data = [
            "status" => "empty license",
            "msg" => "라이센스정보가 없습니다."

        ];

        echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
        exit;
        
    }
    
    $today = date("Ymd");
    
    // 1, 로그인한 유저아이디가 agent table 에 있는 경우, 내가 입력한 dre# 와  agent table 에 있는 dre# 가 다르면 에러
    $sql = "select A.* from realestate_agents A where A.user_id = :user_id limit 0,1";    
    $placeholders = ['user_id' => $SS_ID];
    $result = $db->query($sql, $placeholders);
    $row = $db->fetch();
    if(!empty($row)) {
                
        $p_realestate_agent_id = $row->realestate_agent_id;
        $p_agent_dre_license = $row->agent_dre_license;
                 
        $item = get_data($db,$p_realestate_agent_id, $define_val);
            
        if($p_agent_dre_license != $agent_dre_license) {
            
            $result_data = [
                "status" => "found",
                "msg" => "해당 유저 아이디는 DRE# {$p_agent_dre_license}로 이미 등록되어 있으므로 다른 DRE# 를 사용할 수 없습니다.",
                "items" => array("item" => $item, "dre" => $p_agent_dre_license),
            ];

            echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
            exit;
        }
        else {
            
            $result_data = [
                "status" => "success",
                "msg" => "라이센스에 해당하는 에이전트 정보가 있습니다.",
                "items" => array("item" => $item, "dre" => $p_agent_dre_license),
            ];

            echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
            exit;
        }
        
            
    }
    else {
        
        //2. 로그인한 유저아이디가 agent table 에 없는 경우, 내가 입력한 dre# 가  agent table 에 있으면서 user_id 가 있으면서 다른경우 에러 (다른 사람이 사용중)
        
        $sql = "select A.* from realestate_agents A where A.agent_dre_license = :agent_dre_license limit 0,1";    
        $placeholders = ['agent_dre_license' => $agent_dre_license];
        $result = $db->query($sql, $placeholders);
        $row = $db->fetch();
        if(!empty($row)) {
            
            $p_realestate_agent_id = $row->realestate_agent_id;
            $p_agent_dre_license = $row->agent_dre_license;
            $p_user_id = $row->user_id;
            
            if($p_user_id != "") {
                $result_data = [
                    "status" => "other user",                
                    "msg" => "해당 DRE# {$agent_dre_license}는 user ID :{$p_user_id} 로 이미 등록되어 있으므로 사용하실수 없습니다",                
                    "items" => array("item" => "", "dre" => $p_agent_dre_license),
                ];

                echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
                exit;
            }
            else {
                
                $item = get_data($db,$p_realestate_agent_id, $define_val);
                
                $result_data = [
                "status" => "success",
                "msg" => "라이센스에 해당하는 에이전트 정보가 있습니다.",
                "items" => array("item" => $item)

                ];
                
                echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
                exit;
                
            }
                
        }
        else {            
                    
            $result_data = [
                "status" => "not found",
                "msg" => "라이센스에 해당하는 에이전트 정보가 없습니다.\n\n오피스정보와 에이전트 정보를 입력하세요."

            ];

            echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
            exit;
            
        }
        
    }
       
 
       
}

if($ac == "get_info") {
    
    $id = $_GET['id'] ?? '';
    
    $item = get_data($db,$id, $define_val);
                
    $result_data = [
    "status" => "success",
    "msg" => "에이전트 정보가 있습니다.",
    "items" => array("item" => $item)

    ];
    
    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    exit;
}

if($ac == "update_advertisement") {
    
   // $db->setDebug(true);
    
    $db->transactionBegin();

    try {
       
        // 공통 입력                        
        $realestate_agent_id = $_POST['realestate_agent_id'] ?? "";
        $realestate_office_id = $_POST['realestate_office_id'] ?? "";
        $office_key  = $_POST['office_key'] ?? "";
        $office_name = $_POST['office_name'] ?? "";
        $office_phone = $_POST['office_phone'] ?? "";
        $office_email = $_POST['office_email'] ?? "";
        $office_address1 = $_POST['office_address1'] ?? "";
        $office_address2 = $_POST['office_address2'] ?? "";
        $office_state = $_POST['office_state'] ?? "";
        $office_city = $_POST['office_city'] ?? "";
        $office_zip = $_POST['office_zip'] ?? "";
        
        $agent_key = $_POST['agent_key'] ?? "";
        $specialized_field = $_POST['specialized_field'] ?? "-1";        
        $agent_full_name = $_POST['agent_full_name'] ?? "";
        $agent_phone = $_POST['agent_phone'] ?? "";
        $agent_email = $_POST['agent_email'] ?? "";
        $self_introduction = $_POST['self_introduction'] ?? ""; 
        
        $logo_image_url = "";
        $del_logo_image_url = $_POST['del_logo_image_url'] ?? ""; 
        
        $main_image_url = "";
        $del_main_image_url = $_POST['del_main_image_url'] ?? "";         
        
        if($_FILES['main_image_url']['size'] > 0) $main_image_url = $_FILES['main_image_url']['name'];
        if($_FILES['logo_image_url']['size'] > 0) $logo_image_url = $_FILES['logo_image_url']['name'];
                        
        $update_values = array(                
                'office_name' => $office_name,
                'office_phone' => $office_phone,
                'office_email' => $office_email,
                'office_address1' => $office_address1,
                'office_address2' => $office_address2,
                'office_city' => $office_city,
                'office_state' => $office_state,
                'office_zip' => $office_zip                   
        );
                
        // 삭제했으면 빈값으로 처리한다.
        if ($del_logo_image_url == "Y") $update_values['logo_image_url'] = '';
        else if($logo_image_url != "")  $update_values['logo_image_url'] = $logo_image_url;    
          
        $result = $db->update('realestate_office', $update_values, 'realestate_office_id = '.$realestate_office_id);        
        unset($update_values);
        
        if ($logo_image_url != "")  FILE_UPLOAD("user","office_files", "office", $office_key, "logo_image_url", "logo");               
        
        $update_values = array(                
                'specialized_field' => $specialized_field,
                'agent_full_name' => $agent_full_name,
                'agent_phone' => $agent_phone,
                'agent_email' => $agent_email,                
                'office_name' => $office_name,
                'self_introduction' => $self_introduction
        );
        
        // 삭제했으면 빈값으로 처리한다.
        if ($del_main_image_url == "Y")  $update_values['main_image_url'] = '';
        else if($main_image_url != "")  $update_values['main_image_url'] = $main_image_url;
        
        $result = $db->update('realestate_agents', $update_values, 'realestate_agent_id = '.$realestate_agent_id);        
        unset($update_values);
        
        if ($main_image_url != "")  FILE_UPLOAD("user","agent_files", "agent", $realestate_agent_id, "main_image_url", "main");                    
        
 

    }
    catch (Exception $e) {

        $db->transactionRollback();

        $result_data = [
            "status" => "fail",
            "msg" => $e->getMessage()

        ];

        echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
        exit;
    }

 //   $db->transactionRollback();
    $db->transactionCommit();

    $result_data = [
        "status" => "success",
        "msg" => "sucess",

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    exit;

}

function get_data($db, $num, $define_val) {
    
    
    $sql = "select A.*, B.realestate_office_id, B.office_mls_id, B.office_phone, B.office_email, B.office_address1, B.office_address2, B.office_city, B.office_state, B.office_zip, B.logo_image_url from realestate_agents A 
        left join realestate_office B 
        on A.office_key = B.office_key 
        where A.realestate_agent_id = :realestate_agent_id limit 0,1";    
    $placeholders = ['realestate_agent_id' => $num];
    $result = $db->query($sql, $placeholders);
    $row = $db->fetch();
    if(empty($row)) { return array();}

    $realestate_agent_id = $row->realestate_agent_id;
    $agent_key           = $row->agent_key;
    $specialized_field   = $row->specialized_field;
    $agent_full_name     = $row->agent_full_name;
    $agent_dre_license   = $row->agent_dre_license;
    $agent_phone         = $row->agent_phone;
    $agent_email         = $row->agent_email;
    $office_key          = $row->office_key;
    $office_name         = $row->office_name;
    $main_image_url      = $row->main_image_url;    
    $is_show_website     = $row->is_show_website;
    $self_introduction   = $row->self_introduction;
    $realestate_office_id    = $row->realestate_office_id;
    $office_mls_id    = $row->office_mls_id;
    $office_phone     = $row->office_phone;
    $office_email     = $row->office_email;
    $office_address1  = $row->office_address1;
    $office_address2  = $row->office_address2;
    $office_city      = $row->office_city;
    $office_state     = $row->office_state;
    $office_zip       = $row->office_zip;
    $logo_image_url   = $row->logo_image_url;
    
    $main_img = ""; 
    $logo_img = "";
        
    if($main_image_url != "") {
        $main_img = $define_val->IMG_PROTECT ."?c=realestate&cc=agent&d=main&s=".$realestate_agent_id;
    }
    
    if($logo_image_url != "") {
        $logo_img = $define_val->IMG_PROTECT ."?c=realestate&cc=office&d=logo&s=".$office_key;
    }
    
    $item = array(
        "realestate_agent_id" => $realestate_agent_id,
        "agent_key"             => $agent_key,
        "specialized_field"     => $specialized_field,
        "agent_full_name"       => $agent_full_name,
        "agent_dre_license"     => $agent_dre_license,
        "agent_phone"           => $agent_phone,
        "agent_email"           => $agent_email,
        "self_introduction"     => $self_introduction,
        "office_key"            => $office_key,
        "office_name"           => $office_name,
        "realestate_office_id"  => $realestate_office_id,
        "office_mls_id"         => $office_mls_id,
        "office_phone"          => $office_phone,
        "office_email"          => $office_email,
        "office_address1"       => $office_address1,
        "office_address2"       => $office_address2,
        "office_city"           => $office_city,
        "office_state"          => $office_state,
        "office_zip"            => $office_zip,
        'main_image_url'        => $main_img,
        'logo_image_url'        => $logo_img         
    );
    
    return $item;
    
    
}

if ($ac == "get_amount") {

    
    $validity_period = $_GET['validity_period'] ?? 1;
    
    $row_sql = "SELECT A.* FROM ad_community_agent_amount A where ad_type = :ad_type limit 0,1";
                      
    $placeholders = ['ad_type' => 'agent'];
    $result = $db->query($row_sql, $placeholders);
    
    $row = $db->fetch();

    $p_amount = 0;
    
    switch($validity_period) {
        case "1" : $p_amount = $row->ad_amount_1; break;
        case "3" : $p_amount = $row->ad_amount_3; break;
        case "6" : $p_amount = $row->ad_amount_6; break;
        case "9" : $p_amount = $row->ad_amount_9; break;
        case "12" : $p_amount = $row->ad_amount_12; break;
        
    }
    
    if($p_amount == 0) {
        $result_data = [
            "status" => "file",
            "msg" => "실패",
            "items" => array("item" => $p_amount)
        ];
    }
    else {
        $result_data = [
            "status" => "success",
            "msg" => "성공",
            "items" => array("item" => $p_amount)
        ];
    }
    
    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    exit;

}
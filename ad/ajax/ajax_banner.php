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


if($ac == "write_banner") {

    $db->transactionBegin();

    try {

        $banner_type = $_POST['banner_type'];        
        
        if($banner_type == "") {
            exit;
        }

        $validity_period = $_POST['validity_period'] ?? 1;
        
        // 공통 입력
        $company_name = $_POST['company_name'] ?? "";        
        $contact_name  = $_POST['contact_name'] ?? "";
        $contact_email = $_POST['contact_email'] ?? "";
        $contact_phone = $_POST['contact_phone'] ?? "";                         
        
        $desired_start_date = CONVERT_DATE_FORMAT($_POST['desired_start_date'] ?? ""); 
        $desired_end_date = ADD_MONTHS_TO_DATE($desired_start_date,$validity_period);
        
        $today = date("Ymd");
    
        if($desired_start_date <= $today && $today <= $desired_end_date) $has_active_advertisement = 1;
        else $has_active_advertisement = 0;

          
        $advertiser_notes = "";

        $main_image_url = "";


        $banner_location = $_POST['banner_location'] ?? "";                         
        $link_url = $_POST['link_url'] ?? "";     
        
        if ($_FILES['main_image_url']['size'] > 0) $main_image_url = $_FILES['main_image_url']['name'];
        
        // 무료이면 active
        if($define_val->PAY_YN_BANNER == 'N') { $is_active= 1; $is_paid = 'Y'; }
        else { $is_active= 0; $is_paid = 'N'; }
        
        //$main_image_url = make_file_name("main_image_url", $listing_id, "main_image_url_exist");
        
        $insert_values = array(                
            'user_id' => $SS_ID,
            'banner_type' => $banner_type,
            'banner_location' => $banner_location,            
            'company_name' => $company_name,
            'contact_name' => $contact_name,
            'contact_email' => $contact_email,
            'contact_phone' => $contact_phone,
            'main_image_url' => $main_image_url,      
            'link_url' => $link_url,                          
            'view_count' => 0,
            'advertiser_notes' => $advertiser_notes,
            'has_active_advertisement' => $has_active_advertisement,
            'is_active' => $is_active,                
            'created_user' => $SS_NICKNAME,
            'created_at' => date('Y-m-d H:i:s'),
            'ip_address' => $_SERVER['REMOTE_ADDR'],
        );
        
        $result = $db->insert('ad_banners', $insert_values);
        if ($result == false) throw new Exception("ad_banners insert fail");
        $ad_banner_id = $db->getLastInsertId();

        if ($main_image_url != "") FILE_UPLOAD("user", "banner_files", "banner", $ad_banner_id,  "main_image_url","main");
        
        // file_process($main_image_url, "banner_files","banner", $ad_banner_id, "main_image_url", "main", $listing_id, "main_image_url_exist");
        
        unset($insert_values);

        // 이벤트 기간
        $payment_amount = 0;
        $payment_method = "stripe";
        

        // 결제정보 등록
        $insert_values = array(
            'user_id' => $SS_ID,
            'section_type' => 6,
            'listing_id' => $ad_banner_id,
            'desired_start_date' => $desired_start_date,
            'desired_end_date' => $desired_end_date,
            'start_date' =>  $desired_start_date,
            'end_date' =>  $desired_end_date,
            'validity_period' => $validity_period,
            'is_paid' => $is_paid,
            'payment_date' => date('Y-m-d H:i:s'),
            'payment_amount' => $payment_amount,
            'payment_method' => $payment_method,
            'is_active' => $is_active,
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

//    $db->transactionRollback();
   $db->transactionCommit();

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "num" => $ad_payments_id

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    exit;

}

if ($ac == "check_banner_empty") {

    // 배너 섹션
    $banner_type = $_POST['banner_type'];   
    
    //  배너 위치
    $banner_location = $_POST['banner_location'] ?? "";                              
    $validity_period = $_POST['validity_period'] ?? 1;
    
    $desired_start_date = $_POST['desired_start_date'] ?? "";
    
    [$msg, $end_date] = check_exist($db, $banner_type, $banner_location, $desired_start_date, $validity_period );
   
    $result_data = [
        "status" => "success",
        "msg" => $msg,
        "items" => array("item" => $end_date)
    ];
    
    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    exit;

}

if ($ac == "get_banner_amount") {

    // 배너 섹션
    $banner_type = $_POST['banner_type'];   
    
    //  배너 위치
    $banner_location = $_POST['banner_location'] ?? "";                              
    $validity_period = $_POST['validity_period'] ?? 1;
    
    $row_sql = "SELECT A.* FROM ad_banner_amount A where banner_type = :banner_type and banner_location = :banner_location limit 0,1";
                      
    $placeholders = ['banner_type' => $banner_type, "banner_location" => $banner_location];
    $result = $db->query($row_sql, $placeholders);
    
    $row = $db->fetch();
    
    $p_amount = 0;

    switch($validity_period) {
        case "1" : $p_amount = $row->banner_amount_1; break;
        case "3" : $p_amount = $row->banner_amount_3; break;
        case "6" : $p_amount = $row->banner_amount_6; break;
        case "9" : $p_amount = $row->banner_amount_9; break;
        case "12" : $p_amount = $row->banner_amount_12; break;
        
    }
    
    $p_banner_amount = $p_amount;
        
    if($p_amount == 0) {
        $result_data = [
            "status" => "file",
            "msg" => "실패",
            "items" => array("item" => $p_banner_amount)
        ];
    }
    else {
        $result_data = [
            "status" => "success",
            "msg" => "성공",
            "items" => array("item" => $p_banner_amount)
        ];
    }
    
    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    exit;

}

function check_exist($db, $banner_type, $banner_location, $desired_start_date, $validity_period) {
    
    $desired_start_date = CONVERT_DATE_FORMAT($desired_start_date); 
    $desired_end_date = ADD_MONTHS_TO_DATE($desired_start_date,$validity_period);
    
    // active 이고 배너광고이고 배너타입과 위치가 같은 경우, 
        $row_sql = "SELECT C.end_date FROM ad_banners A                     
                    left join ad_payments C on A.ad_banner_id = C.listing_id                    
                   where A.is_active = 1
                   and C.section_type = 6
                   and A.banner_type = '{$banner_type}' and A.banner_location = '{$banner_location}'                   
                   and (({$desired_start_date} <= C.end_date AND {$desired_start_date} >= C.start_date ) or ({$desired_end_date} <= C.end_date AND {$desired_end_date} >= C.start_date ))
           ";

    $placeholders = [];
    $result = $db->query($row_sql, $placeholders);
    $row = $db->fetch();
    
    if(empty(($row))) {
        return ["empty", ''];
    }
    else {
        return ["exist", DATETOSTRING_USA($row->end_date,"/")];
    }
    
    
}
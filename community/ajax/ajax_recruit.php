<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');
    
    
use BearTemplate\BearTemplate;
use user_service\recruit_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/community/service/service_recruit.php");

$ac = $_REQUEST['ac'];

if ($ac == "recruit_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_job_type" => $_GET['s_job_type'] ?? "",
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ?? 10,
        "block_set" => 10,
        "random" => 'N',
        "s_nynj" => $_GET['s_nynj'] ?? '',
        
    );

    $recruit_list = new recruit_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "recruit_platinum_body.tpl");
    $tpl->setLoop("T_LOOP", $recruit_list->loop_platinum);
    $tpl->tprint("main");
    $content_platinum = $tpl->content;
    unset($tpl);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "recruit_gold_body.tpl");
    $tpl->setLoop("T_LOOP", $recruit_list->loop_gold);
    $tpl->tprint("main");
    $content_gold = $tpl->content;
    unset($tpl);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "recruit_regular_body.tpl");
    $tpl->setLoop("T_LOOP", $recruit_list->loop_regular);
    $tpl->tprint("main");
    $content_regular = $tpl->content;
    unset($tpl);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("platinum" => $content_platinum, "gold" => $content_gold, "regular" => $content_regular),
        "pagging" => $recruit_list->paging,
        "navigation_text" => ""
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if ($ac == "select_city_name") {

    $s_state_code = $_GET['s_state_code'] ?? "";

    $html = DB_ARRAY_MULTI_CITY_NAME_RETURN($db, $s_state_code);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "select_one_city_name") {

    $s_state_code = $_GET['s_state_code'] ?? "";
    $s_city_name = $_GET['s_city_name'] ?? "";

    $html = DB_ARRAY_CITY_NAME_RETURN($db, $s_state_code,$s_city_name);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

// 사용안함
if ($ac == "recruit_write_platinum") {

    $company_name = $_POST['company_name'] ?? "";
    $title = $_POST['title'] ?? "";
    $subtitle = $_POST['subtitle'] ?? "";
    $state_codes  = $_POST['state_code'] ?? [];
    $city_names   = $_POST['city_name'] ?? [];   
    $contact_name = $_POST['contact_name'] ?? "";
    $contact_email = $_POST['contact_email'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";

    $job_opening_information = $_POST['job_opening_information'] ?? "";
    $has_15_plus_employees = $_POST['has_15_plus_employees'] ?? "N";

    $advertising_level = $_POST['advertising_level'] ?? "";
    $job_type = $_POST['job_type'] ?? "";
    $is_active = 1;

    $image_01_url = "";
    $image_01_key = "";
    $image_02_url = "";
    $image_02_key = "";
    $image_03_url = "";
    $image_03_key = "";
    $image_04_url = "";
    $image_04_key = "";
    $image_05_url = "";
    $image_05_key = "";
    $image_06_url = "";
    $image_06_key = "";

    foreach ($_FILES["user_files"]["error"] as $key => $error) {
        $tmp_name = $_FILES["user_files"]["tmp_name"][$key];
        if (!$tmp_name) continue;

        switch ($cnt) {
            case 0:
                $image_01_url = $tmp_name;
                $image_01_key = $key;
                break;
            case 1:
                $image_02_url = $tmp_name;
                $image_02_key = $key;
                break;
            case 2:
                $image_03_url = $tmp_name;
                $image_03_key = $key;
                break;
            case 3:
                $image_04_url = $tmp_name;
                $image_04_key = $key;
                break;
            case 4:
                $image_05_url = $tmp_name;
                $image_05_key = $key;
                break;
            case 5:
                $image_06_url = $tmp_name;
                $image_06_key = $key;
                break;
        }

        $cnt++;
    }

    $logo_image_url = "";
    $main_image_url = "";

    if($_POST['logo_image_url']['size'] > 0) $logo_image_url = $_POST['logo_image_url']['name'];
    if($_POST['main_image_url']['size'] > 0) $main_image_url = $_POST['main_image_url']['name'];

    $insert_values = array(
        'community_recruit_listings_id' => null,
        'ad_company_id' => 0,
        'user_id' => $SS_ID ?? "",
        'company_name' => $company_name,
        'logo_image_url' => $logo_image_url,
        'main_image_url' => $main_image_url,
        'sub_image_01_url' => $image_01_url,
        'sub_image_02_url' => $image_02_url,
        'sub_image_03_url' => $image_03_url,
        'sub_image_04_url' => $image_04_url,
        'sub_image_05_url' => $image_05_url,
        'sub_image_06_url' => $image_06_url,
        'title' => $title,
        'subtitle' => $subtitle,
        'advertising_level' => $advertising_level,
        'contact_name' => $contact_name,
        'contact_email' => $contact_email,
        'contact_phone' => $contact_phone,
        'job_opening_information' => $job_opening_information,
        'has_15_plus_employees' => $has_15_plus_employees,
        'view_count' => 0,
        'advertiser_notes' => '',
        'internal_notes' => '',
        'listing_status' => '',
        'is_active' => 1,
        'created_user' => $SS_NICKNAME ?? "",
        //'updated_user' => $SS_NICKNAME ?? "",
        'created_at' => date('Y-m-d H:i:s'),
        //'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR']

    );

    $db->insert('community_recruit_listings', $insert_values);
    $lastInsertId = $db->getLastInsertId();

    $insert_image_values = array(
        'community_recruit_listings_sub_id' => null,
        'community_recruit_listings_id' => $lastInsertId,
        'user_id' => $SS_ID ?? "",        
        'job_type' => $job_type,
        'is_active' => 1,
        'created_user' => $SS_NICKNAME ?? "",
        //'updated_user' => $SS_ID ?? "",
        'created_at' => date('Y-m-d H:i:s'),
        //'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR']
    );

    $db->insert('community_recruit_listings_sub', $insert_image_values);
    $lastInsertIdImage = $db->getLastInsertId();
    
    foreach ($state_codes as $index => $state_code) {
                                
        if($state_code == "") continue;
          
        $city_name = $city_names[$index] ?? '';
                        
        $insert_loc_values = array(
            'community_recruit_listings_loc_sub_id' => null,
            'community_recruit_listings_id' => $lastInsertId,
            'state_code' => htmlspecialchars($state_code),
            'city_name' => htmlspecialchars($city_name),                        
            'is_active' => 1,
            'created_user' => $SS_NICKNAME ?? "",
            'created_at' => date('Y-m-d H:i:s'),
            'ip_address' => $_SERVER['REMOTE_ADDR']
        );

        $db->insert('community_recruit_listings_loc_sub', $insert_loc_values);
        $lastInsertIdloc = $db->getLastInsertId();
        unset($insert_loc_values);

                
    }
                                
    if ($logo_image_url != "") FILE_UPLOAD("user", "recruit_files", "recruit", $lastInsertId, "user_files", "logo");
    if ($main_image_url != "") FILE_UPLOAD("user", "recruit_files", "recruit", $lastInsertId, "user_files", "main");

    if($image_01_key != "") FILE_UPLOAD_ARRAY("user","recruit_files", "recruit", $lastInsertId, "user_files", "img1", $image_01_key);
    if($image_02_key != "") FILE_UPLOAD_ARRAY("user","recruit_files", "recruit", $lastInsertId, "user_files", "img2", $image_02_key);
    if($image_03_key != "") FILE_UPLOAD_ARRAY("user","recruit_files", "recruit", $lastInsertId, "user_files", "img3", $image_03_key);
    if($image_04_key != "") FILE_UPLOAD_ARRAY("user","recruit_files", "recruit", $lastInsertId, "user_files", "img4", $image_04_key);
    if($image_05_key != "") FILE_UPLOAD_ARRAY("user","recruit_files", "recruit", $lastInsertId, "user_files", "img5", $image_05_key);
    if($image_06_key != "") FILE_UPLOAD_ARRAY("user","recruit_files", "recruit", $lastInsertId, "user_files", "img6", $image_06_key);


}

if ($ac == "recruit_write") {

    $company_name = $_POST['company_name'] ?? "";
    $title = $_POST['title'] ?? "";
    $subtitle = $_POST['subtitle'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $city_name = $_POST['city_name'] ?? "";
    $contact_name = $_POST['contact_name'] ?? "";
    $contact_email = $_POST['contact_email'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";

    $job_opening_information = $_POST['job_opening_information'] ?? "";
    $has_15_plus_employees = $_POST['has_15_plus_employees'] ?? "";

    $advertising_level = "regular";
    $job_type = $_POST['job_type'] ?? "";
    $is_active = 1;

    $insert_values = array(
        'community_recruit_listings_id' => null,
        'ad_company_id' => 0,
        'user_id' => $SS_ID ?? "",
        'company_name' => $company_name,
        'logo_image_url' => '',
        'main_image_url' => '',
        'sub_image_01_url' => '',
        'sub_image_02_url' => '',
        'sub_image_03_url' => '',
        'sub_image_04_url' => '',
        'sub_image_05_url' => '',
        'sub_image_06_url' => '',
        'title' => $title,
        'subtitle' => $subtitle,
        'advertising_level' => $advertising_level,
        'contact_name' => $contact_name,
        'contact_email' => $contact_email,
        'contact_phone' => $contact_phone,
        'job_opening_information' => $job_opening_information,
        'has_15_plus_employees' => $has_15_plus_employees,
        'view_count' => 0,
        'advertiser_notes' => '',
        'internal_notes' => '',
        'listing_status' => '',
        'is_active' => 1,
        'created_user' => $SS_NICKNAME ?? "",
        'updated_user' => $SS_NICKNAME ?? "",
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR']

    );

    $db->insert('community_recruit_listings', $insert_values);
    $lastInsertId = $db->getLastInsertId();    

    $insert_image_values = array(
        'community_recruit_listings_sub_id' => null,
        'community_recruit_listings_id' => $lastInsertId,
        'user_id' => $SS_ID ?? "",        
        'job_type' => $job_type,
        'is_active' => 1,
        'created_user' => $SS_NICKNAME ?? "",
        'updated_user' => $SS_NICKNAME ?? "",
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR']
    );
    
    $db->insert('community_recruit_listings_sub', $insert_image_values);
    $lastInsertIdImage = $db->getLastInsertId();

    $insert_loc_values = array(
        'community_recruit_listings_loc_sub_id' => null,
        'community_recruit_listings_id' => $lastInsertId,
        'state_code' => htmlspecialchars($state_code),
        'city_name' => htmlspecialchars($city_name),                        
        'is_active' => 1,
        'created_user' => $SS_ID ?? "",
        'created_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR']
    );

    $db->insert('community_recruit_listings_loc_sub', $insert_loc_values);
    $lastInsertIdloc = $db->getLastInsertId();
}

if ($ac == "recruit_update") {

    $id = $_POST["id"];
    $sid = $_POST["sid"];

    $company_name = $_POST['company_name'] ?? "";
    $title = $_POST['title'] ?? "";
    $subtitle = $_POST['subtitle'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $city_name = $_POST['city_name'] ?? "";
    $contact_name = $_POST['contact_name'] ?? "";
    $contact_email = $_POST['contact_email'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";

    $job_opening_information = $_POST['job_opening_information'] ?? "";
    $has_15_plus_employees = $_POST['has_15_plus_employees'] ?? "";

    $job_type = $_POST['job_type'] ?? "";

    $update_values = array(

        'company_name' => $company_name,
        'title' => $title,
        'subtitle' => $subtitle,
        'contact_name' => $contact_name,
        'contact_email' => $contact_email,
        'contact_phone' => $contact_phone,
        'job_opening_information' => $job_opening_information,
        'has_15_plus_employees' => $has_15_plus_employees,
        'updated_user' => $SS_NICKNAME ?? "",
        'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR']
    );

    $db->update('community_recruit_listings', $update_values, 'community_recruit_listings_id = ' . $id);

    FILE_UPLOAD("admin","business_files", "business", $id, "main_image_url", "main");

    $db->delete('community_recruit_listings_sub', ['community_recruit_listings_id' => $id]);
    $insert_image_values = array(
        'community_recruit_listings_sub_id' => null,
        'community_recruit_listings_id' => $id,
        'user_id' => $SS_ID ?? "",        
        'job_type' => $job_type,
        'is_active' => 1,
        'created_user' => $SS_NICKNAME ?? "",
        'updated_user' => $SS_NICKNAME ?? "",
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR']
    );
    
    $db->insert('community_recruit_listings_sub', $insert_image_values);
    unset($insert_image_values);
        
    $db->delete('community_recruit_listings_loc_sub', ['community_recruit_listings_id' => $id]);
    
    $insert_loc_values = array(
        'community_recruit_listings_loc_sub_id' => null,
        'community_recruit_listings_id' => $id,
        'state_code' => htmlspecialchars($state_code),
        'city_name' => htmlspecialchars($city_name),                        
        'is_active' => 1,
        'created_user' => $SS_NICKNAME ?? "",
        'created_at' => date('Y-m-d H:i:s'),
        'ip_address' => $_SERVER['REMOTE_ADDR']
    );

    $db->insert('community_recruit_listings_loc_sub', $insert_loc_values);    


}


if($ac == "recruit_delete") {

    $id = $_GET['id'] ?? 0;

    // 실제 삭제 하지 않음
    $update_values = array(
        'is_active' => 0,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('community_recruit_listings', $update_values, 'community_recruit_listings_id = ' . $id);
    /*
    $db->delete('community_recruit', 'community_business_id = ' . $id);
    FILE_DELETE("admin","business_files", "business", $id, "main");
    */

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}
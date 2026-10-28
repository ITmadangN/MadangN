<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use service\agent_pay_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "agent_ad_payment";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/realstate/service/service_agent_pay.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "agent_pay_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        //"s_is_paid" => $_GET['s_is_paid'] ?? "",
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_is_approved" => $_GET['s_is_approved'] ?? "",        
        "s_has_active_advertisement" => $_GET['s_has_active_advertisement'] ?? "",
        "s_kind" => $_GET['s_kind'],
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $agent_pay_list = new agent_pay_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "agent_pay_list_body.tpl");

    $tpl->setLoop("T_LOOP", $agent_pay_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $agent_pay_list->paging,
        "navigation_text" => $agent_pay_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if ($ac == "select_city_name") {

    $s_state_code = $_GET['s_state_code'] ?? "";

    $html = DB_ARRAY_ARRAY_RETURN(0, "", $db, "common_code", "code_sub_name", "code_sub", "code = '$s_state_code' order by code_sub_name asc");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if ($ac == "update_pay_agent") {

    $id = $_POST["id"];
    $user_id = $_POST['user_id'] ?? "";
    $office_key = $_POST['office_key'] ?? "";
    $office_id = $_POST['office_id'] ?? "";
    $realestate_agent_id = $_POST['realestate_agent_id'] ?? "";

    // 오피스정보
    $office_mls_id = $_POST['office_mls_id'] ?? "";
    $office_name = $_POST['office_name'] ?? "";
    $office_phone = $_POST['office_phone'] ?? "";
    $office_email = $_POST['office_email'] ?? "";
    $office_address1 = $_POST['office_address1'] ?? "";
    $office_address2 = $_POST['office_address2'] ?? "";
    $office_state = $_POST['office_state'] ?? "";
    $office_city = $_POST['office_city'] ?? "";
    $office_zip = $_POST['office_zip'] ?? "";

    // 결제정보
    $payment_amount = $_POST['payment_amount'] ?? "";
    $is_paid = $_POST['is_paid'] ?? "";

    // 광고게시정보
    $validity_period = $_POST['validity_period'] ?? "";
    $desired_start_date = $_POST['desired_start_date'] ?? "";
    $desired_end_date = $_POST['desired_end_date'] ?? "";
    $start_date = $_POST['start_date'] ?? "";
    $end_date = $_POST['end_date'] ?? "";    
    $business_type = $_POST['business_type'] ?? "";
    $title = $_POST['title'] ?? "";
    $content = $_POST['content'] ?? "";
    $is_active = $_POST['is_active'] ?? "";
    $is_approved = $_POST['is_approved'] ?? 0;

    // 담당자 정보
    $specialized_field    = $_POST['specialized_field'] ?? "";
    $agent_full_name    = $_POST['agent_full_name'] ?? "";
    $agent_dre_license  = $_POST['agent_dre_license'] ?? "";
    $agent_email        = $_POST['agent_email'] ?? "";
    $agent_phone        = $_POST['agent_phone'] ?? "";
    $agent_key          = $_POST['agent_key'] ?? "";
    $self_introduction = $_POST['self_introduction'] ?? "";    


    $h_main_image_url = $_POST['h_main_image_url'] ?? "";
    $del_main_image_url = $_POST['del_main_image_url'] ?? "";
    $u_main_image_url = GET_UPLOAD_IMAGE($_FILES['main_image_url']['name'], $h_main_image_url, $del_main_image_url);

    $h_logo_image_url = $_POST['h_logo_image_url'] ?? "";
    $del_logo_image_url = $_POST['del_logo_image_url'] ?? "";
    $logo_image_url = GET_UPLOAD_IMAGE($_FILES['logo_image_url']['name'], $h_logo_image_url, $del_logo_image_url);
        
    if($del_logo_image_url == 'Y') FILE_DELETE("admin", "office_files", "office", $office_key, "logo");
    if($del_main_image_url == 'Y') FILE_DELETE("admin", "agent_files", "agent", $id, "main");

    $today = date("Ymd");
        
    if($start_date <= $today && $today <= $end_date) $has_active_advertisement = 1;
    else $has_active_advertisement = 0;
    
    $update_values = array(        
        'user_id' => $user_id,
        'main_image_url' => $u_main_image_url,
        'specialized_field' => $specialized_field,
        'agent_full_name' => $agent_full_name,
        'agent_dre_license' => $agent_dre_license,
        'agent_phone' => $agent_phone,
        'agent_email' => $agent_email,       
//        'agent_key' => $agent_key, 
//        'office_key' => $office_key, 
        'has_active_advertisement' => $has_active_advertisement,
        'is_approved' => $is_approved,
        'is_active' => $is_active,
        'self_introduction' => $self_introduction
        
    );

    $db->update('realestate_agents', $update_values, 'realestate_agent_id = ' . $realestate_agent_id);
    unset($update_values);
    
    FILE_UPLOAD("admin","agent_files", "agent", $realestate_agent_id, "main_image_url", "main");   

    $update_values = array(        
        //'office_key' => $office_key, 
        'office_name' => $office_name,
        'office_mls_id' => $office_mls_id,
        'office_phone' => $office_phone,
        'office_email' => $office_email,
        'office_address1' => $office_address1,
        'office_address2' => $office_address2,
        'office_city' => $office_city,
        'office_state' => $office_state,
        'office_zip' => $office_zip,
        'logo_image_url' => $logo_image_url        
        
    );

    $db->update('realestate_office', $update_values, 'realestate_office_id = ' . $office_id);
    unset($update_values);

    FILE_UPLOAD("admin","office_files", "office", $office_key, "logo_image_url", "logo");        
    
    $update_values = array(
        'payment_amount' => $payment_amount,
    //    'is_paid' => $is_paid,
        'validity_period' => $validity_period,
        'desired_start_date' => $desired_start_date,
        'desired_end_date' => $desired_end_date,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'is_active' => $is_active,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    //'advertising_level' => $advertising_level,

    $db->update('ad_payments', $update_values, 'ad_payments_id = ' . $id);

}

if ($ac == "agent_pay_delete") {

    $id = $_GET['id'] ?? 0;
    
    $db->delete('ad_payments', 'section_type = 5 and listing_id = ' . $id);

    $db->delete('realestate_agents', 'realestate_agents_id = ' . $id);
    FILE_DELETE("admin","agent_files", "agent", $id, "main");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "confirm") {
    
    $id = $_GET["aid"];
    
    $update_values = array(
        'is_approved' => 1
    );    

    $result = $db->update('realestate_agents', $update_values, 'realestate_agent_id = '.$id);
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    
}
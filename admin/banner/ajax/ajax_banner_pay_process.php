<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use service\banner_pay_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "business_ad_payment";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/banner/service/service_banner_pay.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "banner_pay_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_banner_type" => $_GET['s_banner_type'] ?? "",
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_is_modify_yn" => $_GET['s_is_modify_yn'] ?? "",
        "s_is_approved" => $_GET['s_is_approved'] ?? "",        
        //  "s_is_paid" => $_GET['s_is_paid'] ?? "",
        "s_has_active_advertisement" => $_GET['s_has_active_advertisement'] ?? "",
        "s_kind" => $_GET['s_kind'],
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $banner_pay_list = new banner_pay_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "banner_pay_list_body.tpl");

    $tpl->setLoop("T_LOOP", $banner_pay_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $banner_pay_list->paging,
        "navigation_text" => $banner_pay_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if ($ac == "update_pay_banner") {

    $id = $_POST["id"];
    $ac_id = $_REQUEST['ac_id'] ?? "";
    $ap_id = $_REQUEST['ap_id'] ?? "";

    $banner_type = $_POST['banner_type'] ?? "";
    $banner_location = $_POST['banner_location'] ?? "";
    
    // 기업정보
    $company_name = $_POST['company_name'] ?? "";
    
    // 담당자 정보
    $contact_name = $_POST['contact_name'] ?? "";
    $contact_email = $_POST['contact_email'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";

    // 결제정보
    $payment_amount = $_POST['payment_amount'] ?? "";
    $is_paid = $_POST['is_paid'] ?? "";

    // 광고게시정보
    $validity_period = $_POST['validity_period'] ?? "";
    $desired_start_date = $_POST['desired_start_date'] ?? "";
    $desired_end_date = $_POST['desired_end_date'] ?? "";
    $start_date = $_POST['start_date'] ?? "";
    $end_date = $_POST['end_date'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $is_active = $_POST['is_active'] ?? "";
    $is_approved = $_POST['is_approved'] ?? 0;
    $is_modify_yn = $_POST['is_modify_yn'] ?? 0;
    
    $link_url = $_POST['link_url'] ?? "";

    

    $h_main_image_url = $_POST['h_main_image_url'] ?? "";
    $del_main_image_url = $_POST['del_main_image_url'] ?? "";
    $u_main_image_url = GET_UPLOAD_IMAGE($_FILES['main_image_url']['name'], $h_main_image_url, $del_main_image_url);

    if($del_main_image_url == 'Y') FILE_DELETE("admin", "banner_files", "banner", $id, "main");
                    
    $today = date("Ymd");
    
    if($start_date <= $today && $today <= $end_date) $has_active_advertisement = 1;
    else $has_active_advertisement = 0;

    $update_values = array(
        //'banner_type' => $banner_type,
        //'banner_location' => $banner_location,
        'main_image_url' => $u_main_image_url,                
        'company_name' => $company_name,
        'contact_name' => $contact_name,
        'contact_email' => $contact_email,
        'contact_phone' => $contact_phone,
        //'internal_notes' => $internal_notes,
        'link_url' => $link_url,                          
        'is_active' => $is_active,
        'has_active_advertisement' => $has_active_advertisement,
        'is_approved' => $is_approved,
        'is_modify_yn' => $is_modify_yn,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );
    
    $db->update('ad_banners', $update_values, 'ad_banner_id = ' . $id);
    unset($update_values);

    FILE_UPLOAD("admin", "banner_files", "banner", $id, "main_image_url", "main");
   
    $update_values = array(

        'payment_amount' => $payment_amount,
        'is_paid' => $is_paid,
        'validity_period' => $validity_period,
        'desired_start_date' => $desired_start_date,
        'desired_end_date' => $desired_end_date,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('ad_payments', $update_values, 'ad_payments_id = ' . $ap_id);

}

if ($ac == "banner_pay_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('ad_payments', 'section_type = 6 and listing_id =' . $id);
    
    $db->delete('ad_banners', 'ad_banner_id = ' . $id);
    FILE_DELETE("admin", "banner_files", "banner", $id, "main");

    $result_data = [
        "status" => "success",
        "msg" => "sucess"
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "confirm") {
    
    $id = $_GET["sid"];
    
    $update_values = array(
        'is_approved' => 1
    );    

    $result = $db->update('ad_banners', $update_values, 'ad_banner_id = '.$id);
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess"
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    
}
<?php

// error_reporting(E_ALL);
// ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use service\business_pay_list;

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
include("$DOCUMENT_ROOT/admin/community/service/service_business_pay.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "business_pay_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_is_modify_yn" => $_GET['s_is_modify_yn'] ?? "",
        "s_is_approved" => $_GET['s_is_approved'] ?? "",        
        //  "s_is_paid" => $_GET['s_is_paid'] ?? "",
        "s_has_active_advertisement" => $_GET['s_has_active_advertisement'] ?? "",
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_kind" => $_GET['s_kind'],
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $business_pay_list = new business_pay_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "business_pay_list_body.tpl");

    $tpl->setLoop("T_LOOP", $business_pay_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $business_pay_list->paging,
        "navigation_text" => $business_pay_list->navigation_text
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


if ($ac == "update_pay_business") {

    $id = $_POST["id"];
    $ac_id = $_REQUEST['ac_id'] ?? "";
    $ap_id = $_REQUEST['ap_id'] ?? "";

    // 기업정보
    $company_name = $_POST['company_name'] ?? "";
    $company_website = $_POST['company_website'] ?? "";
    $company_address = $_POST['company_address'] ?? "";

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
    $city_name = $_POST['city_name'] ?? "";
    $business_type = $_POST['business_type'] ?? "";
    $title = $_POST['title'] ?? "";
    $content = $_POST['content'] ?? "";
    $is_active = $_POST['is_active'] ?? "";
    $is_approved = $_POST['is_approved'] ?? 0;
    $is_modify_yn = $_POST['is_modify_yn'] ?? 0;

    // 담당자 정보
    $contact_name = $_POST['contact_name'] ?? "";
    $contact_email = $_POST['contact_email'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";


    $h_main_image_url = $_POST['h_main_image_url'] ?? "";
    $del_main_image_url = $_POST['del_main_image_url'] ?? "";
    $u_main_image_url = GET_UPLOAD_IMAGE($_FILES['main_image_url']['name'], $h_main_image_url, $del_main_image_url);

    $h_sub_image_01_url = $_POST['h_sub_image_01_url'] ?? "";
    $del_sub_image_01_url = $_POST['del_sub_image_01_url'] ?? "";
    $u_sub_image_01_url = GET_UPLOAD_IMAGE($_FILES['sub_image_01_url']['name'], $h_sub_image_01_url, $del_sub_image_01_url);

    $h_sub_image_02_url = $_POST['h_sub_image_02_url'] ?? "";
    $del_sub_image_02_url = $_POST['del_sub_image_02_url'] ?? "";
    $u_sub_image_02_url = GET_UPLOAD_IMAGE($_FILES['sub_image_02_url']['name'], $h_sub_image_02_url, $del_sub_image_02_url);
    
    $h_sub_image_03_url = $_POST['h_sub_image_03_url'] ?? "";
    $del_sub_image_03_url = $_POST['del_sub_image_03_url'] ?? "";
    $u_sub_image_03_url = GET_UPLOAD_IMAGE($_FILES['sub_image_03_url']['name'], $h_sub_image_03_url, $del_sub_image_03_url);
    
    $h_sub_image_04_url = $_POST['h_sub_image_04_url'] ?? "";
    $del_sub_image_04_url = $_POST['del_sub_image_04_url'] ?? "";
    $u_sub_image_04_url = GET_UPLOAD_IMAGE($_FILES['sub_image_04_url']['name'], $h_sub_image_04_url, $del_sub_image_04_url);
    
    $h_sub_image_05_url = $_POST['h_sub_image_05_url'] ?? "";
    $del_sub_image_05_url = $_POST['del_sub_image_05_url'] ?? "";
    $u_sub_image_05_url = GET_UPLOAD_IMAGE($_FILES['sub_image_05_url']['name'], $h_sub_image_05_url, $del_sub_image_05_url);
    
    if($del_main_image_url == 'Y') FILE_DELETE("admin", "business_files", "business", $id, "main");
    if($del_sub_image_01_url == 'Y') FILE_DELETE("admin", "business_files", "business", $id, "img1");
    if($del_sub_image_02_url == 'Y') FILE_DELETE("admin", "business_files", "business", $id, "img2");
    if($del_sub_image_03_url == 'Y') FILE_DELETE("admin", "business_files", "business", $id, "img3");
    if($del_sub_image_04_url == 'Y') FILE_DELETE("admin", "business_files", "business", $id, "img4");
    if($del_sub_image_05_url == 'Y') FILE_DELETE("admin", "business_files", "business", $id, "img5");
                    
    $today = date("Ymd");
    
    if($start_date <= $today && $today <= $end_date) $has_active_advertisement = 1;
    else $has_active_advertisement = 0;

    $update_values = array(
        'business_type' => $business_type,
        'main_image_url' => $u_main_image_url,
        'sub_image_01_url' => $u_sub_image_01_url,
        'sub_image_02_url' => $u_sub_image_02_url,
        'sub_image_03_url' => $u_sub_image_03_url,
        'sub_image_04_url' => $u_sub_image_04_url,
        'sub_image_05_url' => $u_sub_image_05_url,
        'title' => $title,
        'state_code' => $state_code,
        'city_name' => $city_name,
        'contact_name' => $contact_name,
        'contact_email' => $contact_email,
        'contact_phone' => $contact_phone,
        'content' => $content,
        'is_active' => $is_active,
        'has_active_advertisement' => $has_active_advertisement,
        'is_approved' => $is_approved,
        'is_modify_yn' => $is_modify_yn,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('community_business', $update_values, 'community_business_id = ' . $id);
    unset($update_values);

    FILE_UPLOAD("admin", "business_files", "business", $id, "main_image_url", "main");
    FILE_UPLOAD("admin", "business_files", "business", $id, "sub_image_01_url", "img1");
    FILE_UPLOAD("admin", "business_files", "business", $id, "sub_image_02_url", "img2");
    FILE_UPLOAD("admin", "business_files", "business", $id, "sub_image_03_url", "img3");
    FILE_UPLOAD("admin", "business_files", "business", $id, "sub_image_04_url", "img4");
    FILE_UPLOAD("admin", "business_files", "business", $id, "sub_image_05_url", "img5");
/*    
    $update_values = array(

        'company_name' => $company_name,
        'company_website' => $company_website,
        'company_address' => $company_address,
        'contact_name' => $contact_name,
        'contact_email' => $contact_email,
        'contact_phone' => $contact_phone,
        'updated_user' => $SS_NAME,
        'updated_at' => date('Y-m-d H:i:s')
    );


    $db->update('ad_company', $update_values, 'ad_company_id = ' . $ac_id);
    unset($update_values);
*/
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

    //'advertising_level' => $advertising_level,

    $db->update('ad_payments', $update_values, 'ad_payments_id = ' . $ap_id);

}

if ($ac == "business_pay_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('ad_payments', 'section_type = 3 and listing_id = ' . $id);
    
    $db->delete('community_business', 'community_business_id = ' . $id);
    FILE_DELETE("admin", "business_files", "business", $id, "main");
    FILE_DELETE("admin", "business_files", "business", $id, "img1");
    FILE_DELETE("admin", "business_files", "business", $id, "img2");
    FILE_DELETE("admin", "business_files", "business", $id, "img3");
    FILE_DELETE("admin", "business_files", "business", $id, "img4");
    FILE_DELETE("admin", "business_files", "business", $id, "img5");

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

    $result = $db->update('community_business', $update_values, 'community_business_id = '.$id);
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess"
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    
}
<?php

error_reporting(E_ALL & ~E_WARNING);

use BearTemplate\BearTemplate;
use service\vehicle_dealer_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "autodealer_manage";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/community/service/service_vehicle_dealer.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "vehicle_dealer_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_is_modify_yn" => $_GET['s_is_modify_yn'] ?? "",
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "title",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $vehicle_dealer_list = new vehicle_dealer_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "vehicle_dealer_list_body.tpl");

    $tpl->setLoop("T_LOOP", $vehicle_dealer_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $vehicle_dealer_list->paging,
        "navigation_text" => $vehicle_dealer_list->navigation_text
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

if ($ac == "update_vehicle_dealer") {

    $id = $_POST["id"];


    $company_name = $_POST['company_name'] ?? "";
    $company_website = $_POST['company_website'] ?? "";
    $dealer_website = $_POST['dealer_website'] ?? "";
    $contact_name = $_POST['contact_name'] ?? "";
    $contact_email = $_POST['contact_email'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";
    $listing_address1 = $_POST['listing_address1'] ?? "";
    $listing_address2 = $_POST['listing_address2'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $city_name = $_POST['city_name'] ?? "";
    $listing_zip = $_POST['listing_zip'] ?? "";
    $listing_zip_ext = $_POST['listing_zip_ext'] ?? "";
    $listing_country = $_POST['listing_country'] ?? "";
    $dealer_introduction = $_POST['dealer_introduction'] ?? "";

    $is_active = $_POST['is_active'] ?? 0;
    $is_modify_yn = $_POST['is_modify_yn'] ?? 0;

    $h_logo_url = $_POST['h_logo_url'] ?? "";
    $del_log_url = $_POST['del_log_url'] ?? "";
    $h_main_image_url = $_POST['h_main_image_url'] ?? "";
    $del_main_image_url = $_POST['del_main_image_url'] ?? "";

    $u_logo_url = GET_UPLOAD_IMAGE($_FILES['logo_url']['name'], $h_logo_url, $del_log_url);
    $u_main_image_url = GET_UPLOAD_IMAGE($_FILES['main_image_url']['name'], $h_main_image_url, $del_main_image_url);
    
    if($del_logo_url == 'Y') FILE_DELETE("admin", "vehicle_dealer_files", "vehicle_dealer", $id, "logo");
    if($del_main_image_url == 'Y') FILE_DELETE("admin", "vehicle_dealer_files", "vehicle_dealer", $id, "main");    

    $update_values = array(
        'company_name' => $company_name,
        'company_website' => $company_website,
        'dealer_website' => $dealer_website,
        'contact_name' => $contact_name,
        'contact_email' => $contact_email,
        'contact_phone' => $contact_phone,
        'listing_address1' => $listing_address1,
        'listing_address2' => $listing_address2,
        'state_code' => $state_code,
        'city_name' => $city_name,
        'listing_zip' => $listing_zip,
        'listing_zip_ext' => $listing_zip_ext,
        'listing_country' => $listing_country,
        'logo_url' => $u_logo_url,
        'main_image_url' => $u_main_image_url,
        'dealer_introduction' => $dealer_introduction,
        'is_active' => $is_active,
        'is_modify_yn' => $is_modify_yn,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')

    );

    $db->update('community_car_dealers', $update_values, 'community_car_dealers_id = ' . $id);

    if($_FILES['logo_url']['size'] > 0) FILE_UPLOAD("admin","vehicle_dealer_files", "vehicle_dealer", $id, "logo_url", "logo");
    if($_FILES['main_image_url']['size'] > 0) FILE_UPLOAD("admin","vehicle_dealer_files", "vehicle_dealer", $id, "main_image_url", "main");

}

if ($ac == "vehicle_dealer_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('ad_payments', 'section_type = 4 and listing_id = ' . $id);
    
    $db->delete('community_car_dealers', 'community_car_dealers_id = ' . $id);

    FILE_DELETE("admin","vehicle_dealer_files", "vehicle_dealer", $id, "logo");
    FILE_DELETE("admin","vehicle_dealer_files", "vehicle_dealer", $id, "main");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "confirm") {
    
    $id = $_GET["id"];
    
    $update_values = array(
        'is_active' => 1
    );    

    $result = $db->update('community_car_dealers', $update_values, 'community_car_dealers_id = '.$id);
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    
}

if($ac == "modify_yn") {
    
    $id = $_GET["id"];
    
    $update_values = array(
        'is_modify_yn' => 1
    );    

    $result = $db->update('community_car_dealers', $update_values, 'community_car_dealers_id = '.$id);
    
    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
    
}
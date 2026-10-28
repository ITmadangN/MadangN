<?php

error_reporting(E_ALL & ~E_WARNING);

use BearTemplate\BearTemplate;
use service\market_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "buysell_manage";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/community/service/service_market.php");

$ac = $_REQUEST['ac'];

if ($ac == "market_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_listing_type" => $_GET['s_listing_type'] ?? "",
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $market_list = new market_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "market_list_body.tpl");

    $tpl->setLoop("T_LOOP", $market_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $market_list->paging,
        "navigation_text" => $market_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if ($ac == "select_city_name") {

    $s_state_code = $_GET['s_state_code'] ?? "";

    $html = DB_ARRAY_ARRAY_RETURN(1, "", $db, "common_code", "code_sub_name", "code_sub", "code = '$s_state_code' order by code_sub_name asc");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if ($ac == "select_marketplace_type") {

    $listing_type = $_GET['listing_type'] ?? "market";

    $html = ARRAY_ARRAY_RETURN($define_val->DEFINE_market_marketplace_type[$listing_type], 1, '');

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),

    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if ($ac == "update_market") {

    $id = $_POST["id"];

    $listing_type = $_POST['listing_type'] ?? "";
    $marketplace_type = $_POST['marketplace_type'] ?? "";
    $title = $_POST['title'] ?? "";
    $state_code = $_POST['state_code'] ?? "";
    $city_name = $_POST['city_name'] ?? "";
    $marketplace_price = $_POST['marketplace_price'] ?? "";
    $contact_phone = $_POST['contact_phone'] ?? "";
    $description = $_POST['description'] ?? "";
    $internal_notes = $_POST['internal_notes'] ?? "";
    $is_active = $_POST['is_active'] ?? 0;

    $h_image_01_url = $_POST['h_image_01_url'] ?? "";
    $h_image_02_url = $_POST['h_image_02_url'] ?? "";
    $h_image_03_url = $_POST['h_image_03_url'] ?? "";
    $h_image_04_url = $_POST['h_image_04_url'] ?? "";
    $h_image_05_url = $_POST['h_image_05_url'] ?? "";
    $h_image_06_url = $_POST['h_image_06_url'] ?? "";

    $del_image_01_url = $_POST['del_image_01_url'] ?? "";
    $del_image_02_url = $_POST['del_image_02_url'] ?? "";
    $del_image_03_url = $_POST['del_image_03_url'] ?? "";
    $del_image_04_url = $_POST['del_image_04_url'] ?? "";
    $del_image_05_url = $_POST['del_image_05_url'] ?? "";
    $del_image_06_url = $_POST['del_image_06_url'] ?? "";

    $u_image_01_url = GET_UPLOAD_IMAGE($_FILES['image_01_url']['name'], $h_image_01_url, $del_image_01_url);
    $u_image_02_url = GET_UPLOAD_IMAGE($_FILES['image_02_url']['name'], $h_image_02_url, $del_image_02_url);
    $u_image_03_url = GET_UPLOAD_IMAGE($_FILES['image_03_url']['name'], $h_image_03_url, $del_image_03_url);
    $u_image_04_url = GET_UPLOAD_IMAGE($_FILES['image_04_url']['name'], $h_image_04_url, $del_image_04_url);
    $u_image_05_url = GET_UPLOAD_IMAGE($_FILES['image_05_url']['name'], $h_image_05_url, $del_image_05_url);
    $u_image_06_url = GET_UPLOAD_IMAGE($_FILES['image_06_url']['name'], $h_image_06_url, $del_image_06_url);
            
    if($del_image_01_url == 'Y') FILE_DELETE("admin", "market_files", "market", $id, "img1");
    if($del_image_02_url == 'Y') FILE_DELETE("admin", "market_files", "market", $id, "img2");
    if($del_image_03_url == 'Y') FILE_DELETE("admin", "market_files", "market", $id, "img3");
    if($del_image_04_url == 'Y') FILE_DELETE("admin", "market_files", "market", $id, "img4");
    if($del_image_05_url == 'Y') FILE_DELETE("admin", "market_files", "market", $id, "img5");
    if($del_image_06_url == 'Y') FILE_DELETE("admin", "market_files", "market", $id, "img6");

    $update_values = array(
        'listing_type' => $listing_type,
        'marketplace_type' => $marketplace_type,
        'title' => $title,
        'state_code' => $state_code,
        'city_name' => $city_name,
        'marketplace_price' => $marketplace_price,
        'contact_phone' => $contact_phone,
        'description' => $description,
        'image_01_url' => $u_image_01_url,
        'image_02_url' => $u_image_02_url,
        'image_03_url' => $u_image_03_url,
        'image_04_url' => $u_image_04_url,
        'image_05_url' => $u_image_05_url,
        'image_06_url' => $u_image_06_url,
        'internal_notes' => $internal_notes,
        'is_active' => $is_active,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('community_marketplace_listings', $update_values, 'community_marketplace_listings_id = ' . $id);

    FILE_UPLOAD("admin","market_files", "market", $id, "image_01_url", "img1");
    FILE_UPLOAD("admin","market_files", "market", $id, "image_02_url", "img2");
    FILE_UPLOAD("admin","market_files", "market", $id, "image_03_url", "img3");
    FILE_UPLOAD("admin","market_files", "market", $id, "image_04_url", "img4");
    FILE_UPLOAD("admin","market_files", "market", $id, "image_05_url", "img5");
    FILE_UPLOAD("admin","market_files", "market", $id, "image_06_url", "img6");
}

if ($ac == "market_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('community_marketplace_listings', 'community_marketplace_listings_id = ' . $id);

    FILE_DELETE("admin", "market_files", "market", $id, "img1");
    FILE_DELETE("admin", "market_files", "market", $id, "img2");
    FILE_DELETE("admin", "market_files", "market", $id, "img3");
    FILE_DELETE("admin", "market_files", "market", $id, "img4");
    FILE_DELETE("admin", "market_files", "market", $id, "img5");
    FILE_DELETE("admin", "market_files", "market", $id, "img6");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

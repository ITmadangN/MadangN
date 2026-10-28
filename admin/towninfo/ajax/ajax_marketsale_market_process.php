<?php

//    error_reporting(E_ALL);
//    ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use service\marketsale_market_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "marketsale_market_manage";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/towninfo/service/service_marketsale_market.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "marketsale_market_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $marketsale_market_list = new marketsale_market_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "marketsale_market_list_body.tpl");

    $tpl->setLoop("T_LOOP", $marketsale_market_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $marketsale_market_list->paging,
        "navigation_text" => $marketsale_market_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if ($ac == "write_marketsale_market") {


    $market_name = $_POST['market_name'] ?? "";
    $contact_name = $_GET['contact_name'] ?? '';
    $contact_email = $_GET['contact_email'] ?? '';
    $contact_phone = $_GET['contact_phone'] ?? '';
    
    $is_active = $_POST['is_active'] ?? 0;


    $p_market_logo_url = GET_UPLOAD_IMAGE($_FILES['market_logo_url']['name'], '', '');

    // $u_main_image_url = GET_UPLOAD_IMAGE($_FILES['main_image_url']['name'], '', '');


    $insert_values = array(

        'market_name' => $market_name,
        'market_logo_url' => $p_market_logo_url,
        'contact_name' => $contact_name,
        'contact_email' => $contact_email,
        'contact_phone' => $contact_phone,
        'is_active' => $is_active,        
        'created_user' => $SS_NICKNAME,
        'created_at' => date('Y-m-d H:i:s')
    );

    $db->insert('towninfo_marketsale_market', $insert_values);
    $lastInsertId = $db->getLastInsertId();

    FILE_UPLOAD("admin","marketsale_market_files", "marketsale_market", $lastInsertId, "market_logo_url", "logo");
//    FILE_UPLOAD("admin","marketsale_market_files", "marketsale_market", $lastInsertId, "main_image_url", "main");


}


if ($ac == "update_marketsale_market") {

    $id = $_POST["id"];

    $market_name = $_POST['market_name'] ?? "";
    $contact_name = $_POST['contact_name'] ?? '';
    $contact_email = $_POST['contact_email'] ?? '';
    $contact_phone = $_POST['contact_phone'] ?? '';
    $is_active = $_POST['is_active'] ?? 0;

    $h_market_logo_url = $_POST['h_market_logo_url'] ?? "";
    
    $del_market_logo_url = $_POST['del_market_logo_url'] ?? "";

    $p_market_logo_url = GET_UPLOAD_IMAGE($_FILES['market_logo_url']['name'], $h_market_logo_url, $del_market_logo_url);
 //   $u_main_image_url = GET_UPLOAD_IMAGE($_FILES['main_image_url']['name'], $h_main_image_url, $del_main_image_url);

    $update_values = array(

        'market_name' => $market_name,
        'market_logo_url' => $p_market_logo_url,
        'contact_name' => $contact_name,
        'contact_email' => $contact_email,
        'contact_phone' => $contact_phone,
        'is_active' => $is_active,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('towninfo_marketsale_market', $update_values, 'towninfo_marketsale_market_id = ' . $id);

    FILE_UPLOAD("admin","marketsale_market_files", "marketsale_market", $id, "market_logo_url", "logo");
//    FILE_UPLOAD("admin","marketsale_market_files", "marketsale_market", $id, "main_image_url", "main");

}


if($ac == "marketsale_market_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('towninfo_marketsale_market', 'towninfo_marketsale_market_id = ' . $id);
    FILE_DELETE("admin","marketsale_market_files", "marketsale_market", $id, "logo");
    // FILE_DELETE("admin","marketsale_market_files", "marketsale_market", $id, "main");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}

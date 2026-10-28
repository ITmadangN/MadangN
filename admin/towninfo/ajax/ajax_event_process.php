<?php

error_reporting(E_ALL & ~E_WARNING);

use BearTemplate\BearTemplate;
use service\event_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "madangn_event_manage";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/towninfo/service/service_event.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "event_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_category" => $_GET['s_category'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $event_list = new event_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "event_list_body.tpl");

    $tpl->setLoop("T_LOOP", $event_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $event_list->paging,
        "navigation_text" => $event_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if ($ac == "write_event") {


    $title = $_POST['title'] ?? "";
    $event_start_date = $_POST['event_start_date'] ?? "";
    $event_end_date = $_POST['event_end_date'] ?? "";
    $description = $_POST['description'] ?? "";
    $is_active = $_POST['is_active'] ?? 0;


    $u_list_image = GET_UPLOAD_IMAGE($_FILES['list_image']['name'], '', '');

    $u_image_01_url = GET_UPLOAD_IMAGE($_FILES['image_01_url']['name'], '', '');
    $u_image_02_url = GET_UPLOAD_IMAGE($_FILES['image_02_url']['name'], '', '');
    $u_image_03_url = GET_UPLOAD_IMAGE($_FILES['image_03_url']['name'], '', '');


    $insert_values = array(

        'title' => $title,
        'event_start_date' => $event_start_date,
        'event_end_date' => $event_end_date,
        'description' => $description,
        'list_image'   => $u_list_image,
        'image_01_url' => $u_image_01_url,
        'image_02_url' => $u_image_02_url,
        'image_03_url' => $u_image_03_url,
        'is_active' => $is_active,        
        'created_user' => $SS_NICKNAME,
        'created_at' => date('Y-m-d H:i:s')
    );

    $db->insert('towninfo_madangn_event', $insert_values);
    $lastInsertId = $db->getLastInsertId();

    FILE_UPLOAD("admin","event_files", "event", $lastInsertId, "list_image", "list");
    FILE_UPLOAD("admin","event_files", "event", $lastInsertId, "image_01_url", "img1");
    FILE_UPLOAD("admin","event_files", "event", $lastInsertId, "image_02_url", "img2");
    FILE_UPLOAD("admin","event_files", "event", $lastInsertId, "image_03_url", "img3");

}


if ($ac == "update_event") {

    $id = $_POST["id"];

    $title = $_POST['title'] ?? "";
    $event_start_date = $_POST['event_start_date'] ?? "";
    $event_end_date = $_POST['event_end_date'] ?? "";
    $description = $_POST['description'] ?? "";
    $is_active = $_POST['is_active'] ?? 0;

    $h_list_image = $_POST['h_list_image'] ?? "";
    $h_image_01_url = $_POST['h_image_01_url'] ?? "";
    $h_image_02_url = $_POST['h_image_02_url'] ?? "";
    $h_image_03_url = $_POST['h_image_03_url'] ?? "";

    $del_list_image = $_POST['del_list_image'] ?? "";
    $del_image_01_url = $_POST['del_image_01_url'] ?? "";
    $del_image_02_url = $_POST['del_image_02_url'] ?? "";
    $del_image_03_url = $_POST['del_image_03_url'] ?? "";

    $u_list_image = GET_UPLOAD_IMAGE($_FILES['list_image']['name'], $h_list_image, $del_list_image);

    $u_image_01_url = GET_UPLOAD_IMAGE($_FILES['image_01_url']['name'], $h_image_01_url, $del_image_01_url);
    $u_image_02_url = GET_UPLOAD_IMAGE($_FILES['image_02_url']['name'], $h_image_02_url, $del_image_02_url);
    $u_image_03_url = GET_UPLOAD_IMAGE($_FILES['image_03_url']['name'], $h_image_03_url, $del_image_03_url);
    
    if($del_list_image == 'Y') FILE_DELETE("admin", "event_files", "event", $id, "list");
    if($del_image_01_url == 'Y') FILE_DELETE("admin", "event_files", "event", $id, "img1");
    if($del_image_02_url == 'Y') FILE_DELETE("admin", "event_files", "event", $id, "img2");
    if($del_image_03_url == 'Y') FILE_DELETE("admin", "event_files", "event", $id, "img3");


    $update_values = array(

        'title' => $title,
        'event_start_date' => $event_start_date,
        'event_end_date' => $event_end_date,
        'description' => $description,
        'list_image' => $u_list_image,
        'image_01_url' => $u_image_01_url,
        'image_02_url' => $u_image_02_url,
        'image_03_url' => $u_image_03_url,
        'is_active' => $is_active,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('towninfo_madangn_event', $update_values, 'towninfo_madangn_event_id = ' . $id);

    FILE_UPLOAD("admin","event_files", "event", $id, "list_image", "list");
    FILE_UPLOAD("admin","event_files", "event", $id, "image_01_url", "img1");
    FILE_UPLOAD("admin","event_files", "event", $id, "image_02_url", "img2");
    FILE_UPLOAD("admin","event_files", "event", $id, "image_03_url", "img3");

}


if($ac == "event_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('towninfo_madangn_event', 'towninfo_madangn_event_id = ' . $id);
    FILE_DELETE("admin","event_files", "event", $id, "list");
    FILE_DELETE("admin","event_files", "event", $id, "img1");
    FILE_DELETE("admin","event_files", "event", $id, "img2");
    FILE_DELETE("admin","event_files", "event", $id, "img3");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}

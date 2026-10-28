<?php

error_reporting(E_ALL & ~E_WARNING);

use BearTemplate\BearTemplate;
use service\notification_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "eventnoti_manage";
$ajax_in = "Y";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/admin/towninfo/service/service_notification.php");

$ac = $_REQUEST['ac'] ?? "";

if ($ac == "notification_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_is_active" => $_GET['s_is_active'] ?? "",
        "s_category" => $_GET['s_category'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" => $_GET['s_cnt'] ? (int)$_GET['s_cnt'] : 10,
        "block_set" => 10
    );

    $notification_list = new notification_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl', false);
    $tpl->setFile("main", "find_people_list_body.tpl");

    $tpl->setLoop("T_LOOP", $notification_list->loop);

    $tpl->tprint("main");

    $content = $tpl->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $notification_list->paging,
        "navigation_text" => $notification_list->navigation_text
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}


if ($ac == "update_notification") {

    $id = $_POST["id"];

    $category = $_POST['category'] ?? "";
    $title = $_POST['title'] ?? "";
    $description = $_POST['description'] ?? "";
    $is_active = $_POST['is_active'] ?? 0;

    $h_image_01_url = $_POST['h_image_01_url'] ?? "";
    $h_image_02_url = $_POST['h_image_02_url'] ?? "";
    $h_image_03_url = $_POST['h_image_03_url'] ?? "";

    $del_image_01_url = $_POST['del_image_01_url'] ?? "";
    $del_image_02_url = $_POST['del_image_02_url'] ?? "";
    $del_image_03_url = $_POST['del_image_03_url'] ?? "";

    $u_image_01_url = GET_UPLOAD_IMAGE($_FILES['image_01_url']['name'], $h_image_01_url, $del_image_01_url);
    $u_image_02_url = GET_UPLOAD_IMAGE($_FILES['image_02_url']['name'], $h_image_02_url, $del_image_02_url);
    $u_image_03_url = GET_UPLOAD_IMAGE($_FILES['image_03_url']['name'], $h_image_03_url, $del_image_03_url);
    
    if($del_image_01_url == 'Y') FILE_DELETE("admin", "notification_files", "notification", $id, "img1");
    if($del_image_02_url == 'Y') FILE_DELETE("admin", "notification_files", "notification", $id, "img2");
    if($del_image_03_url == 'Y') FILE_DELETE("admin", "notification_files", "notification", $id, "img3");


    $update_values = array(

        'category' => $category,
        'title' => $title,
        'description' => $description,
        'image_01_url' => $u_image_01_url,
        'image_02_url' => $u_image_02_url,
        'image_03_url' => $u_image_03_url,
        'is_active' => $is_active,
        'updated_user' => $SS_NICKNAME,
        'updated_at' => date('Y-m-d H:i:s')
    );

    $db->update('towninfo_event_notification', $update_values, 'towninfo_event_notification_id = ' . $id);

    FILE_UPLOAD("admin","notification_files", "notification", $id, "image_01_url", "img1");
    FILE_UPLOAD("admin","notification_files", "notification", $id, "image_02_url", "img2");
    FILE_UPLOAD("admin","notification_files", "notification", $id, "image_03_url", "img3");

}


if($ac == "notification_delete") {

    $id = $_GET['id'] ?? 0;

    $db->delete('towninfo_event_notification', 'towninfo_event_notification_id = ' . $id);
    FILE_DELETE("admin","notification_files", "notification", $id, "img1");
    FILE_DELETE("admin","notification_files", "notification", $id, "img2");
    FILE_DELETE("admin","notification_files", "notification", $id, "img3");

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}

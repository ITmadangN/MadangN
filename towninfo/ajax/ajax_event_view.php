<?php

use BearTemplate\BearTemplate;
use common_service\service_reply_list;
use common_service\service_reply_write;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/common_service/service_reply_list.php");
include("$DOCUMENT_ROOT/common_service/service_reply_write.php");


$ac = $_REQUEST['ac'];

if($ac == "reply_list") {

    $fn_params = array(
        "parent_code" => $_GET['parent_code'] ?? 1,
        "parent_id" => $_GET['parent_id'] ?? ""
    );

    $reply_list = new service_reply_list($db, $define_val, $fn_params);

    $html = $reply_list->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html)
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

if($ac == "reply_save") {

    $user_id = $_SESSION['user_id'] ?? "";
    $comments = $_GET['comments'] ?? "";
    $ip_address = $_SERVER['REMOTE_ADDR'];

    $fn_params = array(
        "parent_code" => $_GET['parent_code'] ?? "towninfo_event",
        "parent_id" => $_GET['parent_id'] ?? "",
        "user_id" => $user_id = $_SESSION['user_id'] ?? "",
        "comments" => $comments = $_GET['comments'] ?? "",
        "ip_address" => $_SERVER['REMOTE_ADDR']
    );

    $reply_write = new service_reply_write($db, $define_val, $fn_params);

    $reply_list = new service_reply_list($db, $define_val, $fn_params);

    $html = $reply_list->content;

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html)
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}
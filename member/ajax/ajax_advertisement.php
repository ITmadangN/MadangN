<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use user_service\advertisement_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/member/service/service_advertisement.php");

$ac = $_REQUEST['ac'];

if($ac == "advertisement_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_type" => $_GET['s_type'] ?? "",
        "page_set" =>  $_GET['s_cnt'] ?? 10,
        "block_set" => 10
    );

    $memo_list = new advertisement_list($db, $db2, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "advertisement_body.tpl");
    $tpl->setLoop("T_LOOP", $memo_list->loop);
    $tpl->tprint("main");
    $content = $tpl->content;
    unset($tpl);


    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $content),
        "pagging" => $memo_list->paging,
        "navigation_text" => ""
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}

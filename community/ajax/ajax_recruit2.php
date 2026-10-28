<?php

use user_service\recruit_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/community/service/service_recruit.php");

$ac = $_REQUEST['ac'];

if($ac == "recruit_list") {

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" =>  $_GET['s_cnt'] ? (int)$_GET['s_cnt']: 10,
        "block_set" => 10
    );

    $recruit_list = new recruit_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "recruit_platinum_body.tpl");
    $tpl->setLoop("T_LOOP_PLATINUM", $recruit_list->loop_platinum);
    $tpl->tprint("main");
    $content_platinum = $tpl->content;
    unset($tpl);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "recruit_gold_body.tpl");
    $tpl->setLoop("T_LOOP_GOLD", $recruit_list->loop_gold);
    $tpl->tprint("main");
    $content_gold = $tpl->content;
    unset($tpl);

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "recruit_regular_body.tpl");
    $tpl->setLoop("T_LOOP_REGULAR", $recruit_list->loop_regular);
    $tpl->tprint("main");
    $content_regular = $tpl->content;
    unset($tpl);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => array($content_platinum, $content_gold, $content_regular),
        "pagging" => $recruit_list->paging,
        "navigation_text" => ""
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);
}
<?php

use youtube\youtube;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/youtube/service/youtube.php");


$fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_sort" => $_GET['s_sort'] ?? "newest",
        "s_category_1" => $_GET['s_category_1'] ?? "insure",
        "s_category_2" => $_GET['s_category_2'] ?? "unity",
        "page_set" =>  10,
        "block_set" => 10
);

$youtube_list = new youtube($db, $define_val, $fn_params);

$active1 = "";
$active2 = "";
$active3 = "";
$active4 = "";
$active5 = "";
$active6 = "";
$active7 = "";

switch($fn_params['s_category_2']) {
    case "unity" : $active1 = "nactive"; break;
    case "bridgeone" : $active2 = "nactive"; break;
    case "money" : $active3 = "nactive"; break;
    case "medicare" : $active4 = "nactive"; break;
    case "obama" : $active5 = "nactive"; break;
    case "moneywise" : $active6 = "nactive"; break;
    case "ishorts" : $active7 = "nactive"; break;
}

$sort1 = "";
$sort2 = "";
if($fn_params['s_sort'] == "newest") $sort1 = "nactive";
else $sort2 = "nactive";

$main=2;
$sub=3;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "financial.tpl");

$tpl->setVar("T_ACTIVE_1",$active1);
$tpl->setVar("T_ACTIVE_2",$active2);
$tpl->setVar("T_ACTIVE_3",$active3);
$tpl->setVar("T_ACTIVE_4",$active4);
$tpl->setVar("T_ACTIVE_5",$active5);
$tpl->setVar("T_ACTIVE_6",$active6);
$tpl->setVar("T_ACTIVE_7",$active7);

$tpl->setVar("T_SORT_1",$sort1);
$tpl->setVar("T_SORT_2",$sort2);

$tpl->setVar("T_CATEGORY_2",$fn_params['s_category_2']);

$tpl->setLoop("T_LOOP", $youtube_list->loop);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

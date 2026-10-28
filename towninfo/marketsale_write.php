<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$sql = "SELECT * FROM towninfo_marketsale_users WHERE user_id = :user_id";
$placeholders = ['user_id' => $SS_ID];

$result = $db->query($sql, $placeholders);
if (!$result) {
    echo "데이터가 없습니다.";
    exit;
}

$row = $db->fetch();
if (!$row) {
    echo "데이터가 없습니다.";
    exit;
}

$p_towninfo_marketsale_market_id = $row->towninfo_marketsale_market_id;
$p_user_id = $row->user_id;
$p_is_active = $row->is_active;

$market_name = GET_MARKET_NAME($db,$p_towninfo_marketsale_market_id);

$blank_img = "";

if ($p_towninfo_marketsale_market_id != "") {
    $v_logo_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=marketsale_market&d=logo&s=" . $p_towninfo_marketsale_market_id;
    $v_logo_url = "<img src=\"$v_logo_url\" alt=\"\" style=\"margin-left:50px;height:25px;\" />";
} else {
    $v_logo_url = $blank_img;
}


$main = 4;
$sub = 2;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "marketsale_write.tpl");

$tpl->setVar("T_MARKET_NAME",$market_name);
$tpl->setVar("T_TOWNINFO_MARKETSALE_MARKET_ID",$p_towninfo_marketsale_market_id);
$tpl->setVar("T_IMG",$v_logo_url);
$tpl->setVar("SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc"));
$tpl->setVar("SELECT_WEEKLY_ADS_FLYER_SITE", GET_MARKETSALE_REGION(-1, '', '', '', $db,"주를 선택하세요"));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");


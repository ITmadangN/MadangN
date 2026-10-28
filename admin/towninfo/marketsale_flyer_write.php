<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "marketsale_flyer_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$main = 5;
$sub = 6;
$mtitle = "타운정보";
$stitle = "마켓세일 전단지 등록";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "marketsale_flyer_write.tpl");

$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, ''));
$tpl->setVar("SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(-1, "", $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc","주 선택"));
$tpl->setVar("SELECT_MARKET", DB_ARRAY_MARKET_RETURN(-1, "", $db,"마켓선택"));
$tpl->setVar("SELECT_WEEKLY_ADS_FLYER_SITE", GET_MARKETSALE_REGION(-1, "", "", "", $db,"마켓을 먼저 선택하세요"));


include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

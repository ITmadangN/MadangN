<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "buysell_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$main = 4;
$sub = 3;
$mtitle = "커뮤니티";
$stitle = "사고팔고 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "market_list.tpl");

$tpl->setVar("S_SELECT_S_IS_ACTIVE",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,-1,"","Active 여부"));
$tpl->setVar("S_SELECT_LISTING_TYPE", ARRAY_ARRAY_RETURN($define_val->DEFINE_market_listing_type, -1, "","마켓타입"));
$tpl->setVar("S_SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(-1, "", $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc","주선택"));
$tpl->setVar("S_SELECT_CITY_NAME", ARRAY_ARRAY_RETURN($define_val->DEFINE_blank, -1, "","도시선택"));
$tpl->setVar("S_SELECT_MARKET_KIND", ARRAY_ARRAY_RETURN($define_val->DEFINE_market_s_kind, -1, "","전체"));
$tpl->setVar("S_SELECT_CNT", ARRAY_ARRAY_RETURN($define_val->DEFINE_list_count, 0, ""));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

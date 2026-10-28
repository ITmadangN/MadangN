<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "realestate_listing_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$main = 6;
$sub = 1;
$mtitle = "부동산";
$stitle = "부동산 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "realstate_list.tpl");

$tpl->setVar("S_SELECT_S_IS_ACTIVE",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,-1,"","Active 여부"));
$tpl->setVar("S_SELECT_PROPERTY_TYPE", ARRAY_ARRAY_RETURN($define_val->DEFINE_realstate_property_type, -1, "","타입"));
$tpl->setVar("S_SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(-1, "", $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc","주선택"));
$tpl->setVar("S_SELECT_CITY_NAME", ARRAY_ARRAY_RETURN($define_val->DEFINE_blank, -1, "","도시선택"));
$tpl->setVar("S_SELECT_REALSTATE_KIND", ARRAY_ARRAY_RETURN($define_val->DEFINE_realestate_s_kind, 0, ""));
$tpl->setVar("S_SELECT_CNT", ARRAY_ARRAY_RETURN($define_val->DEFINE_list_count, 0, ""));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

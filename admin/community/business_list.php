<?php


use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "business_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$business_type_define = $define_val->DEFINE_blank;
if (isset($define_val->DEFINE_business_type)) {
    $business_type_define = $define_val->DEFINE_business_type;
}

$main = 4;
$sub = 5;
$mtitle = "커뮤니티";
$stitle = "비즈니스 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "business_list.tpl");

$tpl->setVar("S_SELECT_S_IS_ACTIVE",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,-1,"","Active 여부"));
$tpl->setVar("S_SELECT_S_IS_MODIFY_YN",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,-1,"","수정가능 여부"));
$tpl->setVar("S_SELECT_ADVERTISING_LEVEL", ARRAY_ARRAY_RETURN($define_val->DEFINE_recruit_advertising_level, -1, "","광고종류"));
$tpl->setVar("S_SELECT_BUSINESS_TYPE", ARRAY_ARRAY_RETURN($business_type_define, -1, "","비지니스 타입"));
$tpl->setVar("S_SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(-1, "", $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc","주선택"));
$tpl->setVar("S_SELECT_CITY_NAME", ARRAY_ARRAY_RETURN($define_val->DEFINE_blank, -1, "","도시선택"));
$tpl->setVar("S_SELECT_BUSINESS_KIND", ARRAY_ARRAY_RETURN($define_val->DEFINE_business_s_kind, 0, ""));
$tpl->setVar("S_SELECT_CNT", ARRAY_ARRAY_RETURN($define_val->DEFINE_list_count, 0, ""));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

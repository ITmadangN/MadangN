<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "eventnoti_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$main = 5;
$sub = 3;
$mtitle = "타운정보";
$stitle = "행사/알림 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "notification_list.tpl");

$tpl->setVar("S_SELECT_S_IS_ACTIVE",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,-1,"","Active 여부"));
$tpl->setVar("S_SELECT_CATEGORY", ARRAY_ARRAY_RETURN($define_val->DEFINE_notification_category, -1, "","키테고리"));
$tpl->setVar("S_SELECT_NOTIFICATION_KIND", ARRAY_ARRAY_RETURN($define_val->DEFINE_notification_s_kind, 0, ""));
$tpl->setVar("S_SELECT_CNT", ARRAY_ARRAY_RETURN($define_val->DEFINE_list_count, 0, ""));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

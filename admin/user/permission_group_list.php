<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "permission_setting";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$main = 7;
$sub = 2;
$mtitle = "Setting";
$stitle = "권한그룹 설정";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "permission_group_list.tpl");


$tpl->setVar("S_SELECT_PERMISSION_GROUP_KIND", ARRAY_ARRAY_RETURN($define_val->DEFINE_permission_group_s_kind, 0, ""));
$tpl->setVar("S_SELECT_CNT", ARRAY_ARRAY_RETURN($define_val->DEFINE_list_count, 0, ""));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

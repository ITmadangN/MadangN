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
include("$DOCUMENT_ROOT/admin/user/include/permission_common.php");



$main = 7;
$sub = 2;
$mtitle = "Setting";
$stitle = "권한그룹 등록";
$ytitle = "";
$page = "";

$permission_html =  render_permission_checkboxes($permission_list); 

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "permission_group_write.tpl");

$tpl->setVar("T_PERMISSION_HTML", $permission_html);

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "news_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");



$main=2;
$sub=3;
$mtitle="뉴스";
$stitle="뉴스 게시물 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "news_write.tpl");

$tpl->setVar("SELECT_SECTION", ARRAY_ARRAY_RETURN($define_val->DEFINE_news_section, 1, ''));
$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, ''));
$tpl->setVar("T_REPORT_DATE", date("Y-m-d H:i:s"));
include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

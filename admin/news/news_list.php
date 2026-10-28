<?php

use BearTemplate\BearTemplate;
use service\news_list;

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
$tpl->setFile("main", "news_list.tpl");

$tpl->setVar("S_SELECT_S_IS_ACTIVE",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,-1,"","Active 여부"));
$tpl->setVar("S_SELECT_SECTION",ARRAY_ARRAY_RETURN($define_val->DEFINE_news_section,-1,"","섹션"));
$tpl->setVar("S_SELECT_NEWS_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_news_s_kind,0,""));
$tpl->setVar("S_SELECT_CNT",ARRAY_ARRAY_RETURN($define_val->DEFINE_list_count,0,""));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

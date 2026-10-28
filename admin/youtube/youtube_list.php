<?php


use BearTemplate\BearTemplate;
use service\youtube_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "youtube_all_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/admin/youtube/service/youtube_list.php");

$main=3;
$sub=2;
$mtitle="유튜브";
$stitle="Youtube 전체 동영상 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "youtube_list.tpl");

$tpl->setVar("S_SELECT_S_IS_ACTIVE",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active,-1,"","Active 여부"));
$tpl->setVar("S_SELECT_CHANNEL_ID",ARRAY_ARRAY_RETURN($define_val->DEFINE_youtube_channel,-1,"","채널"));
$tpl->setVar("S_SELECT_CATEGORY_1",ARRAY_ARRAY_RETURN($define_val->DEFINE_youtube_category1,-1,"","대분류"));
$tpl->setVar("S_SELECT_CATEGORY_2",ARRAY_ARRAY_RETURN($define_val->DEFINE_blank,-1,'','중분류'));
$tpl->setVar("S_SELECT_CNT",ARRAY_ARRAY_RETURN($define_val->DEFINE_list_count,0,""));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

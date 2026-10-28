<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


if($SS_ID == "") $register = "<a href=\"javascript:return false;\" onclick=\"alert('로그인을 먼저 진행해주세요')\" class=\"btn btn-primary2 btn-sm\">행사알림 등록</a>";
else $register = "<a href=\"/towninfo/notification_write.php\" class=\"btn btn-primary2 btn-sm\">행사알림 등록</a>";


$main=4;
$sub=4;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "notification.tpl");

$tpl->setVar("T_REGISTER",$register);

$tpl->setVar("S_SELECT_CATEGORY",ARRAY_ARRAY_RETURN($define_val->DEFINE_notification_category,0,""));
$tpl->setVar("S_SELECT_NOTIFICATION_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_notification_s_kind,0,""));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");


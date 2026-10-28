<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$page="index";
$main="0";
$sub="1";
$mtitle="멤버";
$stitle="쪽지함";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "memo.tpl");

$tpl->setVar("S_SELECT_MEMO_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_memo_type,0,""));
$tpl->setVar("S_SELECT_MESSAGES_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_messages_s_kind,1,""));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

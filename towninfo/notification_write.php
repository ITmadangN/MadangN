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


$main=4;
$sub=4;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "notification_write.tpl");

$tpl->setVar("S_SELECT_CATEGORY",ARRAY_ARRAY_RETURN($define_val->DEFINE_notification_category,0,""));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

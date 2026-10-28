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
$mtitle="마이페이지";
$stitle="광고신청";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "advertisement.tpl");

$tpl->setVar("S_SELECT_ADVERTISEMENT_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_advertisement_type,0,""));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

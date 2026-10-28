<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");

include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$main=5;
$sub=6;
$mtitle="유료광고신청";
$stitle="에이전트&매물광고";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "ad_04.tpl");

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");


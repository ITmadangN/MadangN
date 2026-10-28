<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$page="index";
$main=0;
$sub=1;
$mtitle="멤버";
$stitle="회원가입";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "register.tpl");

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

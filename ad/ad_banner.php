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


$main="6";
$sub="2";
$mtitle="유료광고신청";
$stitle="유료 배너 광고";
$page = "";

$save_method = $_GET['save_method'] ?? 'recruit_platinum';

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "ad_banner.tpl");

$tpl->setVar("T_PAY_YN_BANNER",$define_val->PAY_YN_BANNER);

$tpl->setVar("T_SAVE_METHOD",$save_method);

$tpl->setVar("SELECT_VALIDITY_PERIOD",ARRAY_ARRAY_RETURN($define_val->DEFINE_validity_period,-1,"","기간선택"));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

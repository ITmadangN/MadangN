<?php

use BearTemplate\BearTemplate;
use youtube\youtube;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/youtube/service/youtube.php");

$section = $_GET['section'] ?? "unity";

$main=2;
$sub=3;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "financial.tpl");

if($section != "") $tpl->setVar("T_SECTION",$section);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

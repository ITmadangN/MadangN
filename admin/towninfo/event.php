<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$main=4;
$sub=5;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "event.tpl");

$tpl->setVar("S_SELECT_EVENT_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_event_s_kind,0,""));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");


$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "test.tpl");

$tpl->setVar("오른쪽-1_link","가나다라");

$tpl->tprint("main");

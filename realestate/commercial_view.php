<?php

use BearTemplate\BearTemplate;


//error_reporting(E_ALL);
//ini_set('display_errors', '1');

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$id = $_GET["id"] ?? "";


//$property_type = "Commercial";
$s_menu = "Commercial";
$php_view = "commercial_view";
$body_tpl_name = "realestate_commercial_body.tpl";


include("$DOCUMENT_ROOT/realestate/include/include_view.php");

include("$DOCUMENT_ROOT/realestate/include/include_view_img.php");

$main="5";
$sub="4";
$page = "";                                        

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "commercial_view.tpl");

include("$DOCUMENT_ROOT/realestate/include/include_view_tpl.php");

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

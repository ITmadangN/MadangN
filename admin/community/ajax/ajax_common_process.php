<?php

error_reporting(E_ALL & ~E_WARNING);

use BearTemplate\BearTemplate;
use Migliori\PowerLitePdo\Db;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");


$ac = $_REQUEST['ac'] ?? "";

if ($ac == "select_city_name") {

    $s_state_code = $_GET['s_state_code'] ?? "";

    $html = SELECT_CITY_NAME($db, $s_state_code);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("item" => $html),
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}


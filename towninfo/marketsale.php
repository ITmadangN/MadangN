<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use user_service\service_marketsale_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/towninfo/service/service_marketsale_list.php");

$s = $_GET["s"] ?? "CA";
$c = $_GET["c"] ?? "";

$on_ca = "";
$on_ny = "";
$on_tx = "";
$on_nj = "";
$on_va = "";
$on_ga = "";
$on_il = "";
$on_md = "";
$on_hi = "";

switch ($s) {

    case "CA":
        $on_ca = "on";
        break;
    case "NYNJ":
        $on_nynj = "on";
        break;
    case "TX":
        $on_tx = "on";
        break;
    case "MDVA":
        $on_mdva = "on";
        break;
    case "DC":
        $on_dc = "on";
        break;
    case "GA":
        $on_ga = "on";
        break;
    case "IL":
        $on_il = "on";
        break;
    case "AZ":
        $on_az = "on";
        break;
    case "HI":
        $on_hi = "on";
        break;
}

$fn_params = array(

    "state_code" => $s,
    "county" => $c,
     "indexYN" => 'N',
    "limit" => 100
            
);

$marketsale_list = new service_marketsale_list($db, $define_val, $fn_params);

$main = 4;
$sub = 2;
$page = "";

$is_marketsale_user = CHECK_MARKETSALE_USER($db, $SS_ID);

if($is_marketsale_user > 0) $reg_button = "&nbsp;  <a href=\"/towninfo/marketsale_write.php\" class=\"btn btn-primary btn-xs\" type=\"button\">전단지 등록</a>";
else  $reg_button = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "marketsale.tpl");

$tpl->setVar("T_ON_CA", $on_ca);
$tpl->setVar("T_ON_NYNJ", $on_nynj);
$tpl->setVar("T_ON_TX", $on_tx);
$tpl->setVar("T_ON_MDVA", $on_mdva);
$tpl->setVar("T_ON_DC", $on_dc);
$tpl->setVar("T_ON_GA", $on_ga);
$tpl->setVar("T_ON_IL", $on_il);
$tpl->setVar("T_ON_AZ", $on_az);
$tpl->setVar("T_ON_HI", $on_hi);

$tpl->setVar("T_S", $s);
//$tpl->setVar("T_C", $c);

$tpl->setVar("REG_BUTTON", $reg_button);

$tpl->setLoop("T_LOOP", $marketsale_list->loop);

$tpl->setVar("S_SELECT_COUNTY_NAME", GET_MARKETSALE_COUNTY(-1, $fn_params['state_code'], $fn_params['county'], $db, "전체 보기"));


include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");


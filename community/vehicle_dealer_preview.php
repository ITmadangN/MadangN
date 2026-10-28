<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use user_service\vehicle_dealer_html;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/community/service/service_vehicle_dealer_html.php");

$fn_params = array(
    'dealer_id' => $_GET['dealer_id'] ?? "",
    'regular_html_yn' => "Y",
    'tab_type' => "",
    'preview' => "Y"
);

$dealer_html = new vehicle_dealer_html($db, $define_val, $fn_params);

$main=3;
$sub=5;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "vehicle_dealer_preview.tpl");


$tpl->setVar("T_DEALER_ID",$fn_params['dealer_id']);
$tpl->setVar("T_DEALER_HTML",$dealer_html->html);
$tpl->setVar("T_DEALER_INFO_HTML",$dealer_html->dealer_info);


$tpl->setVar("S_SELECT_CAR_MAKER",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_maker,0,""));
$tpl->setVar("S_SELECT_CAR_YEAR",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_year,0,""));

$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(0,"",$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_VEHICLE_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_behicle_s_kind,0,""));

if($dealer_html->dealer_user_id == $SS_ID) $tpl->setVar("UPDATE_DELETE", true);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

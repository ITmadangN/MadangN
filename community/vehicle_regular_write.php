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



$main=3;
$sub=5;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "vehicle_regular_write.tpl");

$tpl->setVar("T_CONTACT_NAME",$SS_NAME);
$tpl->setVar("T_CONTACT_PHONE",$SS_PHONE);
$tpl->setVar("T_CONTACT_EMAIL",$SS_EMAIL);

$tpl->setVar("S_SELECT_CAR_MAKER",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_maker_eng,-1,"","자동차 제조사 선택"));
$tpl->setVar("S_SELECT_CAR_YEAR",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_year,-1,"", "연식 선택"));
$tpl->setVar("S_SELECT_FUEL_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_fuel_type,-1,"","연료종류  선택"));
$tpl->setVar("S_SELECT_CAR_COLOR",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_color,-1,"","색상  선택"));
$tpl->setVar("S_SELECT_BODY_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_body_type,-1,"","차제 타입  선택"));
$tpl->setVar("S_SELECT_TRANSMISSION",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_transmission,-1,"","변속기 종류  선택"));
$tpl->setVar("S_SELECT_CAR_ACCIDENT_HISTORY",ARRAY_ARRAY_RETURN($define_val->DEFINE_car_accident_history,-1,"","사고 유무"));

$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(-1,$SS_STATE_CODE,$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc","주선택"));
//$tpl->setVar("S_SELECT_CITY_NAME",ARRAY_ARRAY_RETURN($define_val->DEFINE_common_blank,-1,$SS_STATE_CODE,"도시전체"));
$tpl->setVar("S_SELECT_CITY_NAME", DB_ARRAY_ARRAY_RETURN(0, '', $db, "common_code", "code_sub_name", "code_sub", "code = '{$SS_STATE_CODE}' order by code_sub_name asc"));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");


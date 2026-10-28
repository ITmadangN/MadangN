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

$dealer_id = $_GET['dealer_id'] ?? "";

$sql = "SELECT A.* FROM community_car_dealers A where A.user_id = :user_id and A.community_car_dealers_id  = :dealer_id and A.is_active = 1 limit 0,1";

$placeholders = ['dealer_id' => $dealer_id, 'user_id' => $SS_ID];
$result = $db->query($sql, $placeholders);

$row = $db->fetch();
if(empty($row)){
    echo "잘못된 접근입니다.";
    exit;
}


$main=3;
$sub=5;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "vehicle_dealer_write.tpl");

$tpl->setVar("DEALER_ID", $dealer_id);

$tpl->setVar("COMPANY_NAME", $row->company_name);
$tpl->setVar("CONTACT_NAME", $row->contact_name);
$tpl->setVar("CONTACT_EMAIL", $row->contact_email);
$tpl->setVar("CONTACT_PHONE", $row->contact_phone);


$tpl->setVar("S_SELECT_CAR_MAKER",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_maker_eng,-1,"","자동차 제조사 선택"));
$tpl->setVar("S_SELECT_CAR_YEAR",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_year,-1,"", "연식 선택"));
$tpl->setVar("S_SELECT_FUEL_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_fuel_type,-1,"","연료종류  선택"));
$tpl->setVar("S_SELECT_CAR_COLOR",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_color,-1,"","색상  선택"));
$tpl->setVar("S_SELECT_BODY_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_body_type,-1,"","차제 타입  선택"));
$tpl->setVar("S_SELECT_TRANSMISSION",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_transmission,-1,"","변속기 종류  선택"));
$tpl->setVar("S_SELECT_CAR_ACCIDENT_HISTORY",ARRAY_ARRAY_RETURN($define_val->DEFINE_car_accident_history,-1,"","사고 유무"));

$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(-1,$row->state_code,$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc","주 선택"));
//$tpl->setVar("S_SELECT_CITY_NAME",ARRAY_ARRAY_RETURN($define_val->DEFINE_common_blank,-1,"","도시전체"));
$tpl->setVar("S_SELECT_CITY_NAME",DB_ARRAY_ARRAY_RETURN(0,$row->city_name,$db,"common_code","code_sub_name","code_sub_name","code = '{$row->state_code}' order by code_sub_name asc"));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");


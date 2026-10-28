<?php

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
    'preview' => ""
);

$dealer_html = new vehicle_dealer_html($db, $define_val, $fn_params);

$g_page = $_COOKIE['sg_page'] ?? 1;
$s_car_maker = $_COOKIE['sg_car_maker'] ?? '';
$s_min_car_year = $_COOKIE['sg_min_car_year'] ?? '';
$s_max_car_year = $_COOKIE['sg_max_car_year'] ?? '';
$s_state_code = $_COOKIE['sg_state_code'] ?? '';
$s_city_name = $_COOKIE['sg_city_name'] ?? '';
$s_listing_price_start = $_COOKIE['sg_listing_price_start'] ?? '';
$s_listing_price_end = $_COOKIE['sg_listing_price_end'] ?? '';
$s_car_mileage_start = $_COOKIE['sg_car_mileage_start'] ?? '';
$s_car_mileage_end = $_COOKIE['sg_car_mileage_end'] ?? '';
$s_kind = $_COOKIE['sg_kind'] ?? '';
$s_keyword = $_COOKIE['sg_keyword'] ?? '';
$s_cnt = $_COOKIE['sg_cnt'] ?? 10;



if($SS_ID == "") $register = "<div><a href=\"javascript:return false;\" onclick=\"alert('로그인을 먼저 진행해주세요')\" class=\"btn btn-primary btn-xs mt-1\">자동차 등록</a></div>";
else $register = "<div><a href=\"/community/vehicle_regular_write.php\" class=\"btn btn-primary btn-xs mt-1\">자동차 등록</a></div>";

$main=3;
$sub=5;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "vehicle_regular.tpl");

$tpl->setVar("T_REGISTER",$register);

$tpl->setVar("T_DEALER_HTML",$dealer_html->html);

$tpl->setVar("S_MIN_PRICE",$s_listing_price_start);
$tpl->setVar("S_MAX_PRICE",$s_listing_price_end);
$tpl->setVar("S_MIN_DIST",$s_car_mileage_start);
$tpl->setVar("S_MAX_DIST",$s_car_mileage_end);

$tpl->setVar("S_MIN_CAR_YEAR",$s_min_car_year);
$tpl->setVar("S_MAX_CAR_YEAR",$s_max_car_year);

//$tpl->setVar("S_SELECT_CAR_MAKER",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_maker_eng ,0,$s_car_maker));
$tpl->setVar("S_CHECKBOX_CAR_MAKER",make_multi_checkbox($define_val->DEFINE_vehicle_car_maker_eng, "s_car_maker", $s_car_maker));
//$tpl->setVar("S_SELECT_CAR_YEAR",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_year,0,$s_car_year));

$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(0,$s_state_code,$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_CITY_NAME",DB_ARRAY_ARRAY_RETURN(1,$s_city_name,$db,"common_code","code_sub_name","code_sub_name","code = '{$s_state_code}' order by code_sub_name asc"));
$tpl->setVar("S_SELECT_VEHICLE_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_behicle_s_kind,0,$s_kind));
$tpl->setVar("S_KEYWORD",$s_keyword);

$tpl->setVar("G_PAGE", $g_page);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

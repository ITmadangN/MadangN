<?php
               
use user_service\vehicle_list;
use user_service\vehicle_dealer_html;
use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/community/service/service_vehicle.php");
include("$DOCUMENT_ROOT/community/service/service_vehicle_dealer_html.php");


$fn_params = array(
    'dealer_id' => "",
    'regular_html_yn' => "",
    'tab_type' => "2",
    'preview' => ""
);

$dealer_html = new vehicle_dealer_html($db, $define_val, $fn_params);

$g_page = $_COOKIE['page'] ?? 1;
$s_car_maker = $_COOKIE['s_car_maker'] ?? '';
$s_min_car_year = $_COOKIE['s_min_car_year'] ?? '';
$s_max_car_year = $_COOKIE['s_max_car_year'] ?? '';
$s_state_code = $_COOKIE['s_state_code'] ?? '';
$s_city_name = $_COOKIE['s_city_name'] ?? '';
$s_listing_price_start = $_COOKIE['s_listing_price_start'] ?? '';
$s_listing_price_end = $_COOKIE['s_listing_price_end'] ?? '';
$s_car_mileage_start = $_COOKIE['s_car_mileage_start'] ?? '';
$s_car_mileage_end = $_COOKIE['s_car_mileage_end'] ?? '';
$s_kind = $_COOKIE['s_kind'] ?? '';
$s_keyword = $_COOKIE['s_keyword'] ?? '';
$s_cnt = $_COOKIE['s_cnt'] ?? 10;

$main=3;
$sub=5;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "vehicle.tpl");

$tpl->setVar("T_DEALER_HTML",$dealer_html->html);


$tpl->setVar("S_MIN_PRICE",$s_listing_price_start);
$tpl->setVar("S_MAX_PRICE",$s_listing_price_end);
$tpl->setVar("S_MIN_DIST",$s_car_mileage_start);
$tpl->setVar("S_MAX_DIST",$s_car_mileage_end);

$tpl->setVar("S_MIN_CAR_YEAR",$s_min_car_year);
$tpl->setVar("S_MAX_CAR_YEAR",$s_max_car_year);


//$tpl->setVar("S_SELECT_CAR_MAKER",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_maker_eng,0,$s_car_maker));
$tpl->setVar("S_CHECKBOX_CAR_MAKER",make_multi_checkbox($define_val->DEFINE_vehicle_car_maker_eng, "s_car_maker", $s_car_maker));

//$tpl->setVar("S_SELECT_CAR_YEAR",ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_year,0,$s_car_year));

//$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(0,"",$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));
//$tpl->setVar("S_SELECT_VEHICLE_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_behicle_s_kind,0,""));

$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(0,$s_state_code,$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_CITY_NAME",DB_ARRAY_ARRAY_RETURN(1,$s_city_name,$db,"common_code","code_sub_name","code_sub_name","code = '{$s_state_code}' order by code_sub_name asc"));
                 
$tpl->setVar("S_SELECT_VEHICLE_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_behicle_s_kind,0,$s_kind));
$tpl->setVar("S_KEYWORD",$s_keyword);

$tpl->setVar("G_PAGE", $g_page);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

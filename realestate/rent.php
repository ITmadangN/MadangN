<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$g_page = $_COOKIE['page'] ?? 1;
$s_property_type = $_COOKIE['s_property_type'] ?? '';
$s_property_sub_type = $_COOKIE['s_property_sub_type'] ?? '';
$s_state_code = $_COOKIE['s_state_code'] ?? 'CA';
$s_city_name = $_COOKIE['s_city_name'] ?? '';
$s_listing_price_start = $_COOKIE['s_listing_price_start'] ?? '';
$s_listing_price_end = $_COOKIE['s_listing_price_end'] ?? '';
$s_bedrooms_total = $_COOKIE['s_bedrooms_total'] ?? '';
$s_bathrooms_total = $_COOKIE['s_bathrooms_total'] ?? '';
$php_view = $_COOKIE['php_view'] ?? 'house_view'; 
$s_cnt = $_COOKIE['s_cnt'] ?? 10;

$property_type = "Rental";
$main="5";
$sub="2";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "rent.tpl");

$tpl->setVar("S_MIN_PRICE",$s_listing_price_start);
$tpl->setVar("S_MAX_PRICE",$s_listing_price_end);

$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(0,$s_state_code,$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_BEDROOMS_TOTAL",ARRAY_ARRAY_RETURN($define_val->DEFINE_realestate_bedrooms_total,-1,$s_bedrooms_total,"Beds"));
$tpl->setVar("S_SELECT_BATHROOMS_TOTAL",ARRAY_ARRAY_RETURN($define_val->DEFINE_realestate_bathrooms_total,-1,$s_bathrooms_total,"Baths"));
$tpl->setVar("S_SELECT_PROPERTY_TYPE",DB_ARRAY_ARRAY_RETURN(-1,$s_property_type,$db,"common_code","code_sub_name","code_sub_name","code = 'Rental' order by code_sub_name asc","선택"));
$tpl->setVar("S_SELECT_PROPERTY_SUB_TYPE",DB_ARRAY_ARRAY_RETURN(-1,$s_property_sub_type,$db,"common_code","code_sub_name","code_sub_name","code = '{$s_property_type}' order by code_sub_name asc","선택"));
//$tpl->setVar("S_SELECT_PROPERTY_SUB_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_realestate_property_sub_type[$property_type],-1,$s_property_sub_type,"형태"));
if($s_state_code != "") $tpl->setVar("S_SELECT_CITY_NAME",DB_ARRAY_ARRAY_RETURN(1,'',$db,"common_code","code_sub_name","code_sub_name","code = '{$s_state_code}' order by code_sub_name asc"));


$tpl->setVar("G_PAGE", $g_page);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$listing_type = $_GET["lt"] ?? "";


if($listing_type == "") $listing_type = "market";

$g_page = $_COOKIE['page'] ?? 1;
$s_listing_type = $_COOKIE['s_listing_type'] ?? '';
$s_marketplace_type = $_COOKIE['s_marketplace_type'] ?? '';
$s_state_code = $_COOKIE['s_state_code'] ?? '';
$s_city_name = $_COOKIE['s_city_name'] ?? '';
$s_kind = $_COOKIE['s_kind'] ?? ''; 
$s_keyword = $_COOKIE['s_keyword'] ?? ''; 
$s_cnt = $_COOKIE['s_cnt'] ?? 10;

$market_on = "";
$msale_on = "";
$donation_on = "";
$wanted_on = "";
$coupon_on = "";

switch($listing_type) {
    case "market" : $market_on = "on"; break;
    case "msale" : $msale_on = "on"; break;
    case "donation" : $donation_on = "on"; break;
    case "wanted" : $wanted_on = "on"; break;
    case "coupon" : $coupon_on = "on"; break;
}

$menu_name = ARRAY_RETURN($define_val->DEFINE_market_listing_type,$listing_type);

if($SS_ID == "") $register = "<div><a href=\"javascript:return false;\" onclick=\"alert('로그인을 먼저 진행해주세요')\" class=\"btn btn-outline-primary btn-xs mt-1\">{$menu_name} 등록</a></div>";
else $register = "<div><a href=\"/community/market_write.php?lt={$listing_type}\" class=\"btn btn-outline-primary btn-xs mt-1\">{$menu_name} 등록</a></div>";



$main=3;
$sub=3;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "market.tpl");

$tpl->setVar("T_REGISTER",$register);

$tpl->setVar("T_LISTING_TYPE",$listing_type);

$tpl->setVar("T_MARKET_ON",$market_on);
$tpl->setVar("T_MSALE_ON",$msale_on);
$tpl->setVar("T_DONATION_ON",$donation_on);
$tpl->setVar("T_WANTED_ON",$wanted_on);
$tpl->setVar("T_COUPON_ON",$coupon_on);

$tpl->setVar("T_MENU_NAME",ARRAY_RETURN($define_val->DEFINE_market_listing_type,$listing_type));
if ($listing_type == "market" || $listing_type == "msale" || $listing_type == "donation" || $listing_type == "wanted") $tpl->setVar("MARKET",true);
//if ($listing_type == "wanted")  $tpl->setVar("MARKET_WANTED",true);
if ($listing_type == "coupon")  $tpl->setVar("MARKET_COUPON",true);

$tpl->setVar("S_SELECT_MARKETPLACE_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_market_marketplace_type[$listing_type],0,""));
$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(0,$s_state_code,$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_MARKET_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_market_s_kind,1,$s_kind));
$tpl->setVar("S_KEYWORD",$s_keyword);
// if($s_state_code != "") $tpl->setVar("S_SELECT_CITY_NAME",DB_ARRAY_ARRAY_CITY_RETURN(1,$s_city_name,$db,"common_code","code_sub_name","code_sub_name","code = '{$s_state_code}' order by code_sub_name asc"));
if($s_state_code != "") $tpl->setVar("S_SELECT_CITY_NAME",DB_ARRAY_ARRAY_RETURN(1,$s_city_name,$db,"common_code","code_sub_name","code_sub_name","code = '{$s_state_code}' order by code_sub_name asc"));

$tpl->setVar("G_PAGE", $g_page);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");


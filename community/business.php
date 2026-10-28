<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$listing_type = $_GET["lt"] ?? "";
$cl = $_GET["cl"] ?? "";
if($listing_type == "") $listing_type = "market";

$g_page = $_COOKIE['page'] ?? 1;
$s_business_type = $_COOKIE['s_business_type'] ?? '';
$s_state_code = $_COOKIE['s_state_code'] ?? '';
$s_city_name = $_COOKIE['s_city_name'] ?? '';
$s_kind = $_COOKIE['s_kind'] ?? ''; 
$s_keyword = $_COOKIE['s_keyword'] ?? ''; 
$s_cnt = $_COOKIE['s_cnt'] ?? 10;


if($SS_ID == "") $register = "<div><a href=\"javascript:return false;\" onclick=\"alert('로그인을 먼저 진행해주세요')\" class=\"btn btn-primary btn-xs mt-1\">비즈니스 등록</a></div>";
else $register = "<div><a href=\"/community/business_write.php\" class=\"btn btn-primary btn-xs mt-1\">비즈니스 등록</a></div>";


$main=3;
$sub=4;
$page = "";
if($cl == "cl") $search_session_nane = "";
else $search_session_nane = "business";

// 검색세션 초기화
@INIT_SEARCH_SESSION($search_session_nane);
                                                  
$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "business.tpl");

$tpl->setVar("T_REGISTER",$register);

$tpl->setVar("S_SELECT_BUSINESS_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_business_type,0,$s_business_type));
$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(0,$s_state_code,$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_BUSINESS_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_business_s_kind,1,$s_kind));
$tpl->setVar("S_KEYWORD",$s_keyword);
// if($s_state_code != "") $tpl->setVar("S_SELECT_CITY_NAME",DB_ARRAY_ARRAY_CITY_RETURN(1,$s_city_name,$db,"common_code","code_sub_name","code_sub_name","code = '{$s_state_code}' order by code_sub_name asc"));
if($s_state_code != "") $tpl->setVar("S_SELECT_CITY_NAME",DB_ARRAY_ARRAY_RETURN(1,$s_city_name,$db,"common_code","code_sub_name","code_sub_name","code = '{$s_state_code}' order by code_sub_name asc"));

$tpl->setVar("G_PAGE", $g_page);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");


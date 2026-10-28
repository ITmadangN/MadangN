<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

if($SS_ID == "") $register = "<div><a href='javascript:return false;' onclick=\"alert('로그인을 먼저 진행해주세요')\" class='btn btn-primary btn-xs mt-1'>구인등록</a></div>";
else $register = "<div><a href='/community/recruit_write.php' class='btn btn-primary btn-xs mt-1'>구인등록</a></div>";

$g_page = $_COOKIE['page'] ?? 1;
$s_job_type = $_COOKIE['s_job_type'] ?? '';
$s_state_code = $_COOKIE['s_state_code'] ?? '';
$s_city_name = $_COOKIE['s_city_name'] ?? '';
$s_kind = $_COOKIE['s_kind'] ?? ''; 
$s_keyword = $_COOKIE['s_keyword'] ?? ''; 
$s_cnt = $_COOKIE['s_cnt'] ?? 10;

$main=3;
$sub=2;
$page = "";
$search_session_nane = "recruit";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "recruit.tpl");

$tpl->setVar("T_REGISTER",$register);

//$tpl->setVar("S_SELECT_JOB_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_recruit_job_type,0,$s_job_type));
$tpl->setVar("S_CHECKBOX_JOB_TYPE",make_multi_checkbox($define_val->DEFINE_recruit_job_type, "s_job_type", $s_job_type));

$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(0,$s_state_code,$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_RECURIT_KIND",ARRAY_ARRAY_RETURN($define_val->DEFINE_recruit_s_kind,1,$s_kind));
$tpl->setVar("S_KEYWORD",$s_keyword);
//if($s_state_code != "") $tpl->setVar("S_SELECT_CITY_NAME",DB_ARRAY_ARRAY_CITY_RETURN(1,$s_city_name,$db,"common_code","code_sub_name","code_sub_name","code = '{$s_state_code}' order by code_sub_name asc"));
if($s_state_code != "") $tpl->setVar("S_SELECT_CITY_NAME",DB_ARRAY_ARRAY_RETURN(1,$s_city_name,$db,"common_code","code_sub_name","code_sub_name","code = '{$s_state_code}' order by code_sub_name asc"));

$tpl->setVar("G_PAGE", $g_page);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

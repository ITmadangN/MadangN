<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");


$page="index";
$main="0";
$sub="1";
$mtitle="멤버";
$stitle="회원정보 입력";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "register_form.tpl");

$tpl->setVar("S_SELECT_COUNTRY_CODE",DB_ARRAY_ARRAY_RETURN(-1,"",$db,"common_code","code_sub_name","code_sub","code = 'country' order by sort asc","국가선택"));
//$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(-1,"",$db,"common_code","code_sub_name","code_sub","code = 'state' order by code_sub_name asc","해당없음"));
$tpl->setVar("S_SELECT_STATE_CODE", "<option value=''>없음</option>");

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

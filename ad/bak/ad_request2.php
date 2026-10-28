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


$main="6";
$sub="1";
$mtitle="유료광고신청";
$stitle="유료 컨텐츠 광고";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "ad_request2.tpl");

$tpl->setVar("SELECT_VALIDITY_PERIOD",ARRAY_ARRAY_RETURN($define_val->DEFINE_validity_period,1,""));
$tpl->setVar("SELECT_JOB_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_recruit_job_type,1,""));

$tpl->setVar("SELECT_BUSINESS_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_business_type,1,""));

$tpl->setVar("SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(1,"",$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

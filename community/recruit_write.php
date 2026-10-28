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
$sub=2;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "recruit_write.tpl");

$tpl->setVar("S_SELECT_JOB_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_recruit_job_type, -1, "","직종선택"));
$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(-1,"",$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc","주선택"));
$tpl->setVar("S_SELECT_CITY_NAME",ARRAY_ARRAY_RETURN($define_val->DEFINE_common_blank,-1,"","도시선택"));


include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");


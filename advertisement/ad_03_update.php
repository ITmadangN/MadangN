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

$run_adv = 0;

$today = date("Ymd");

$sql = "select A.* from realestate_agents A where A.is_active =1 and A.user_id = :user_id limit 0,1";    
$placeholders = ['user_id' => $SS_ID];
$result = $db->query($sql, $placeholders);
$row = $db->fetch();
if(empty($row)) {
    
    $msg = "회원에 해당하는 에이전트 정보가 없습니다.";            

    $run_adv = 1;
    
     echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n" .
    "<script language=\"javascript\">\n" .
         "<!--\n" .
         "alert('$msg');" .
         "location.href='/realestate/agent.php';".
         "//-->\n" .
         "</script>\n");

        exit;

}

$p_realestate_agent_id = $row->realestate_agent_id;



$main="6";
$sub="0";
$mtitle="유료광고신청";
$stitle="에이전트&매물광고";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "ad_03_update.tpl");

$tpl->setVar("T_ID",$p_realestate_agent_id);

$tpl->setVar("T_RUN_ADV",$run_adv);
$tpl->setVar("SELECT_VALIDITY_PERIOD",ARRAY_ARRAY_RETURN($define_val->DEFINE_validity_period,-1,"","기간선택"));
$tpl->setVar("SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(-1,"",$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc","주선택"));
$tpl->setVar("SELECT_SPECIALIZED_FIELD",ARRAY_ARRAY_RETURN($define_val->DEFINE_specialized_field,-1,"","전문분야선택"));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");


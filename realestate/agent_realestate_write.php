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


$sql = "SELECT A.* FROM realestate_agents A where A.user_id = :user_id";
$placeholders = ['user_id' => $SS_ID];
$result = $db->query($sql, $placeholders);

$enable_write = 'N';

$row = $db->fetch();

 if(!empty($row)) {
     
     $is_active = $row->is_active;
     $user_id = $row->user_id;
     $agent_key = $row->agent_key;
     $office_key = $row->office_key;
     $agent_dre_license = $row->agent_dre_license;
     
     $is_approved = $row->is_approved;
     $has_active_advertisement = $row->has_active_advertisement;
     $is_preminum_agent = $row->is_preminum_agent;
     $has_active_listings = $row->has_active_listings;
     
     
     // 관리자가 승인했고 현재 광고중(광고시작일, 종료일안에 오늘 날짜가 들어올때)일때 매물등록 가능
     if($is_approved == 1 && $has_active_advertisement == 1) $enable_write = 'Y';
     
     // 관리자가 승인했고 현재 TOP AGENT이고 User_Id가 있을때 등록 가능
     if($is_active == 1 && $is_preminum_agent == 1 && $user_id != "") $enable_write = 'Y';
     
     // 매물이 있는 경우         
     if($has_active_listings == 1) $enable_write = 'Y';

 }

if($enable_write != 'Y') {
    
    NO_PERMISSION('/');
}

$main=5;
$sub=6;
$mtitle="유료광고신청";
$stitle="에이전트&매물광고";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "agent_realestate_write.tpl");

$tpl->setVar("T_AGENT_KEY",$agent_key);
$tpl->setVar("T_DRE_KEY",$agent_dre_license);
$tpl->setVar("T_OFFICE_KEY",$office_key);
$tpl->setVar("S_SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(1,'CA',$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_CITY", DB_ARRAY_ARRAY_RETURN(-1, '', $db, "common_code", "code_sub_name", "code_sub", "code = 'CA' order by code_sub_name asc","선택"));
$tpl->setVar("S_SELECT_PROPERTY_TYPE",DB_ARRAY_ARRAY_RETURN(-1,'',$db,"common_code","code_sub_name","code_sub_name","code = 'realestate' order by code_sub_name asc","선택"));
$tpl->setVar("S_SELECT_PROPERTY_SUB_TYPE",DB_ARRAY_ARRAY_RETURN(-1,'',$db,"common_code","code_sub_name","code_sub_name","code = '{$s_property_type}' order by code_sub_name asc","선택"));

$tpl->setVar("SELECT_STANDARD_STATUS",ARRAY_ARRAY_RETURN($define_val->DEFINE_realestate_standard_status,1,$standard_status));
$tpl->setVar("SELECT_ASSOCIATION_FEE_FREQUENCY",ARRAY_ARRAY_RETURN($define_val->DEFINE_realestate_lassociation_fee_frequency,-1,$lassociation_fee_frequency,"선택"));
$tpl->setVar("SELECT_LEASE_AMOUNT_FREQUENCY",ARRAY_ARRAY_RETURN($define_val->DEFINE_realestate_lease_amount_frequency,-1,$lease_amount_frequency,"선택"));

$tpl->setVar("S_SELECT_COUNTY_OR_PARISH",DB_ARRAY_ARRAY_RETURN(-1,'',$db,"common_code","code_sub_name","code_sub_name","code = 'CA_county' order by code_sub_name asc","선택"));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");


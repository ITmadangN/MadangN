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

$save_method = $_GET['ad_method'] ?? 'recruit_platinum';
$id = $_GET['id'] ?? '';

// sql 필요 
// 수정가능한지 여부와 자기것인지 체크

$checked_platinum = "";
$checked_gold = "";
$checked_business = "";
$checked_dealer = "";

$checked_platinum_disabled = "disabled";
$checked_gold_disabled = "disabled"; 
$checked_business_disabled = "disabled";
$checked_dealer_disabled = "disabled";

if($save_method == "recruit_platinum" || $save_method == "recruit_gold") {
    $sql = "select A.* from community_recruit_listings A where A.user_id = :user_id and A.community_recruit_listings_id = :id and A.is_modify_yn = 1 limit 0,1";    
    if($save_method == "recruit_platinum") {
        $checked_platinum = "checked";
        $checked_platinum_disabled = "";
    }
    else {
       $checked_gold = "checked";
       $checked_gold_disabled = ""; 
    }
}
if($save_method == "business_platinum") {
    $sql = "select A.* from community_business A where A.user_id = :user_id and A.community_business_id = :id and A.is_modify_yn = 1 limit 0,1";    
    $checked_business = "checked";
    $checked_business_disabled = "";
}
if($save_method == "vehicle_dealer") {
    $sql = "select A.* from community_car_dealers A where A.user_id = :user_id and A.community_car_dealers_id = :id and A.is_modify_yn = 1 limit 0,1";    
    $checked_dealer = "checked";
    $checked_dealer_disabled = "";
}


$placeholders = ['user_id' => $SS_ID, 'id' => $id];
$result = $db->query($sql, $placeholders);
$row = $db->fetch();
if(empty($row)) {
    
    
    $msg = "수정할수 있는 정보가 없거나 올바른 접근이 아닙니다.";            
    
     echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n" .
    "<script language=\"javascript\">\n" .
         "<!--\n" .
         "alert('$msg');" .
         "location.href='/community/';".
         "//-->\n" .
         "</script>\n");

        exit;

}

$main="6";
$sub="1";
$mtitle="유료광고신청";
$stitle="유료 컨텐츠 광고 수정";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "ad_request_update.tpl");

$tpl->setVar("T_CHECKED_PLATINUM",$checked_platinum);
$tpl->setVar("T_CHECKED_GOLD",$checked_gold);
$tpl->setVar("T_CHECKED_BUSINESS",$checked_business);
$tpl->setVar("T_CHECKED_DEALER",$checked_dealer);

$tpl->setVar("T_CHECKED_PLATINUM_DISABLED",$checked_platinum_disabled);
$tpl->setVar("T_CHECKED_GOLD_DISABLED",$checked_gold_disabled);
$tpl->setVar("T_CHECKED_BUSINESS_DISABLED",$checked_business_disabled);
$tpl->setVar("T_CHECKED_DEALER_DISABLED",$checked_dealer_disabled);

$tpl->setVar("T_SAVE_METHOD",$save_method);
$tpl->setVar("T_LISTING_ID",$id);

$tpl->setVar("SELECT_VALIDITY_PERIOD",ARRAY_ARRAY_RETURN($define_val->DEFINE_validity_period,-1,"","기간선택"));
$tpl->setVar("SELECT_JOB_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_recruit_job_type,-1,"","직종선택"));

$tpl->setVar("SELECT_BUSINESS_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_business_type,-1,"","직종선택"));

$tpl->setVar("SELECT_STATE_CODE",DB_ARRAY_ARRAY_RETURN(-1,"",$db,"common_code","code_sub_name","code_sub","code = 'state' order by sort asc","주선택"));

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

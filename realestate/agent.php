<?php


use BearTemplate\BearTemplate;

//error_reporting(E_ALL);
//ini_set('display_errors', '1');


session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$enable_write = 'N';

if($SS_ID != "") {
    
    $sql = "SELECT A.* FROM realestate_agents A where A.user_id = :user_id";
    $placeholders = ['user_id' => $SS_ID];
    $result = $db->query($sql, $placeholders);

    $row = $db->fetch();
    
     if(!empty($row)) {
         
         $is_active = $row->is_active;
         $user_id = $row->user_id;
         $is_approved = $row->is_approved;
         $has_active_advertisement = $row->has_active_advertisement;
         $agent_key = $ro->agent_key;
         $is_preminum_agent = $row->is_preminum_agent;
         $has_active_listings = $row->has_active_listings;
         
         // 관리자가 승인했고 현재 광고중(광고시작일, 종료일안에 오늘 날짜가 들어올때)일때 매물등록 가능
         if($is_approved == 1 && $has_active_advertisement == 1) $enable_write = 'Y';
         
         // active이고 현재 TOP AGENT이고 User_Id가 있을때 등록 가능
         if($is_active == 1 && $is_preminum_agent == 1 && $user_id != "") $enable_write = 'Y';
         
         // 매물이 있는 경우         
         if($has_active_listings == 1) $enable_write = 'Y';
     }


}
$main=5;
$sub=6;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "agent.tpl");

if($enable_write == 'Y')  $tpl->setVar("T_WRITE",             true);


include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

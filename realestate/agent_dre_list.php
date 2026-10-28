<?php

use BearTemplate\BearTemplate;
use user_service\realestate_list;

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
//include("$DOCUMENT_ROOT/include/auth.php");
include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/realestate/service/service_realestate.php");


$key = $_GET["key"];

//$sql = "SELECT A.* FROM realestate_agents A where A.agent_key = :key and is_active = 1";
$sql = "SELECT A.* FROM realestate_agents A where A.agent_dre_license = :key and is_active = 1 limit 0,1";
$placeholders = ['key' => $key];
$result = $db->query($sql, $placeholders);

$row = $db->fetch();

NO_DATA($row, "home", $define_val->DEFAULT_REALESTATE_HOME);

$p_realestate_agent_id = $row->realestate_agent_id;
$p_agent_key = $row->agent_key;
$p_user_id = $row->user_id;
$p_specialized_field = $row->specialized_field;
$p_agent_full_name = $row->agent_full_name;
$p_agent_dre_license = $row->agent_dre_license;
$p_agent_phone = $row->agent_phone;
$p_agent_email = $row->agent_email;
$p_office_key = $row->office_key;
$p_office_name = $row->office_name;
$p_main_image_url = $row->main_image_url;
$p_is_active = $row->is_active;
$p_self_introduction = $row->self_introduction;

$blank_img = "/images/blank.png";
if($row->main_image_url != "" ) {
    $main_img = $define_val->IMG_PROTECT ."?c=realestate&cc=agent&d=main&s=".$p_realestate_agent_id;
}
else {
    $main_img = $blank_img;
}


$p_office_phone = "";
$p_logo_image_url = "";
$p_office_city = "";
$p_office_zip = "";
$p_office_address2 = "";
$p_office_address1 = "";
$p_office_address2 = "";

$sql = "SELECT * FROM realestate_office WHERE office_key = :office_key limit 0,1";
$placeholders = ['office_key' => $p_office_key];
$result = $db->query($sql, $placeholders);
if (!$result) $p_logo_image_url = "";
else { $row = $db->fetch();
        if (!$row) $p_logo_image_url = "";
        else { 
            $p_office_phone = $row->office_phone;
            $p_logo_image_url = $row->logo_image_url;
            $p_office_city = $row->office_city;
            $p_office_state = $row->office_state;
            $p_office_zip = $row->office_zip;
            $p_office_address1 = $row->office_address1;
            $p_office_address2 = $row->office_address2;
        }
}

$p_del_logo_image_url = "";
if ($p_logo_image_url != "") {
    $v_logo_image_url = $define_val->IMG_PROTECT . "?c=realestate&cc=office&d=logo&s=" . $p_office_key;
    // $v_logo_image_url = "<img src=\"$v_logo_image_url\" alt=\"\" />";
    $p_del_logo_image_url = GET_DEL_UPLOAD_IMAGE('logo_image_url');
} else {
    $v_logo_image_url = $blank_img;
}

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_menu" => $_GET['s_menu'] ?? "",
        "s_property_type" => $_GET['s_property_type'] ?? "",
        "s_property_sub_type" => $_GET['s_property_sub_type'] ?? "",
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_listing_price_start" => $_GET['s_listing_price_start'] ?? "",
        "s_listing_price_end" => $_GET['s_listing_price_end'] ?? "",
        "s_bedrooms_total" => $_GET['s_bedrooms_total'] ?? "",        
        "s_bathrooms_total" => $_GET['s_bathrooms_total'] ?? "",
        "agent_key"  => $p_agent_key, 
        "office_key" => "",
        "php_view" => "",
        "page_set" => $_GET['s_cnt'] ?? 100,
        "block_set" => 10,
        "random" => 'N',
        "s_nynj" => $_GET['s_nynj'] ?? ''
        
    );
                             
    $realestate_list = new realestate_list($db, $define_val, $fn_params);    
    $tpl = new BearTemplate('./ajax/tpl', false);
    $tpl->setFile("main", "realestate_agent_dre_body.tpl");
    $tpl->setVar("AGENT",true);
    $tpl->setLoop("T_LOOP", $realestate_list->loop);
    $tpl->tprint("main");
    $content = $tpl->content;
    $cnt = count($realestate_list->loop);
    $agent_loop = $realestate_list->loop;
    unset($tpl);
    unset($realestate_list);
    
    if($p_office_key == "3288918" || $p_office_key == "3285640" || $p_office_key == "3286864" || $p_office_key == "5602073") {
        
        if($cnt < 100) {
                    
            $fn_params = array(
            "page" => $_GET['page'] ?? 1,
            "s_menu" => $_GET['s_menu'] ?? "",
            "s_property_type" => $_GET['s_property_type'] ?? "",
            "s_property_sub_type" => $_GET['s_property_sub_type'] ?? "",
            "s_state_code" => $_GET['s_state_code'] ?? "",
            "s_city_name" => $_GET['s_city_name'] ?? "",
            "s_listing_price_start" => $_GET['s_listing_price_start'] ?? "",
            "s_listing_price_end" => $_GET['s_listing_price_end'] ?? "",
            "s_bedrooms_total" => $_GET['s_bedrooms_total'] ?? "",        
            "s_bathrooms_total" => $_GET['s_bathrooms_total'] ?? "",
            "agent_key"  => "", 
            "office_key" => $p_office_key,
            "php_view" => "",
            "page_set" => $_GET['s_cnt'] ?? 200,
            "block_set" => 10,
            "random" => 'N',
            "s_nynj" => $_GET['s_nynj'] ?? ''
            
            );
            
            $realestate_list = new realestate_list($db, $define_val, $fn_params);
            
            // 중복삭제        
            $loop_keys = array_column($agent_loop, 'T_LISTING_KEY');        
            $temp_loop = array_filter($realestate_list->loop, function($item) use ($loop_keys) {
                return !in_array($item['T_LISTING_KEY'], $loop_keys);
            });        
            $temp_loop = array_values($temp_loop);

            $tpl = new BearTemplate('./ajax/tpl', false);
            $tpl->setFile("main", "realestate_agent_dre_body.tpl");
            $tpl->setVar("AGENT",false);
            $tpl->setLoop("T_LOOP", $temp_loop);
            $tpl->tprint("main");
            $content .= $tpl->content;
            unset($tpl);
            unset($realestate_list);
            
        }
        
    }
    
$enable_write = 'N';

if($SS_ID != "" && $p_user_id != "" && $p_user_id == $SS_ID) {
    
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
         if($is_active == 1 &&  $is_preminum_agent == 1 && $user_id != "") $enable_write = 'Y';
         
         // 매물이 있는 경우         
         if($has_active_listings == 1) $enable_write = 'Y';
     }


}
    
$main="5";
$sub="6";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "agent_dre_list.tpl");

$tpl->setVar("T_MAIN_IMG",$main_img);
$tpl->setVar("T_OFFICE_NAME",$p_office_name);
$tpl->setVar("T_AGENT_FULL_NAME",$p_agent_full_name);
$tpl->setVar("T_AGENT_EMAIL",$p_agent_email);
$tpl->setVar("T_AGENT_PHONE",$p_agent_phone);
$tpl->setVar("T_AGENT_DRE_LICENSE",$p_agent_dre_license);
$tpl->setVar("T_OFFICE_PHONE",$p_office_phone);
$tpl->setVar("T_ADDRESS",$p_office_address1 . " " . $p_office_address2 . ",".$p_office_city . ",".$p_office_state . " ".$p_office_zip);
$tpl->setVar("T_SPECIALIZED_FIELD", ARRAY_RETURN($define_val->DEFINE_specialized_field, $p_specialized_field));
$tpl->setVar("T_LOGO_MAIN_URL",$v_logo_image_url);
$tpl->setVar("T_SELF_INTRODUCTION", nl2br($p_self_introduction));

if($p_self_introduction != "") $tpl->setVar("INTRODUCTION", true); 

if($enable_write == 'Y')  $tpl->setVar("T_WRITE",             true);

$tpl->setVar("T_AGENT_DRE_HTML",$content);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

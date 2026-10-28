<?php

use BearTemplate\BearTemplate;
use user_service\realestate_list_index;
use user_service\agent_list;

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/realestate/service/service_realestate_index.php");
include("$DOCUMENT_ROOT/realestate/service/service_agent.php");

function make_realestate_html($db,$define_val,$page_set)  {

    
    $fn_params = array(
        "page" => 1,
        's_menu' => '',
        "s_property_type" => "",
        "s_property_sub_type" => "",
        "s_state_code" => "",
        "s_city_name" => "",
        "s_listing_price_start" => "",
        "s_listing_price_end" => "",
        "s_bedrooms_total" => "",        
        "s_bathrooms_total" => "",        
        "agent_key"  => "",        
        "office_key"  => "",        
        "php_view" => "",
        "page_set" => $page_set,
        "block_set" => 10,
        "random" => 'N',
        "s_nynj" => ''
        
    );

    $realestate_list = new realestate_list_index($db, $define_val, $fn_params);

    
    $tpl = new BearTemplate('./ajax/tpl', false);
    $tpl->setFile("main", "realestate_house_body.tpl");
    $tpl->setLoop("T_LOOP", $realestate_list->loop_house);
    $tpl->tprint("main");
    $content_house = $tpl->content;
    unset($tpl);
    
    $tpl = new BearTemplate('./ajax/tpl', false);
    $tpl->setFile("main", "realestate_rent_body.tpl");
    $tpl->setLoop("T_LOOP", $realestate_list->loop_rent);
    $tpl->tprint("main");
    $content_rent = $tpl->content;
    unset($tpl);
    
    $tpl = new BearTemplate('./ajax/tpl', false);
    $tpl->setFile("main", "realestate_commercial_body.tpl");
    $tpl->setLoop("T_LOOP", $realestate_list->loop_commercial);
    $tpl->tprint("main");
    $content_commercial = $tpl->content;
    unset($tpl);
    
    $tpl = new BearTemplate('./ajax/tpl', false);
    $tpl->setFile("main", "realestate_business_body.tpl");
    $tpl->setLoop("T_LOOP", $realestate_list->loop_business);
    $tpl->tprint("main");
    $content_business = $tpl->content;
    unset($tpl);
    
    return [$content_house, $content_rent, $content_commercial, $content_business];
}

function make_realestate_agent_html($db,$define_val) {
    
    $fn_params = array(
        "page" => 1,
        "s_office_name" => "",
        "s_agent_full_name" => "",
        "s_kind" => "",
        "s_keyword" => "",
        "page_set" =>  9,
        "block_set" => 10,
        "random" => 'Y'
    );
    
    $agent_list = new agent_list($db, $define_val, $fn_params);

    $tpl = new BearTemplate('./ajax/tpl',false);
    $tpl->setFile("main", "realestate_agent_body.tpl");
    $tpl->setLoop("T_LOOP", $agent_list->loop);
    $tpl->tprint("main");
    $content = $tpl->content;
    unset($tpl);
    
    return $content;
}


[$house_html, $rent_html, $commercial_html, $business_html] = make_realestate_html($db,$define_val, 6);

$agent_html = make_realestate_agent_html($db,$define_val);

saveLog("index.php","sss");

$main=5;
$sub=1;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "index.tpl");

$tpl->setVar("HOUSE_HTML",$house_html);
$tpl->setVar("RENT_HTML",$rent_html);
$tpl->setVar("COMMERCIAL_HTML",$commercial_html);
$tpl->setVar("BUSINESS_HTML",$business_html);
$tpl->setVar("AGENT_HTML",$agent_html);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

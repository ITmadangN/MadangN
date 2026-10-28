<?php

use user_service\realestate_list;
use BearTemplate\BearTemplate;

include("$DOCUMENT_ROOT/realestate/service/service_realestate.php");

$fn_params = array(
        "page" => 1,
        "s_menu" => $s_menu,
        "s_property_type" => '',
        "s_property_sub_type" => "",
        "s_state_code" => "",
        "s_city_name" => "",
        "s_listing_price_start" => "",
        "s_listing_price_end" => "",
        "s_bedrooms_total" => "",        
        "s_bathrooms_total" => "",
        "agent_key" => "",
        "office_key" => "",
        "php_view" => $php_view,
        "page_set" => 9,
        "block_set" => 10,
        "random" => 'Y',
        "s_nynj" => ''
        
    );

$realestate_list = new realestate_list($db, $define_val, $fn_params);


$tpl = new BearTemplate('./ajax/tpl', false);
$tpl->setFile("main", $body_tpl_name);
$tpl->setLoop("T_LOOP", $realestate_list->loop);
$tpl->tprint("main");
$content = $tpl->content;
unset($tpl);

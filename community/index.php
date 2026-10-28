<?php


use BearTemplate\BearTemplate;
use user_service\recruit_list;
use user_service\business_list;
use user_service\vehicle_list;
use user_service\vehicle_dealer_html;
use user_service\market_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/community/service/service_recruit.php");
include("$DOCUMENT_ROOT/community/service/service_business.php");
include("$DOCUMENT_ROOT/community/service/service_vehicle.php");
include("$DOCUMENT_ROOT/community/service/service_vehicle_dealer_html.php");
include("$DOCUMENT_ROOT/community/service/service_market.php");

$fn_params = array(
    "page" => 1,
    's_job_type' => '',
    "s_state_code" => "",
    "s_city_name" => "",
    "s_kind" => "",
    "s_keyword" => "",
    "page_set" =>  16,
    "block_set" => 10,
    "random" => 'Y',
    "s_nynj" => ''
    );

$recruit_list = new recruit_list($db, $define_val, $fn_params);

$tpl = new BearTemplate('./ajax/tpl',false);
$tpl->setFile("main", "recruit_platinum_body.tpl");
$tpl->setLoop("T_LOOP", $recruit_list->loop_platinum);
$tpl->tprint("main");
$recruit_platinum = $tpl->content;
unset($tpl);

$fn_params = array(
    "page" => 1,
    "s_business_type" => "",
    "s_state_code" => "",
    "s_city_name" => "",
    "s_kind" => "",
    "s_keyword" => "",
    "page_set" => 15,
    "block_set" => 10,
    "random" => 'Y'
);

$business_list = new business_list($db, $define_val, $fn_params);

$tpl = new BearTemplate('./ajax/tpl',false);
$tpl->setFile("main", "business_platinum_body.tpl");
$tpl->setLoop("T_LOOP", $business_list->loop_platinum);
$tpl->tprint("main");
$business_platinum = $tpl->content;
unset($tpl);

$fn_params = array(
    'dealer_id' => "",
    'regular_html_yn' => "",
    'tab_type' => "2",
    'preview' => ''
);

$dealer_html = new vehicle_dealer_html($db, $define_val, $fn_params);

    $fn_params = array(
        "page" => $_GET['page'] ?? 1,
        "s_state_code" => $_GET['s_state_code'] ?? "",
        "s_city_name" => $_GET['s_city_name'] ?? "",
        "s_car_maker" => $_GET['s_car_maker'] ?? "",
        "s_min_car_year" => $_GET['s_min_car_year'] ?? "",
        "s_max_car_year" => $_GET['s_max_car_year'] ?? "",
        "s_community_car_dealers_id" => $_GET['s_community_car_dealers_id'] ?? "",
        "s_listing_price_start" => $_GET['s_listing_price_start'] ?? "",
        "s_listing_price_end" => $_GET['s_listing_price_end'] ?? "",
        "s_car_mileage_start" => $_GET['s_car_mileage_start'] ?? "",
        "s_car_mileage_end" => $_GET['s_car_mileage_end'] ?? "",
        "s_kind" => $_GET['s_kind'] ?? "",
        "s_keyword" => $_GET['s_keyword'] ?? "",
        "page_set" =>  $_GET['s_cnt'] ?? 10,
        "block_set" => 10
    );

    
$vehicle_list = new vehicle_list($db, $define_val, $fn_params);

$vehicle_platinum = $vehicle_list->loop_platinum;

$fn_params = array(
    "page" =>  1,
    "s_listing_type" => "market",
    "s_marketplace_type" => "",
    "s_state_code" => "",
    "s_city_name" => "",
    "s_kind" => "",
    "s_keyword" => "",
    "page_set" =>  10,
    "block_set" => 10
);

$market_list = new market_list($db, $define_val, $fn_params);

$tpl = new BearTemplate('./ajax/tpl',false);
$tpl->setFile("main", "market_body.tpl");
$tpl->setLoop("T_LOOP", $market_list->loop);
$tpl->tprint("main");
$market_content = $tpl->content;
unset($tpl);

$fn_params['s_listing_type'] = "msale";
$market_list = new market_list($db, $define_val, $fn_params);

$tpl = new BearTemplate('./ajax/tpl',false);
$tpl->setFile("main", "market_body.tpl");
$tpl->setLoop("T_LOOP", $market_list->loop);
$tpl->tprint("main");
$msale_content = $tpl->content;
unset($tpl);

$fn_params['s_listing_type'] = "wanted";
$fn_params['page'] = 1;
$fn_params['page_set'] = 3;
$market_list = new market_list($db, $define_val, $fn_params);

$loop_lwl =  $market_list->loop;

$fn_params['s_listing_type'] = "wanted";
$fn_params['page'] = 2;
$fn_params['page_set'] = 3;
$market_list = new market_list($db, $define_val, $fn_params);

$loop_lwr =  $market_list->loop;

$fn_params['s_listing_type'] = "coupon";
$fn_params['page'] = 1;
$fn_params['page_set'] = 3;
$coupon_1_list = new market_list($db, $define_val, $fn_params);

$loop_lcl =  $coupon_1_list->loop;

$fn_params['s_listing_type'] = "coupon";
$fn_params['page'] = 2;
$fn_params['page_set'] = 3;
$coupon_2_list = new market_list($db, $define_val, $fn_params);

$loop_lcr =  $coupon_2_list->loop;

$main=3;
$sub=1;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "index.tpl");

$tpl->setVar("T_RECRUIT_PLATINUM_HTML", $recruit_platinum);
$tpl->setLoop("T_LG", $recruit_list->loop_gold);

$tpl->setVar("T_BUSINESS_PLATINUM_HTML", $business_platinum);
$tpl->setLoop("T_LB", $business_list->loop_regular);

$tpl->setVar("T_DEALER_HTML",$dealer_html->html);
$tpl->setLoop("T_LP", $vehicle_platinum);

$tpl->setVar("T_MARKET_HTML",$market_content);
$tpl->setVar("T_MSALE_HTML",$msale_content);

$tpl->setLoop("T_LWL", $loop_lwl);
$tpl->setLoop("T_LWR", $loop_lwr);

$tpl->setLoop("T_LCL", $loop_lcl);
$tpl->setLoop("T_LCR", $loop_lcr);

include("$DOCUMENT_ROOT/include/common.php");

$banner_dic = $community_html['BANNER'];

foreach ($banner_dic as $location => $info) {
    
    $imgUrl = $info['img'];
    $linkUrl = $info['link'];

    $tpl->setVar($location."_img",$imgUrl);
    $tpl->setVar($location."_link",$linkUrl);
        
}

$tpl->tprint("main");

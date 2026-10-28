<?php


//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use user_service\vehicle_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/community/service/service_vehicle.php");

$ac = $_REQUEST['ac'];

if($ac == "car_list") {

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
    
    $loop_platinum = $vehicle_list->loop_platinum;
    $loop_regular = $vehicle_list->loop_regular;

    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "delaer_car_body.tpl");
    $tpl->setLoop("T_LP", $loop_platinum);
    $tpl->tprint("main");
    $content_platinum = $tpl->content;
    unset($tpl);
    
    $tpl = new BearTemplate('./tpl',false);
    $tpl->setFile("main", "vehicle_regular_body.tpl");
    $tpl->setLoop("T_LOOP", $loop_regular);
    $tpl->tprint("main");
    $content_regular = $tpl->content;
    unset($tpl);

    $result_data = [
        "status" => "success",
        "msg" => "sucess",
        "items" => array("platinum" => $content_platinum,  "regular" => $content_regular),
        "pagging" => '',
        "navigation_text" => ""
    ];

    echo json_encode($result_data, JSON_UNESCAPED_UNICODE);

}
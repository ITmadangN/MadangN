<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;
use user_service\vehicle_dealer_html;
use user_service\vehicle_dealer_car_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/community/service/service_vehicle_dealer.php");
include("$DOCUMENT_ROOT/community/service/service_vehicle_dealer_html.php");

$id = $_GET["id"];

$sql = "SELECT A.*, B.community_car_listing_images_id, B.image_order, B.image_url, C.company_name, C.logo_url FROM community_car_listings A
        LEFT JOIN community_car_listing_images B on A.community_car_listings_id = B.community_car_listings_id
        LEFT JOIN community_car_dealers C on A.community_car_dealers_id = C.community_car_dealers_id                                                                          
        where  A.community_car_listings_id = :id 
        order by B.image_order asc";

$placeholders = ['id' => $id];
$result = $db->query($sql, $placeholders);

$g_num = 0;
$blank_img = "/images/blank.png";
$loop = array();

$p_logo_url = "";
$array_img = array();
$img_array = array();
$plan_image_id = "";

$row = $db->fetch();

NO_DATA($row, "home", $define_val->DEFAULT_VEHICLE_HOME);

if($row->user_id != $SS_ID) {
 //   exit;
}

do {


    $p_community_car_listings_id = $row->community_car_listings_id;
    $p_community_car_dealers_id = $row->community_car_dealers_id;
    $p_community_car_listing_images_id = $row->community_car_listing_images_id;
    $p_image_order = $row->image_order;    
    $p_user_id = $row->user_id;
    $p_image_url = $row->image_url;
    $p_company_name = $row->company_name;
    $p_logo_url = $row->logo_url;
    $p_seller_name = $row->seller_name;
    $p_seller_phone = $row->seller_phone;
    $p_seller_email = $row->seller_email;
    $p_listing_price = $row->listing_price;
    $p_listing_date = $row->listing_date;
    $p_state_code = $row->state_code;
    $p_city_name = $row->city_name;
    $p_car_accident_history = $row->car_accident_history;
    $p_car_maker = $row->car_maker;
    $p_car_year = $row->car_year;
    $p_car_color = $row->car_color;
    $p_car_model = $row->car_model;
    $p_car_mileage = $row->car_mileage;
    $p_fuel_type = $row->fuel_type;
    $p_body_type = $row->body_type;
    $p_transmission = $row->transmission;
    $p_options_description = $row->options_description;
    $p_description = $row->description;
    $p_view_count = $row->view_count;
    $p_advertiser_notes = $row->advertiser_notes;
    $p_internal_notes = $row->internal_notes;
    $p_listing_status = $row->listing_status;
    $p_is_active = $row->is_active;
    $p_created_user = $row->created_user;
    $p_updated_user = $row->updated_user;
    $p_created_at = $row->created_at;
    $p_updated_at = $row->updated_at;
    $p_ip_address = $row->ip_address;

    $img_array[$g_num]['img'] = $p_image_url;
    $img_array[$g_num]['id'] = $p_community_car_listing_images_id;
    
    if($plan_image_id == "") $plan_image_id = $p_community_car_listing_images_id;
    else $plan_image_id .= ','.$p_community_car_listing_images_id;

    $g_num++;

} while ($row = $db->fetch());


/*
if($g_num < 20) {

    for($i=$g_num;$i<20;$i++) {

        $img_array[$i]['img'] = "";
        $img_array[$i]['id'] = "";
    }

}
*/

$img_max_num = 20-$g_num;
if($img_max_num < 2) $img_max_num = 1;


for($i=0;$i<count($img_array);$i++) {

    $image_thum = "";

    if ($img_array[$i]['img'] != "") {

        $image_thum = $define_val->IMG_PROTECT . "?c=community&cc=vehicle&d=img".$img_array[$i]['id']."&s=". $p_community_car_listings_id;

        $html = MAKE_UPLOAD_HTML2('h_del_img', 'upload_image_'.$img_array[$i]['id'], $img_array[$i]['id'], $image_thum);
    }
    

    $array_img[$i] = array('T_HTML' => $html);

}




$fn_params = array(
    'dealer_id' => "",
    'regular_html_yn' => "Y",
    'tab_type' => "",
    'preview' => ''
);

$dealer_html = new vehicle_dealer_html($db, $define_val, $fn_params);

$main = 3;
$sub = 5;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "vehicle_dealer_update.tpl");

$tpl->setVar("T_ID",$id);

$tpl->setVar("T_DEALER_ID", $p_community_car_dealers_id);

$tpl->setVar("T_TITLE", $p_car_year . " " . $p_car_maker . " " . $p_car_model);

$tpl->setVar("T_LISTING_PRICE", $p_listing_price);
$tpl->setVar("T_MAX_NUM", $img_max_num);
$tpl->setVar("T_EXIST_IMAGE", $plan_image_id);

$tpl->setLoop("T_LOOP", $array_img);

$tpl->setVar("COMPANY_NAME", $p_company_name);

$tpl->setVar("T_SELLER_NAME", $p_seller_name);
$tpl->setVar("T_SELLER_EMAIL", $p_seller_email);
$tpl->setVar("T_SELLER_PHONE", $p_seller_phone);

$tpl->setVar("S_SELECT_CAR_COLOR", ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_color, 1, $p_car_color));
$tpl->setVar("T_CAR_MODEL", $p_car_model);
$tpl->setVar("T_CAR_MILEAGE", $p_car_mileage);
$tpl->setVar("S_SELECT_FUEL_TYPE", ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_fuel_type, 1, $p_fuel_type));
$tpl->setVar("S_SELECT_BODY_TYPE",  ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_body_type,  1,$p_body_type));
$tpl->setVar("S_SELECT_TRANSMISSION",  ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_transmission,  1, $p_transmission));
$tpl->setVar("S_SELECT_CAR_ACCIDENT_HISTORY",  ARRAY_ARRAY_RETURN($define_val->DEFINE_car_accident_history,  1, $p_car_accident_history));
$tpl->setVar("T_OPTIONS_DESCRIPTION", $p_options_description);
$tpl->setVar("T_DESCRIPTION",  $p_description);


$tpl->setVar("S_SELECT_CAR_MAKER", ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_maker_eng, 1, $p_car_maker));
$tpl->setVar("S_SELECT_CAR_YEAR", ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_year, 1, $p_car_year));

$tpl->setVar("S_SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_CITY_NAME", DB_ARRAY_ARRAY_RETURN(0, $p_city_name, $db, "common_code", "code_sub_name", "code_sub", "code = '{$p_state_code}' order by code_sub_name asc"));


include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

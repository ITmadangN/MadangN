<?php

use BearTemplate\BearTemplate;
use user_service\vehicle_dealer_html;
use user_service\vehicle_dealer_car_list;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
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

$row = $db->fetch();
NO_DATA($row, "home", $define_val->DEFAULT_VEHICLE_HOME);

do {

    $p_community_car_listings_id = $row->community_car_listings_id;
    $p_community_car_dealers_id = $row->community_car_dealers_id;
    $p_community_car_listing_images_id = $row->community_car_listing_images_id;
    $p_image_order = $row->image_order;
    $p_image_url = $row->image_url;
    $p_user_id = $row->user_id;
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
    $p_view_count = $row->view_count + 1;
    $p_advertiser_notes = $row->advertiser_notes;
    $p_internal_notes = $row->internal_notes;
    $p_listing_status = $row->listing_status;
    $p_is_active = $row->is_active;
    $p_created_user = $row->created_user;
    $p_updated_user = $row->updated_user;
    $p_created_at = $row->created_at;
    $p_updated_at = $row->updated_at;
    $p_ip_address = $row->ip_address;
    
    //$p_car_maker = ARRAY_RETURN($define_val->DEFINE_vehicle_car_maker, $p_car_maker);


    /*
    $p_user_id = $row->user_id;
    $p_company_name = $row->company_name;
    $p_company_website = $row->company_website;
    $p_dealer_website = $row->dealer_website;
    $p_contact_name = $row->contact_name;
    $p_contact_email = $row->contact_email;
    $p_contact_phone = $row->contact_phone;
    $p_listing_address1 = $row->listing_address1;
    $p_listing_address2 = $row->listing_address2;
    $p_state_code = $row->state_code;
    $p_city_name = $row->city_name;
    $p_listing_zip = $row->listing_zip;
    $p_listing_zip_ext = $row->listing_zip_ext;
    $p_listing_country = $row->listing_country;
    $p_logo_url = $row->logo_url;
    $p_main_image_url = $row->main_image_url;
    $p_dealer_introduction = $row->dealer_introduction;
    $p_view_count = $row->view_count;
    $p_is_active = $row->is_active;
    $p_created_user = $row->created_user;
    $p_updated_user = $row->updated_user;
    $p_created_at = $row->created_at;
    $p_updated_at = $row->updated_at;
    $p_ip_address = $row->ip_address;*/

    if ($p_image_url != "") {

        $img_no = "img" . $p_community_car_listing_images_id;
        $image_thum = $define_val->IMG_PROTECT . "?c=community&cc=vehicle&d=$img_no&s=". $p_community_car_listings_id;

        if($g_num == 0) {
            $class = "swiper-slide swiper-slide-visible swiper-slide-fully-visible swiper-slide-active";
        }
        else {
            if($g_num == 1) {
                $class = "swiper-slide swiper-slide-next";
            }
            else {
                $class = "swiper-slide";
            }
        }
        $loop[$g_num] = array('T_NO' => $g_num+1,'T_CLASS' => $class, 'T_IMG' => $image_thum);

        $g_num++;

    }

} while ($row = $db->fetch());


$db->update('community_car_listings', ['view_count' => $p_view_count], 'community_car_listings_id = ' . $id);

if($p_logo_url != "" ) {
    $logo_img = $define_val->IMG_PROTECT ."?c=community&cc=vehicle_dealer&d=logo&s=".$p_community_car_dealers_id;
}
else {
    $logo_img = $blank_img;
}



$fn_params = array(
    'dealer_id' => $_GET['dealer_id'] ?? "",
    'regular_html_yn' => "Y",
    'tab_type' => "",
    'preview' => ""
);

$dealer_html = new vehicle_dealer_html($db, $define_val, $fn_params);


$g_page = $_COOKIE['dd_page'] ?? 1;
$s_car_maker = $_COOKIE['sdd_car_maker'] ?? '';
$s_min_car_year = $_COOKIE['sdd_min_car_year'] ?? '';
$s_max_car_year = $_COOKIE['sdd_max_car_year'] ?? '';
$s_state_code = $_COOKIE['sdd_state_code'] ?? '';
$s_city_name = $_COOKIE['sdd_city_name'] ?? '';
$s_listing_price_start = $_COOKIE['sdd_listing_price_start'] ?? '';
$s_listing_price_end = $_COOKIE['sdd_listing_price_end'] ?? '';
$s_car_mileage_start = $_COOKIE['sdd_car_mileage_start'] ?? '';
$s_car_mileage_end = $_COOKIE['sdd_car_mileage_end'] ?? '';
$s_kind = $_COOKIE['sdd_kind'] ?? '';
$s_keyword = $_COOKIE['sdd_keyword'] ?? '';
$s_cnt = $_COOKIE['sdd_cnt'] ?? 10;


$main = 3;
$sub = 5;
$page = "";
                                                           
$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "vehicle_dealer_view.tpl");

$tpl->setVar("T_ID",$id);

$tpl->setVar("T_DEALER_ID",$p_community_car_dealers_id);

$tpl->setVar("T_TITLE", $p_car_year . " " . $p_car_maker . " " . $p_car_model);

$tpl->setVar("T_LOGO_IMG", $logo_img);
$tpl->setVar("T_COMPANY_NAME", $p_company_name);
$tpl->setVar("T_LISTING_PRICE", number_format($p_listing_price,0));

$tpl->setLoop("T_LOOP", $loop);

$tpl->setVar("T_SELLER_NAME", $p_seller_name);
$tpl->setVar("T_SELLER_EMAIL", $p_seller_email);
$tpl->setVar("T_SELLER_PHONE", $p_seller_phone);


$tpl->setVar("T_CAR_MAKER", $p_car_maker);
$tpl->setVar("T_CAR_YEAR", $p_car_year);
$tpl->setVar("T_CAR_COLOR", ARRAY_RETURN($define_val->DEFINE_vehicle_car_color,  $p_car_color));
$tpl->setVar("T_CAR_MODEL", $p_car_model);
$tpl->setVar("T_CAR_MILEAGE", number_format($p_car_mileage,0));
if($p_city_name == "") $tpl->setVar("T_LOCATION",$p_state_code );
else $tpl->setVar("T_LOCATION",$p_city_name . ", " . $p_state_code );
$tpl->setVar("T_FUEL_TYPE", ARRAY_RETURN($define_val->DEFINE_vehicle_fuel_type,  $p_fuel_type));
$tpl->setVar("T_BODY_TYPE",  ARRAY_RETURN($define_val->DEFINE_vehicle_body_type,  $p_body_type));
$tpl->setVar("T_TRANSMISSION",  ARRAY_RETURN($define_val->DEFINE_vehicle_transmission,  $p_transmission));
$tpl->setVar("T_OPTIONS_DESCRIPTION", @str_replace("\r\n", "<br>", $p_options_description));
$tpl->setVar("T_DESCRIPTION",  @str_replace("\r\n", "<br>", $p_description));
$tpl->setVar("T_CAR_ACCIDENT_HISTORY",   ARRAY_RETURN($define_val->DEFINE_car_accident_history,  $p_car_accident_history));


$tpl->setVar("S_MIN_PRICE",$s_listing_price_start);
$tpl->setVar("S_MAX_PRICE",$s_listing_price_end);
$tpl->setVar("S_MIN_DIST",$s_car_mileage_start);
$tpl->setVar("S_MAX_DIST",$s_car_mileage_end);

$tpl->setVar("S_MIN_CAR_YEAR",$s_min_car_year);
$tpl->setVar("S_MAX_CAR_YEAR",$s_max_car_year);

//$tpl->setVar("S_SELECT_CAR_MAKER", ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_maker_eng, 0, ""));
$tpl->setVar("S_CHECKBOX_CAR_MAKER",make_multi_checkbox($define_val->DEFINE_vehicle_car_maker_eng, "s_car_maker", $s_car_maker));
$tpl->setVar("S_SELECT_CAR_YEAR", ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_year, 0, ""));

$tpl->setVar("S_SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(0, $s_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_CITY_NAME",DB_ARRAY_ARRAY_RETURN(1,$s_city_name,$db,"common_code","code_sub_name","code_sub_name","code = '{$s_state_code}' order by code_sub_name asc"));
$tpl->setVar("S_SELECT_VEHICLE_KIND", ARRAY_ARRAY_RETURN($define_val->DEFINE_behicle_s_kind, 0, ""));

if($p_user_id == $SS_ID) $tpl->setVar("UPDATE_DELETE", true);

$tpl->setVar("G_PAGE", $g_page);


$tpl->setVar("T_USER_NAME",$SS_NICKNAME);
$tpl->setVar("T_USER_EMAIL",$SS_EMAIL);
$tpl->setVar("T_USER_PHONE",$SS_PHONE);

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

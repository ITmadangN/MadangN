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
        where  A.community_car_listings_id = :id and A.community_car_dealers_id = 0
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
    $p_user_id = $row->user_id;
    $p_image_order = $row->image_order;
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

$fn_params = array(
    'dealer_id' => "",
    'regular_html_yn' => "Y",
    'tab_type' => "",
    'preview' => ""
);

$dealer_html = new vehicle_dealer_html($db, $define_val, $fn_params);

$main = 3;
$sub = 5;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "vehicle_regular_view.tpl");

$tpl->setVar("FALSE_USER_ID", $p_user_id);

$tpl->setVar("T_SS_NICKNAME", $SS_NICKNAME);

$tpl->setVar("T_ID", $id);

$tpl->setVar("T_DEALER_ID",0);

$tpl->setVar("T_TITLE", $p_car_year . " " . $p_car_maker . " " . $p_car_model);
$tpl->setVar("MEMO_TITLE", $p_car_year . " " . $p_car_maker . " " . $p_car_model);

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


$tpl->setVar("S_SELECT_CAR_MAKER", ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_maker, 0, ""));
$tpl->setVar("S_SELECT_CAR_YEAR", ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_year, 0, ""));

$tpl->setVar("S_SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(0, "", $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_VEHICLE_KIND", ARRAY_ARRAY_RETURN($define_val->DEFINE_behicle_s_kind, 0, ""));


$tpl->setVar("T_PARENT_CODE", "community_vehicle_regular");
$tpl->setVar("T_PARENT_ID", $id);

if($p_user_id == $SS_ID) $tpl->setVar("UPDATE_DELETE", true);

if($SS_ID != "") $tpl->setVar("T_REPLY_WRITE", "<button class='btn btn-sm lg:btn-md btn-primary w-100' type='button' onclick='SAVE_REPLY();'>댓글쓰기</button>");
else $tpl->setVar("T_REPLY_WRITE", "<button class='btn btn-sm lg:btn-md btn-primary w-100' type='button' onclick=\"alert('로그인을 먼저 해주세요');GO_LOGIN_DISPLAY();\">댓글쓰기</button>");

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

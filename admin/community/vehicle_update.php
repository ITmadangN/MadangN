<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "autolisting_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$community_car_listings_id = $_GET["community_car_listings_id"] ?? "";

$sql = "SELECT * FROM community_car_listings WHERE community_car_listings_id = :community_car_listings_id";
$placeholders = ['community_car_listings_id' => $community_car_listings_id];

$result = $db->query($sql, $placeholders);
if (!$result) {
    echo "데이터가 없습니다.";
    exit;
}

$row = $db->fetch();
if (!$row) {
    echo "데이터가 없습니다.";
    exit;
}

$p_community_car_listings_id = $row->community_car_listings_id;
$p_community_car_dealers_id  = $row->community_car_dealers_id;
$p_user_id                   = $row->user_id;
$p_seller_name               = $row->seller_name;
$p_seller_phone              = $row->seller_phone;
$p_seller_email              = $row->seller_email;
$p_listing_price             = $row->listing_price;
$p_listing_date              = $row->listing_date;
$p_state_code                = $row->state_code;
$p_car_accident_history      = $row->car_accident_history;
$p_city_name                 = $row->city_name;
$p_car_maker                 = $row->car_maker;
$p_car_year                  = $row->car_year;
$p_car_color                 = $row->car_color;
$p_car_model                 = $row->car_model;
$p_car_mileage               = $row->car_mileage;
$p_fuel_type                 = $row->fuel_type;
$p_body_type                 = $row->body_type;
$p_transmission              = $row->transmission;
$p_options_description       = $row->options_description;
$p_description               = $row->description;
$p_view_count                = $row->view_count;
$p_advertiser_notes          = $row->advertiser_notes;
$p_internal_notes            = $row->internal_notes;
$p_listing_status            = $row->listing_status;
$p_is_active                 = $row->is_active;
$p_created_user              = $row->created_user;
$p_updated_user              = $row->updated_user;
$p_created_at                = $row->created_at;
$p_updated_at                = $row->updated_at;
$p_ip_address               = $row->ip_address;

// 딜러 회사명 조회
$p_company_name = @DB_ARRAY_RETURN($db, "community_car_dealers", "company_name", "community_car_dealers_id = '{$p_community_car_dealers_id}'");

// 가격 포맷
$v_listing_price = ($p_listing_price != "") ? number_format($p_listing_price) : "";

// 주행거리 포맷
$v_car_mileage = ($p_car_mileage != "") ? number_format($p_car_mileage) : "";

// 등록일(Unix Timestamp) 포맷
$v_listing_date = ($p_listing_date != "") ? date("Y-m-d H:i:s", $p_listing_date) : "";

$main = 4;
$sub = 8;
$mtitle = "커뮤니티";
$stitle = "자동차 매물 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "vehicle_update.tpl");

$tpl->setVar("T_ID", $p_community_car_listings_id);
$tpl->setVar("T_DEALER_ID", $p_community_car_dealers_id);
$tpl->setVar("T_COMPANY_NAME", $p_company_name);
$tpl->setVar("T_USER_ID", $p_user_id);
$tpl->setVar("T_SELLER_NAME", $p_seller_name);
$tpl->setVar("T_SELLER_PHONE", $p_seller_phone);
$tpl->setVar("T_SELLER_EMAIL", $p_seller_email);
$tpl->setVar("T_LISTING_PRICE", $p_listing_price);
$tpl->setVar("T_LISTING_DATE", $p_listing_date);
$tpl->setVar("S_SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_CITY_NAME", DB_ARRAY_ARRAY_RETURN(0, $p_city_name, $db, "common_code", "code_sub_name", "code_sub", "code = '{$p_state_code}' order by code_sub_name asc"));
$tpl->setVar("S_SELECT_CAR_MAKER", ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_maker_eng, 1, $p_car_maker));
$tpl->setVar("S_SELECT_CAR_YEAR", ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_year, 1, $p_car_year));
$tpl->setVar("S_SELECT_CAR_COLOR", ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_car_color, 1, $p_car_color));
$tpl->setVar("T_CAR_MODEL", $p_car_model);
$tpl->setVar("T_CAR_MILEAGE", $p_car_mileage);
$tpl->setVar("S_SELECT_CAR_ACCIDENT_HISTORY",  ARRAY_ARRAY_RETURN($define_val->DEFINE_car_accident_history,  1, $p_car_accident_history));
$tpl->setVar("S_SELECT_FUEL_TYPE", ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_fuel_type, 1, $p_fuel_type));
$tpl->setVar("S_SELECT_BODY_TYPE",  ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_body_type,  1,$p_body_type));
$tpl->setVar("S_SELECT_TRANSMISSION",  ARRAY_ARRAY_RETURN($define_val->DEFINE_vehicle_transmission,  1, $p_transmission));
$tpl->setVar("T_OPTIONS_DESCRIPTION", $p_options_description);
$tpl->setVar("T_DESCRIPTION", $p_description);
$tpl->setVar("T_ADVERTISER_NOTES", $p_advertiser_notes);
$tpl->setVar("T_INTERNAL_NOTES", $p_internal_notes);
$tpl->setVar("T_VIEW_COUNT", $p_view_count);
$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_active));
$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_UPDATED_USER", $p_updated_user);
$tpl->setVar("T_UPDATED_AT", $p_updated_at);
$tpl->setVar("T_IP_ADDRESS", $p_ip_address);

// ===== 이미지 목록 (1:N) =====
$sql_img = "SELECT * FROM community_car_listing_images WHERE community_car_listings_id = :community_car_listings_id ORDER BY image_order ASC, community_car_listing_images_id ASC";
$placeholders_img = ['community_car_listings_id' => $p_community_car_listings_id];

$db->query($sql_img, $placeholders_img);
$img_rows = $db->fetchAll();

if ($img_rows && count($img_rows) > 0) {
    $i = 0;
    foreach ($img_rows as $img) {
                    
        $img_no = "img" . $img->community_car_listing_images_id;    
        $v_image_url = $define_val->IMG_PROTECT . "?c=community&cc=vehicle&d=$img_no&s=" . $p_community_car_listings_id;
        $v_image_tag = "<img src=\"$v_image_url\" alt=\"\" />";

        $loop[$i] = array(
            "T_IMAGE_ID"     => $img->community_car_listing_images_id,
            "T_IMAGE_ORDER"  => $i+1,
            "T_IMAGE_URL"    => $v_image_tag,
            "T_DEL_IMAGE_URL" => GET_DEL_UPLOAD_IMAGE('image_url_'.$img->community_car_listing_images_id),
        );
        $i++;
    }

    if($i<20) {
        
        for($k=$i;$k<20;$k++) {
            $loop[$k] = array(
                "T_IMAGE_ID"     => 'n_'.$k,
                "T_IMAGE_ORDER"  => $k+1,
                "T_IMAGE_URL"    => '',
                "T_DEL_IMAGE_URL" => '',
            );
        }
    }
    
    $tpl->setLoop("IMAGE_LIST", $loop);
    $tpl->setVar("HAS_IMAGE", true);
} else {
    $tpl->setVar("NO_IMAGE", true);
}



if ($p_is_active == "0") $tpl->setVar("CONFIRM", true);
$tpl->setVar("MODIFY_YN", true);

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

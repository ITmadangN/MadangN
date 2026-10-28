<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "autodealer_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$community_car_dealers_id = $_GET["community_car_dealers_id"] ?? "";

$sql = "SELECT * FROM community_car_dealers WHERE community_car_dealers_id = :community_car_dealers_id";
$placeholders = ['community_car_dealers_id' => $community_car_dealers_id];

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

$p_community_car_dealers_id = $row->community_car_dealers_id;
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
$p_is_modify_yn = $row->is_modify_yn;
$p_created_user = $row->created_user;
$p_updated_user = $row->updated_user;
$p_created_at = $row->created_at;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;

$blank_img = "";
if ($p_logo_url != "") {
    $v_logo_url = $define_val->IMG_PROTECT . "?c=community&cc=vehicle_dealer&d=logo&s=" . $p_community_car_dealers_id;
    $v_logo_url = "<img src=\"$v_logo_url\" alt=\"\" />";
} else {
    $v_logo_url = $blank_img;
}

if ($p_main_image_url != "") {
    $v_main_image_url = $define_val->IMG_PROTECT . "?c=community&cc=vehicle_dealer&d=main&s=" . $p_community_car_dealers_id;
    $v_main_image_url = "<img src=\"$v_main_image_url\" alt=\"\" />";
} else {
    $v_main_image_url = $blank_img;
}

$main = 4;
$sub = 6;
$mtitle = "커뮤니티";
$stitle = "자동차 딜러 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "vehicle_dealer_view.tpl");

$tpl->setVar("T_ID", $p_community_car_dealers_id);
$tpl->setVar("T_COMPANY_NAME", $p_company_name);
$tpl->setVar("T_COMPANY_WEBSITE", $p_company_website);
$tpl->setVar("T_DEALER_WEBSITE", $p_dealer_website);
$tpl->setVar("T_LOGO_URL", $v_logo_url);
$tpl->setVar("T_MAIN_IMAGE_URL", $v_main_image_url);
$tpl->setVar("SELECT_STATE_CODE", @DB_ARRAY_RETURN($db, "common_code", "code_sub_name", "code_sub = '{$p_state_code}'"));
$tpl->setVar("SELECT_CITY_NAME", @DB_ARRAY_RETURN($db, "common_code", "code_sub_name", "code = '{$p_state_code}' and code_sub = '{$p_city_name}'"));
$tpl->setVar("T_CONTACT_NAME", $p_contact_name);
$tpl->setVar("T_CONTACT_EMAIL", $p_contact_email);
$tpl->setVar("T_CONTACT_PHONE", $p_contact_phone);
$tpl->setVar("T_LISTING_ZIP", $p_listing_zip);
$tpl->setVar("T_LISTING_ZIP_EXT", $p_listing_zip_ext);
$tpl->setVar("T_LISTING_COUNTRY", $p_listing_country);
$tpl->setVar("T_LISTING_ADDRESS1", $p_listing_address1);
$tpl->setVar("T_LISTING_ADDRESS2", $p_listing_address2);
$tpl->setVar("T_DEALER_INTRODUCTION", @str_replace("\n", "<br>", $p_dealer_introduction));
$tpl->setVar("T_VIEW_COUNT", $p_view_count);
$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_RETURN($define_val->DEFINE_is_active, $p_is_active));
$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_UPDATED_USER", $p_updated_user);
$tpl->setVar("T_UPDATED_AT", $p_updated_at);
$tpl->setVar("T_IP_ADDRESS", $p_ip_address);

if($p_is_active == "0") $tpl->setVar("CONFIRM", true); 
$tpl->setVar("MODIFY_YN", true); 

$tpl->setVar("T_IS_MODIFY_YN",ARRAY_RETURN($define_val->DEFINE_is_active, $p_is_modify_yn));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

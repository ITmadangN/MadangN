<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$id = $_GET["id"];
$sid = $_GET["sid"];

$sql = "SELECT A.*, B.community_recruit_listings_sub_id, B.job_type, C.state_code, C.city_name FROM community_recruit_listings A
        LEFT JOIN community_recruit_listings_sub B on A.community_recruit_listings_id = B.community_recruit_listings_id
        LEFT JOIN community_recruit_listings_loc_sub C on A.community_recruit_listings_id = C.community_recruit_listings_id
        where A.community_recruit_listings_id = :id";
        
//                where A.community_recruit_listings_id = :id and B.community_recruit_listings_sub_id = :sub_id";

$placeholders = ['id' => $id];
$result = $db->query($sql, $placeholders);

$row = $db->fetch();
NO_DATA($row, "home", $define_val->DEFAULT_RECRUIT_HOME);

$p_ad_company_id = $row->ad_company_id;
$p_user_id = $row->user_id;
$p_company_name = $row->company_name;
$p_logo_image_url = $row->logo_image_url;
$p_logo_position = $row->logo_position;
$p_main_image_url = $row->main_image_url;
$p_main_image_background_url = $row->main_image_background_url;
$p_sub_image_01_url = $row->sub_image_01_url;
$p_sub_image_02_url = $row->sub_image_02_url;
$p_sub_image_03_url = $row->sub_image_03_url;
$p_sub_image_04_url = $row->sub_image_04_url;
$p_sub_image_05_url = $row->sub_image_05_url;
$p_sub_image_06_url = $row->sub_image_06_url;
$p_title = $row->title;
$p_subtitle = $row->subtitle;
$p_state_code = $row->state_code;
$p_city_name = $row->city_name;
$p_contact_name = $row->contact_name;
$p_contact_email = $row->contact_email;
$p_contact_phone = $row->contact_phone;
$p_job_opening_information = $row->job_opening_information;
$p_has_15_plus_employees = $row->has_15_plus_employees;
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

$p_advertising_level = $row->advertising_level;
$p_job_type = $row->job_type;

$p_has_15_check = "";
if($p_has_15_plus_employees == 'Y') $p_has_15_check = 'checked';



if($p_advertising_level == "regular" ) $logo_img =  "/images/blank.png";
else $logo_img = $define_val->IMG_PROTECT ."?c=community&cc=recruit&d=logo&s=".$row->community_recruit_listings_id;

$sub_image_01_url = "";
$sub_image_02_url = "";
$sub_image_03_url = "";
$sub_image_04_url = "";
$sub_image_05_url = "";

if($p_sub_image_01_url != "") {
    $sub_img = $define_val->IMG_PROTECT ."?c=community&cc=recruit&d=img1&s=".$row->community_recruit_listings_id;
    $sub_image_01_url = '<img class="media-cover image uc-transition-opaque" src="'.$sub_img.'" data-src="/community/images/company.jpg" alt="#" data-uc-img="loading: lazy">';
}

if($p_sub_image_02_url != "") {
    $sub_img = $define_val->IMG_PROTECT ."?c=community&cc=recruit&d=img2&s=".$row->community_recruit_listings_id;
    $sub_image_02_url = '<img class="media-cover image uc-transition-opaque" src="'.$sub_img.'" data-src="/community/images/company.jpg" alt="#" data-uc-img="loading: lazy">';
}

if($p_sub_image_03_url != "") {
    $sub_img = $define_val->IMG_PROTECT ."?c=community&cc=recruit&d=img3&s=".$row->community_recruit_listings_id;
    $sub_image_03_url = '<img class="media-cover image uc-transition-opaque" src="'.$sub_img.'" data-src="/community/images/company.jpg" alt="#" data-uc-img="loading: lazy">';
}

if($p_sub_image_04_url != "") {
    $sub_img = $define_val->IMG_PROTECT ."?c=community&cc=recruit&d=img4&s=".$row->community_recruit_listings_id;
    $sub_image_04_url = '<img class="media-cover image uc-transition-opaque" src="'.$sub_img.'" data-src="/community/images/company.jpg" alt="#" data-uc-img="loading: lazy">';
}

if($p_sub_image_05_url != "") {
    $sub_img = $define_val->IMG_PROTECT ."?c=community&cc=recruit&d=img5&s=".$row->community_recruit_listings_id;
    $sub_image_05_url = '<img class="media-cover image uc-transition-opaque" src="'.$sub_img.'" data-src="/community/images/company.jpg" alt="#" data-uc-img="loading: lazy">';
}

$main=3;
$sub=2;
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "recruit_update.tpl");

$tpl->setVar("T_ID", $id);

$tpl->setVar("T_ADVERTISING_LEVEL", ARRAY_RETURN($define_val->DEFINE_recruit_advertising_level_TEXT, $p_advertising_level));
$tpl->setVar("T_LOG_IMAGE_URL", $logo_img);
$tpl->setVar("T_COMPANY_NAME", $p_company_name);
$tpl->setVar("T_TITLE", $p_title);
$tpl->setVar("T_SUBTITLE", $p_subtitle);
$tpl->setVar("T_JOB_TYPE", $p_job_type);
$tpl->setVar("T_LOCATION", $p_city_name . ", " . $p_state_code);
$tpl->setVar("SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by code_sub_name asc"));
$tpl->setVar("SELECT_CITY_NAME", DB_ARRAY_ARRAY_RETURN(1, $p_city_name, $db, "common_code", "code_sub_name", "code_sub", "code = '{$p_state_code}' order by code_sub_name asc"));
$tpl->setVar("T_CONTACT_NAME", $p_contact_name);
$tpl->setVar("T_CONTACT_EMAIL", $p_contact_email);
$tpl->setVar("T_CONTACT_PHONE", $p_contact_phone);
if($sub_image_01_url != "" || $sub_image_02_url != "" || $sub_image_03_url != "" || $sub_image_04_url != "" || $sub_image_05_url != "") $tpl->setVar("EXIST_SUB_IMAGES", true);

$tpl->setVar("T_SUB_IMAGE_01_URL", $sub_image_01_url);
$tpl->setVar("T_SUB_IMAGE_02_URL", $sub_image_02_url);
$tpl->setVar("T_SUB_IMAGE_03_URL", $sub_image_03_url);
$tpl->setVar("T_SUB_IMAGE_04_URL", $sub_image_04_url);
$tpl->setVar("T_SUB_IMAGE_05_URL", $sub_image_05_url);

$tpl->setVar("T_HAS_15_CHECKED", $p_has_15_check);

if($p_state_code == "CA") $tpl->setVar("HAS_15_DISPLAY", "");
else $tpl->setVar("HAS_15_DISPLAY", "none;");


$tpl->setVar("T_JOB_OPENING_INFORMATION", $p_job_opening_information);


$tpl->setVar("S_SELECT_JOB_TYPE",ARRAY_ARRAY_RETURN($define_val->DEFINE_recruit_job_type,1,$p_job_type));
$tpl->setVar("S_SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc"));
$tpl->setVar("S_SELECT_CITY_NAME", DB_ARRAY_ARRAY_RETURN(1, $p_city_name, $db, "common_code", "code_sub_name", "code_sub", "code = '{$p_state_code}' order by code_sub_name asc"));



include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

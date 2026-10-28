<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "business_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$community_business_id = $_GET["community_business_id"] ?? "";

$sql = "SELECT * FROM community_business WHERE community_business_id = :community_business_id";
$placeholders = ['community_business_id' => $community_business_id];

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

$p_community_business_id = $row->community_business_id;
$p_ad_company_id = $row->ad_company_id;
$p_company_name = $row->company_name;
$p_advertising_level = $row->advertising_level;
$p_business_type = $row->business_type;
$p_main_image_url = $row->main_image_url;
$p_sub_image_01_url = $row->sub_image_01_url;
$p_sub_image_02_url = $row->sub_image_02_url;
$p_sub_image_03_url = $row->sub_image_03_url;
$p_sub_image_04_url = $row->sub_image_04_url;
$p_sub_image_05_url = $row->sub_image_05_url;
$p_title = $row->title;
$p_state_code = $row->state_code;
$p_city_name = $row->city_name;
$p_contact_name = $row->contact_name;
$p_contact_email = $row->contact_email;
$p_contact_phone = $row->contact_phone;
$p_content = $row->content;
$p_view_count = $row->view_count;
$p_advertiser_notes = $row->advertiser_notes;
$p_internal_notes = $row->internal_notes;
$p_is_active = $row->is_active;
$p_is_approved = $row->is_approved;
$p_is_modify_yn = $row->is_modify_yn;
$p_created_user = $row->created_user;
$p_created_at = $row->created_at;
$p_ip_address = $row->ip_address;

$blank_img = "";
$p_del_main_image_url = "";
if ($p_main_image_url != "") {
    $v_main_image_url = $define_val->IMG_PROTECT . "?c=community&cc=business&d=main&s=" . $p_community_business_id."&t=".time();
    $v_main_image_url = "<img src=\"$v_main_image_url\" alt=\"\" style='max-width:200px;' />";
    $p_del_main_image_url = GET_DEL_UPLOAD_IMAGE('main_image_url');
} else {
    $v_main_image_url = $blank_img;
}

$p_del_sub_image_01_url = "";
if ($p_sub_image_01_url != "") {
    $v_sub_image_01_url = $define_val->IMG_PROTECT . "?c=community&cc=business&d=img1&s=" . $p_community_business_id."&t=".time();
    $v_sub_image_01_url = "<img src=\"$v_sub_image_01_url\" alt=\"\" style='max-width:200px;' />";
    $p_del_sub_image_01_url = GET_DEL_UPLOAD_IMAGE('sub_image_01_url');
} else {
    $v_sub_image_01_url = $blank_img;
}

$p_del_sub_image_02_url = "";

if ($p_sub_image_02_url != "") {
    $v_sub_image_02_url = $define_val->IMG_PROTECT . "?c=community&cc=business&d=img2&s=" . $p_community_business_id."&t=".time();
    $v_sub_image_02_url = "<img src=\"$v_sub_image_02_url\" alt=\"\" />";
    $p_del_sub_image_02_url = GET_DEL_UPLOAD_IMAGE('sub_image_02_url');
} else {
    $v_sub_image_02_url = $blank_img;
}

$p_del_sub_image_03_url = "";

if ($p_sub_image_03_url != "") {
    $v_sub_image_03_url = $define_val->IMG_PROTECT . "?c=community&cc=business&d=img3&s=" . $p_community_business_id."&t=".time();
    $v_sub_image_03_url = "<img src=\"$v_sub_image_03_url\" alt=\"\" />";
    $p_del_sub_image_03_url = GET_DEL_UPLOAD_IMAGE('sub_image_03_url');
} else {
    $v_sub_image_03_url = $blank_img;
}

$p_del_sub_image_04_url = "";

if ($p_sub_image_04_url != "") {
    $v_sub_image_04_url = $define_val->IMG_PROTECT . "?c=community&cc=business&d=img4&s=" . $p_community_business_id."&t=".time();
    $v_sub_image_04_url = "<img src=\"$v_sub_image_04_url\" alt=\"\" />";
    $p_del_sub_image_04_url = GET_DEL_UPLOAD_IMAGE('sub_image_04_url');
} else {
    $v_sub_image_04_url = $blank_img;
}

$p_del_sub_image_05_url = "";

if ($p_sub_image_05_url != "") {
    $v_sub_image_05_url = $define_val->IMG_PROTECT . "?c=community&cc=business&d=img5&s=" . $p_community_business_id."&t=".time();
    $v_sub_image_05_url = "<img src=\"$v_sub_image_05_url\" alt=\"\" />";
    $p_del_sub_image_05_url = GET_DEL_UPLOAD_IMAGE('sub_image_05_url');
} else {
    $v_sub_image_05_url = $blank_img;
}

$advertising_define = $define_val->DEFINE_recruit_advertising_level;
if (isset($define_val->DEFINE_business_advertising_level)) {
    $advertising_define = $define_val->DEFINE_business_advertising_level;
}

$business_type_define = $define_val->DEFINE_blank;
if (isset($define_val->DEFINE_business_type)) {
    $business_type_define = $define_val->DEFINE_business_type;
}

$t_advertising_level = ARRAY_ARRAY_RETURN($advertising_define, 1, $p_advertising_level);
$t_business_type = ARRAY_ARRAY_RETURN($business_type_define, 1, $p_business_type);

$main = 4;
$sub = 5;
$mtitle = "커뮤니티";
$stitle = "비즈니스 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "business_update.tpl");

$tpl->setVar("T_ID", $p_community_business_id);
$tpl->setVar("T_AC_ID", $p_ad_company_id);
$tpl->setVar("T_COMPANY_NAME", $p_company_name);

$tpl->setVar("H_MAIN_IMAGE_URL", $p_main_image_url);
$tpl->setVar("T_MAIN_IMAGE_URL", $v_main_image_url);
$tpl->setVar("T_DEL_MAIN_IMAGE_URL", $p_del_main_image_url);

$tpl->setVar("H_SUB_IMAGE_01_URL", $p_sub_image_01_url);
$tpl->setVar("T_SUB_IMAGE_01_URL", $v_sub_image_01_url);
$tpl->setVar("T_DEL_SUB_IMAGE_01_URL", $p_del_sub_image_01_url);

$tpl->setVar("T_DEL_SUB_IMAGE_02_URL", $p_del_sub_image_02_url);
$tpl->setVar("H_SUB_IMAGE_02_URL", $p_sub_image_02_url);
$tpl->setVar("T_SUB_IMAGE_02_URL", $v_sub_image_02_url);

$tpl->setVar("T_DEL_SUB_IMAGE_03_URL", $p_del_sub_image_03_url);
$tpl->setVar("H_SUB_IMAGE_03_URL", $p_sub_image_03_url);
$tpl->setVar("T_SUB_IMAGE_03_URL", $v_sub_image_03_url);

$tpl->setVar("T_DEL_SUB_IMAGE_04_URL", $p_del_sub_image_04_url);
$tpl->setVar("H_SUB_IMAGE_04_URL", $p_sub_image_04_url);
$tpl->setVar("T_SUB_IMAGE_04_URL", $v_sub_image_04_url);

$tpl->setVar("T_DEL_SUB_IMAGE_05_URL", $p_del_sub_image_05_url);
$tpl->setVar("H_SUB_IMAGE_05_URL", $p_sub_image_05_url);
$tpl->setVar("T_SUB_IMAGE_05_URL", $v_sub_image_05_url);


$tpl->setVar("T_LOOP.T_ADVERTISING_LEVEL", $t_advertising_level);
$tpl->setVar("T_LOOP.T_BUSINESS_TYPE", $t_business_type);
$tpl->setLoop("T_LOOP", array(array("T_ADVERTISING_LEVEL" => $t_advertising_level, "T_BUSINESS_TYPE" => $t_business_type)));

$tpl->setVar("T_TITLE", $p_title);
$tpl->setVar("SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by code_sub_name asc"));
$tpl->setVar("SELECT_CITY_NAME", DB_ARRAY_ARRAY_RETURN(1, $p_city_name, $db, "common_code", "code_sub_name", "code_sub", "code = '{$p_state_code}' order by code_sub_name asc"));
$tpl->setVar("T_CONTACT_NAME", $p_contact_name);
$tpl->setVar("T_CONTACT_EMAIL", $p_contact_email);
$tpl->setVar("T_CONTACT_PHONE", $p_contact_phone);
$tpl->setVar("T_CONTENT", $p_content);
$tpl->setVar("T_VIEW_COUNT", $p_view_count);
$tpl->setVar("T_ADVERTISER_NOTES", $p_advertiser_notes);
$tpl->setVar("T_INTERNAL_NOTES", $p_internal_notes);
$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_active));
$tpl->setVar("SELECT_IS_APPROVED", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_approved));
$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_IP_ADDRESS", $p_ip_address);
$tpl->setVar("G_NUM", 1);

$tpl->setVar("SELECT_IS_MODIFY_YN",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_modify_yn));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

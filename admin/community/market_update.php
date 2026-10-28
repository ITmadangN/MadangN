<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "buysell_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$community_marketplace_listings_id = $_GET["community_marketplace_listings_id"];

$sql = "SELECT * FROM community_marketplace_listings where community_marketplace_listings_id = :community_marketplace_listings_id";
$placeholders = ['community_marketplace_listings_id' => $community_marketplace_listings_id];

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

$p_community_marketplace_listings_id = $row->community_marketplace_listings_id;
$p_listing_type = $row->listing_type;
$p_marketplace_type = $row->marketplace_type;
$p_title = $row->title;
$p_state_code = $row->state_code;
$p_city_name = $row->city_name;
$p_marketplace_price = $row->marketplace_price;
$p_contact_phone = $row->contact_phone;
$p_description = $row->description;
$p_image_01_url = $row->image_01_url;
$p_image_02_url = $row->image_02_url;
$p_image_03_url = $row->image_03_url;
$p_image_04_url = $row->image_04_url;
$p_image_05_url = $row->image_05_url;
$p_image_06_url = $row->image_06_url;
$p_view_count = $row->view_count;
$p_internal_notes = $row->internal_notes;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_created_at = $row->created_at;
$p_ip_address = $row->ip_address;

$p_del_image_01_url = "";
$p_del_image_02_url = "";
$p_del_image_03_url = "";
$p_del_image_04_url = "";
$p_del_image_05_url = "";
$p_del_image_06_url = "";

$blank_img = "";
if ($p_image_01_url != "") {
    $v_image_01_url = $define_val->IMG_PROTECT . "?c=community&cc=market&d=img1&s=" . $p_community_marketplace_listings_id;
    $v_image_01_url = "<img src=\"$v_image_01_url\" alt=\"\"  style='max-width:200px;' />";
    $p_del_image_01_url = GET_DEL_UPLOAD_IMAGE('image_01_url');
} else {
    $v_image_01_url = $blank_img;
}
if ($p_image_02_url != "") {
    $v_image_02_url = $define_val->IMG_PROTECT . "?c=community&cc=market&d=img2&s=" . $p_community_marketplace_listings_id;
    $v_image_02_url = "<img src=\"$v_image_02_url\" alt=\"\" style='max-width:200px;' />";
    $p_del_image_02_url = GET_DEL_UPLOAD_IMAGE('image_02_url');
} else {
    $v_image_02_url = $blank_img;
}
if ($p_image_03_url != "") {
    $v_image_03_url = $define_val->IMG_PROTECT . "?c=community&cc=market&d=img3&s=" . $p_community_marketplace_listings_id;
    $v_image_03_url = "<img src=\"$v_image_03_url\" alt=\"\" style='max-width:200px;'  />";
    $p_del_image_03_url = GET_DEL_UPLOAD_IMAGE('image_03_url');
} else {
    $v_image_03_url = $blank_img;
}
if ($p_image_04_url != "") {
    $v_image_04_url = $define_val->IMG_PROTECT . "?c=community&cc=market&d=img4&s=" . $p_community_marketplace_listings_id;
    $v_image_04_url = "<img src=\"$v_image_04_url\" alt=\"\" style='max-width:200px;'  />";
    $p_del_image_04_url = GET_DEL_UPLOAD_IMAGE('image_04_url');
} else {
    $v_image_04_url = $blank_img;
}
if ($p_image_05_url != "") {
    $v_image_05_url = $define_val->IMG_PROTECT . "?c=community&cc=market&d=img5&s=" . $p_community_marketplace_listings_id;
    $v_image_05_url = "<img src=\"$v_image_05_url\" alt=\"\" style='max-width:200px;'  />";
    $p_del_image_05_url = GET_DEL_UPLOAD_IMAGE('image_05_url');
} else {
    $v_image_05_url = $blank_img;
}
if ($p_image_06_url != "") {
    $v_image_06_url = $define_val->IMG_PROTECT . "?c=community&cc=market&d=img6&s=" . $p_community_marketplace_listings_id;
    $v_image_06_url = "<img src=\"$v_image_06_url\" alt=\"\"  style='max-width:200px;' />";
    $p_del_image_06_url = GET_DEL_UPLOAD_IMAGE('image_06_url');
} else {
    $v_image_06_url = $blank_img;
}

$main = 4;
$sub = 3;
$mtitle = "커뮤니티";
$stitle = "사고팔고 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "market_update.tpl");

$tpl->setVar("T_ID", $p_community_marketplace_listings_id);

$tpl->setVar("H_IMAGE_01_URL", $p_image_01_url);
$tpl->setVar("H_IMAGE_02_URL", $p_image_02_url);
$tpl->setVar("H_IMAGE_03_URL", $p_image_03_url);
$tpl->setVar("H_IMAGE_04_URL", $p_image_04_url);
$tpl->setVar("H_IMAGE_05_URL", $p_image_05_url);
$tpl->setVar("H_IMAGE_06_URL", $p_image_06_url);

$tpl->setVar("T_DEL_IMAGE_01_URL", $p_del_image_01_url);
$tpl->setVar("T_DEL_IMAGE_02_URL", $p_del_image_02_url);
$tpl->setVar("T_DEL_IMAGE_03_URL", $p_del_image_03_url);
$tpl->setVar("T_DEL_IMAGE_04_URL", $p_del_image_04_url);
$tpl->setVar("T_DEL_IMAGE_05_URL", $p_del_image_05_url);
$tpl->setVar("T_DEL_IMAGE_06_URL", $p_del_image_06_url);

$tpl->setVar("T_IMAGE_01_URL", $v_image_01_url);
$tpl->setVar("T_IMAGE_02_URL", $v_image_02_url);
$tpl->setVar("T_IMAGE_03_URL", $v_image_03_url);
$tpl->setVar("T_IMAGE_04_URL", $v_image_04_url);
$tpl->setVar("T_IMAGE_05_URL", $v_image_05_url);
$tpl->setVar("T_IMAGE_06_URL", $v_image_06_url);

$tpl->setVar("SELECT_LISTING_TYPE", ARRAY_ARRAY_RETURN($define_val->DEFINE_market_listing_type, 1, $p_listing_type));

$marketplace_type_define = $define_val->DEFINE_blank;
if (isset($define_val->DEFINE_market_marketplace_type[$p_listing_type])) {
    $marketplace_type_define = $define_val->DEFINE_market_marketplace_type[$p_listing_type];
}
$tpl->setVar("SELECT_MARKETPLACE_TYPE", ARRAY_ARRAY_RETURN($marketplace_type_define, 1, $p_marketplace_type));

$tpl->setVar("T_TITLE", $p_title);
$tpl->setVar("SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc"));
$tpl->setVar("SELECT_CITY_NAME", DB_ARRAY_ARRAY_RETURN(1, $p_city_name, $db, "common_code", "code_sub_name", "code_sub", "code = '{$p_state_code}' order by sort asc"));
$tpl->setVar("T_MARKETPLACE_PRICE", $p_marketplace_price);
$tpl->setVar("T_CONTACT_PHONE", $p_contact_phone);
$tpl->setVar("T_DESCRIPTION", $p_description);
$tpl->setVar("T_VIEW_COUNT", $p_view_count);
$tpl->setVar("T_INTERNAL_NOTES", $p_internal_notes);
$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_active));
$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_IP_ADDRESS", $p_ip_address);

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

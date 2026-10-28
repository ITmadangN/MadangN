<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "marketsale_flyer_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$towninfo_marketsale_flyer_id = $_GET["towninfo_marketsale_flyer_id"] ?? "";

$sql = "SELECT * FROM towninfo_marketsale_flyer WHERE towninfo_marketsale_flyer_id = :towninfo_marketsale_flyer_id";
$placeholders = ['towninfo_marketsale_flyer_id' => $towninfo_marketsale_flyer_id];

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

$p_towninfo_marketsale_flyer_id = $row->towninfo_marketsale_flyer_id;
$p_towninfo_marketsale_market_id = $row->towninfo_marketsale_market_id;
$p_state_code = $row->state_code;
$p_title = $row->title;
$p_description = $row->description;
$p_logo_url = $row->logo_url;
$p_main_image_url = $row->main_image_url;
$p_sale_start_date = $row->sale_start_date;
$p_sale_end_date = $row->sale_end_date;
$p_weekly_ads_flyer_site = $row->weekly_ads_flyer_site;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_created_at = $row->created_at;
$p_updated_user = $row->updated_user;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;

$market_name = GET_MARKET_NAME($db,$p_towninfo_marketsale_market_id);

$blank_img = "";

$p_del_logo_url = "";
if ($p_logo_url != "") {
    $v_logo_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=marketsale_flyer&d=logo&s=" . $p_towninfo_marketsale_flyer_id;
    $v_logo_url = "<img src=\"$v_logo_url\" alt=\"\"  />";
    $p_del_logo_url = GET_DEL_UPLOAD_IMAGE('logo_url');
} else {
    $v_logo_url = $blank_img;
}

$p_del_main_image_url = "";
if ($p_main_image_url != "") {
    $v_main_image_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=marketsale_flyer&d=main&s=" . $p_towninfo_marketsale_flyer_id;
    $v_main_image_url = "<img src=\"$v_main_image_url\" alt=\"\"  />";
    $p_del_main_image_url = GET_DEL_UPLOAD_IMAGE('main_image_url');
} else {
    $v_main_image_url = $blank_img;
}


$main = 5;
$sub = 6;
$mtitle = "타운정보";
$stitle = "마켓세일 정보 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "marketsale_flyer_update.tpl");

$tpl->setVar("T_ID", $p_towninfo_marketsale_flyer_id);
$tpl->setVar("H_LOGO_URL", $p_logo_url);
$tpl->setVar("H_MAIN_IMAGE_URL", $p_main_image_url);

$tpl->setVar("T_LOGO_URL", $v_logo_url);
$tpl->setVar("T_MAIN_IMAGE_URL", $v_main_image_url);

$tpl->setVar("T_DEL_LOGO_URL", $p_del_logo_url);
$tpl->setVar("T_DEL_IMAGE_01_URL", $p_del_main_image_url);


$tpl->setVar("T_MARKET_NAME", $p_market_name);
$tpl->setVar("T_TITLE", $p_title);
$tpl->setVar("T_DESCRIPTION", $p_description);
$tpl->setVar("T_SALE_START_DATE", $p_sale_start_date);
$tpl->setVar("T_SALE_END_DATE", $p_sale_end_date);
$tpl->setVar("T_WEEKLY_ADS_FLYER_SITE", $p_weekly_ads_flyer_site);
$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_active));
$tpl->setVar("SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc"));
$tpl->setVar("SELECT_MARKET", DB_ARRAY_MARKET_RETURN(1, $p_towninfo_marketsale_market_id, $db));
$tpl->setVar("SELECT_WEEKLY_ADS_FLYER_SITE", GET_MARKETSALE_REGION(1, $market_name, $p_state_code, $p_weekly_ads_flyer_site, $db,""));

$tpl->setVar("G_NUM", 1);

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

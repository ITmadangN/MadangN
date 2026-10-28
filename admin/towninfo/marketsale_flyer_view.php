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

$sql = "SELECT A.*, B.market_name FROM towninfo_marketsale_flyer A left join towninfo_marketsale_market B on A.towninfo_marketsale_market_id = B.towninfo_marketsale_market_id WHERE A.towninfo_marketsale_flyer_id = :towninfo_marketsale_flyer_id limit 0,1";
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
$p_market_name = $row->market_name;
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

$blank_img = "";

if ($p_logo_url != "") {
    $v_logo_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=marketsale_flyer&d=logo&s=" . $p_towninfo_marketsale_flyer_id;
    $v_logo_url = "<img src=\"$v_logo_url\" alt=\"\"  />";
} else {
    $v_logo_url = $blank_img;
}

if ($p_main_image_url != "") {
    $v_main_image_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=marketsale_flyer&d=main&s=" . $p_towninfo_marketsale_flyer_id;
    $v_main_image_url = "<img src=\"$v_main_image_url\" alt=\"\"  />";
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
$tpl->setFile("main", "marketsale_flyer_view.tpl");

$tpl->setVar("T_ID", $p_towninfo_marketsale_flyer_id);
$tpl->setVar("T_LOGO_URL", $v_logo_url);
$tpl->setVar("T_STATE_CODE", $p_state_code);
$tpl->setVar("T_MAIN_IMAGE_URL", $v_main_image_url);
$tpl->setVar("T_MARKET_NAME", $p_market_name);
$tpl->setVar("T_TITLE", $p_title);
$tpl->setVar("T_DESCRIPTION", @str_replace("\n", "<br>", $p_description));
$tpl->setVar("T_SALE_START_DATE", $p_sale_start_date);
$tpl->setVar("T_SALE_END_DATE", $p_sale_end_date);
$tpl->setVar("T_WEEKLY_ADS_FLYER_SITE", $p_weekly_ads_flyer_site);
$tpl->setVar("T_IS_ACTIVE", ARRAY_RETURN($define_val->DEFINE_is_active, $p_is_active));
$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_UPDATED_USER", $p_updated_user);
$tpl->setVar("T_UPDATED_AT", $p_updated_at);
$tpl->setVar("T_IP_ADDRESS", $p_ip_address);
$tpl->setVar("G_NUM", 1);

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

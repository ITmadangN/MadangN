<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "marketsale_user_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$towninfo_marketsale_user_id = $_GET["towninfo_marketsale_user_id"] ?? "";

$sql = "SELECT * FROM towninfo_marketsale_users WHERE towninfo_marketsale_user_id = :towninfo_marketsale_user_id";
$placeholders = ['towninfo_marketsale_user_id' => $towninfo_marketsale_user_id];

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

$p_towninfo_marketsale_market_id = $row->towninfo_marketsale_market_id;
$p_user_id = $row->user_id;
$p_weekly_ads_flyer_site = $row->weekly_ads_flyer_site;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_created_at = $row->created_at;
$p_updated_user = $row->updated_user;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;

$blank_img = "";

if ($p_towninfo_marketsale_market_id != "") {
    $v_logo_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=marketsale_market&d=logo&s=" . $p_towninfo_marketsale_market_id;
    $v_logo_url = "<img src=\"$v_logo_url\" alt=\"\"  />";
} else {
    $v_logo_url = $blank_img;
}



$main = 5;
$sub = 7;
$mtitle = "타운정보";
$stitle = "마켓세일 사용자 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "marketsale_market_users_update.tpl");

$tpl->setVar("T_ID", $towninfo_marketsale_user_id);
$tpl->setVar("T_LOGO_URL", $v_logo_url);


$tpl->setVar("T_USER_ID", $p_user_id);
$tpl->setVar("T_WEEKLY_ADS_FLYER_SITE", $p_weekly_ads_flyer_site);

$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_active));
$tpl->setVar("SELECT_MARKET", DB_ARRAY_MARKET_RETURN(1, $p_towninfo_marketsale_market_id, $db));

$tpl->setVar("G_NUM", 1);    

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

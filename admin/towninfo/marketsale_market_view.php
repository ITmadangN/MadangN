<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "marketsale_market_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$towninfo_marketsale_market_id = $_GET["towninfo_marketsale_market_id"] ?? "";

$sql = "SELECT * FROM towninfo_marketsale_market WHERE towninfo_marketsale_market_id = :towninfo_marketsale_market_id";
$placeholders = ['towninfo_marketsale_market_id' => $towninfo_marketsale_market_id];

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
$p_market_name = $row->market_name;
$p_market_logo_url = $row->market_logo_url;
$p_contact_name = $row->contact_name;
$p_contact_email = $row->contact_email;
$p_contact_phone = $row->contact_phone;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_created_at = $row->created_at;
$p_updated_user = $row->updated_user;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;

$blank_img = "";

if ($p_logo_url != "") {
    $v_logo_url = $define_val->IMG_PROTECT . "?c=towninfo&cc=marketsale_market&d=logo&s=" . $p_towninfo_marketsale_market_id;
    $v_logo_url = "<img src=\"$v_logo_url\" alt=\"\"  />";
} else {
    $v_logo_url = $blank_img;
}



$main = 5;
$sub = 1;
$mtitle = "타운정보";
$stitle = "마켓세일 마켓 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "marketsale_market_view.tpl");

$tpl->setVar("T_ID", $p_towninfo_marketsale_market_id);
$tpl->setVar("T_LOGO_URL", $v_logo_url);

$tpl->setVar("T_MARKET_NAME", $p_market_name);

$tpl->setVar("T_CONTACT_NAME", $p_contact_name);
$tpl->setVar("T_CONTACT_EMAIL", $p_contact_email);
$tpl->setVar("T_CONTACT_PHONE", $p_contact_phone);

$tpl->setVar("T_IS_ACTIVE", ARRAY_RETURN($define_val->DEFINE_is_active, $p_is_active));
$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_UPDATED_USER", $p_updated_user);
$tpl->setVar("T_UPDATED_AT", $p_updated_at);
$tpl->setVar("T_IP_ADDRESS", $p_ip_address);
$tpl->setVar("G_NUM", 1);

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

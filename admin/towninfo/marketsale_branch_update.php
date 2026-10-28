<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

use BearTemplate\BearTemplate;


session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "marketsale_branch_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$towninfo_marketsale_branch_id = $_GET["towninfo_marketsale_branch_id"] ?? "";

$sql = "SELECT * FROM towninfo_marketsale_branch WHERE towninfo_marketsale_branch_id = :towninfo_marketsale_branch_id";
$placeholders = ['towninfo_marketsale_branch_id' => $towninfo_marketsale_branch_id];

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

$p_towninfo_marketsale_branch_id = $row->towninfo_marketsale_branch_id;
$p_towninfo_marketsale_market_id = $row->towninfo_marketsale_market_id;
$p_towninfo_marketsale_flyer_id  = $row->towninfo_marketsale_flyer_id;
$p_branch_name = $row->branch_name;
$p_state_code = $row->state_code;
$p_state_name = $row->state_name;
$p_region = $row->region;
$p_city_name = $row->city_name;
$p_county_name = $row->county_name;
$p_contact_name = $row->contact_name;
$p_contact_email = $row->contact_email;
$p_contact_phone = $row->contact_phone;
$p_sale_start_day = $row->sale_start_day;
$p_weekly_ads_flyer_site = $row->weekly_ads_flyer_site;
$p_branch_display_method = $row->branch_display_method;
$p_is_default = $row->is_default;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_created_at = $row->created_at;
$p_updated_user = $row->updated_user;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;

$main = 5;
$sub = 1;
$mtitle = "타운정보";
$stitle = "마켓세일 지점 등록";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "marketsale_branch_write.tpl");

$towninfo_marketsale_branch_id = $_GET["towninfo_marketsale_branch_id"] ?? "";

$sql = "SELECT * FROM towninfo_marketsale_branch WHERE towninfo_marketsale_branch_id = :towninfo_marketsale_branch_id";
$placeholders = ['towninfo_marketsale_branch_id' => $towninfo_marketsale_branch_id];

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

$p_towninfo_marketsale_branch_id = $row->towninfo_marketsale_branch_id;
$p_towninfo_marketsale_market_id = $row->towninfo_marketsale_market_id;
$p_towninfo_marketsale_flyer_id  = $row->towninfo_marketsale_flyer_id;
$p_branch_name = $row->branch_name;
$p_state_code = $row->state_code;
$p_state_name = $row->state_name;
$p_region = $row->region;
$p_city_name = $row->city_name;
$p_county_name = $row->county_name;
$p_contact_name = $row->contact_name;
$p_contact_email = $row->contact_email;
$p_contact_phone = $row->contact_phone;
$p_sale_start_day = $row->sale_start_day;
$p_weekly_ads_flyer_site = $row->weekly_ads_flyer_site;
$p_branch_display_method = $row->branch_display_method;
$p_is_default = $row->is_default;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_created_at = $row->created_at;
$p_updated_user = $row->updated_user;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;

// 마켓명 조회
$v_market_name = "";
if ($p_towninfo_marketsale_market_id != "") {
    $sql_market = "SELECT market_name FROM towninfo_marketsale_market WHERE towninfo_marketsale_market_id = :towninfo_marketsale_market_id";
    $placeholders_market = ['towninfo_marketsale_market_id' => $p_towninfo_marketsale_market_id];
    $result_market = $db->query($sql_market, $placeholders_market);
    if ($result_market) {
        $row_market = $db->fetch();
        if ($row_market) {
            $v_market_name = $row_market->market_name;
        }
    }
}

// 전단지명 조회
$v_flyer_name = "";
if ($p_towninfo_marketsale_flyer_id != "") {
    $sql_flyer = "SELECT * FROM towninfo_marketsale_flyer WHERE towninfo_marketsale_flyer_id = :towninfo_marketsale_flyer_id";
    $placeholders_flyer = ['towninfo_marketsale_flyer_id' => $p_towninfo_marketsale_flyer_id];
    $result_flyer = $db->query($sql_flyer, $placeholders_flyer);
    if ($result_flyer) {
        $row_flyer = $db->fetch();
        if ($row_flyer) {
            $v_flyer_name = $row_flyer->flyer_name ?? $p_towninfo_marketsale_flyer_id;
        }
    }
}

$main = 5;
$sub = 5;
$mtitle = "타운정보";
$stitle = "마켓세일 지점 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "marketsale_branch_update.tpl");

$tpl->setVar("T_ID", $p_towninfo_marketsale_branch_id);

$tpl->setVar("T_BRANCH_NAME", $p_branch_name);
$tpl->setVar("T_MARKET_NAME", $v_market_name);
$tpl->setVar("T_FLYER_NAME", $v_flyer_name);
$tpl->setVar("T_FLYER_ID", $p_towninfo_marketsale_flyer_id);

$tpl->setVar("T_STATE_CODE", $p_state_code);
$tpl->setVar("T_STATE_NAME", $p_state_name);
$tpl->setVar("T_REGION", $p_region);
$tpl->setVar("T_CITY_NAME", $p_city_name);
$tpl->setVar("T_COUNTY_NAME", $p_county_name);
$tpl->setVar("T_BRANCH_DISPLAY_METHOD", ARRAY_RETURN($define_val->DEFINE_branch_display_method, $p_branch_display_method));

$tpl->setVar("T_CONTACT_NAME", $p_contact_name);
$tpl->setVar("T_CONTACT_EMAIL", $p_contact_email);
$tpl->setVar("T_CONTACT_PHONE", $p_contact_phone);

$tpl->setVar("T_SALE_START_DAY", $p_sale_start_day);
$tpl->setVar("T_WEEKLY_ADS_FLYER_SITE", $p_weekly_ads_flyer_site);

if($p_is_default == '')   $p_is_default = 0;


$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_UPDATED_USER", $p_updated_user);
$tpl->setVar("T_UPDATED_AT", $p_updated_at);
$tpl->setVar("T_IP_ADDRESS", $p_ip_address);
$tpl->setVar("G_NUM", 1);

$tpl->setVar("SELECT_IS_DEFAULT", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_default, 1, $p_is_default));
$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_active));
$tpl->setVar("SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(-1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc","주 선택"));
$tpl->setVar("SELECT_MARKET", DB_ARRAY_MARKET_RETURN(1, $p_towninfo_marketsale_market_id, $db));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

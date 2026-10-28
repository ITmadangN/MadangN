<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "ad_company_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$ad_company_id = $_GET["ad_company_id"] ?? "";

$sql = "SELECT * FROM ad_company WHERE ad_company_id = :ad_company_id";
$placeholders = ['ad_company_id' => $ad_company_id];

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

$p_ad_company_id = $row->ad_company_id;
$p_used_type = $row->used_type;
$p_company_name = $row->company_name;
$p_company_website = $row->company_website;
$p_company_address = $row->company_address;
$p_company_state_code = $row->company_state_code;
$p_has_15_plus_employees = $row->has_15_plus_employees;
$p_contact_name = $row->contact_name;
$p_contact_email = $row->contact_email;
$p_contact_phone = $row->contact_phone;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_updated_user = $row->updated_user;
$p_created_at = $row->created_at;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;


$main = 4;
$sub = 1;
$mtitle = "커뮤니티";
$stitle = "광고회사 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "ad_company_update.tpl");

$tpl->setVar("T_ID", $p_ad_company_id);

$tpl->setVar("SELECT_USED_TYPE", ARRAY_ARRAY_RETURN($define_val->DEFINE_ad_company_used_type, 1, $p_used_type));
$tpl->setVar("T_COMPANY_NAME", $p_company_name);
$tpl->setVar("T_COMPANY_WEBSITE", $p_company_website);
$tpl->setVar("T_COMPANY_ADDRESS", $p_company_address);
$tpl->setVar("T_CONTACT_NAME", $p_contact_name);
$tpl->setVar("T_CONTACT_EMAIL", $p_contact_email);
$tpl->setVar("T_CONTACT_PHONE", $p_contact_phone);
$tpl->setVar("SELECT_COMPANY_STATE_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_company_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by sort asc"));
$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_active));
$tpl->setVar("SELECT_HAS_15_PLUS_EMPLOYEES", ARRAY_ARRAY_RETURN($define_val->DEFINE_yn, 1, $p_has_15_plus_employees));
$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_IP_ADDRESS", $p_ip_address);
$tpl->setVar("G_NUM", 1);

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

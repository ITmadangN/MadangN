<?php

// error_reporting(E_ALL);
// ini_set('display_errors', '1');

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "user_manage";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$user_id = $_GET["user_id"] ?? "";

$sql = "SELECT * FROM users WHERE user_id = :user_id";
$placeholders = ['user_id' => $user_id];

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

$p_user_id = $row->user_id;
$p_user_password = $row->user_password;
$p_user_nickname = $row->user_nickname;
$p_user_name = $row->user_name;
$p_user_email = $row->user_email;
$p_user_phone = $row->user_phone;
$p_is_letter_receive = $row->is_letter_receive;
$p_user_type = $row->user_type;
$p_permission_group_id = $row->permission_group_id;
$p_state_code = $row->state_code;
$p_country_code = $row->country_code;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_created_at = $row->created_at;
$p_updated_user = $row->updated_user;
$p_updated_at = $row->updated_at;
$p_last_login_date = $row->last_login_date;
$p_last_login_ip_address = $row->last_login_ip_address;

$p_user_password = DECRYPT_DATA($p_user_password, $define_val->CRYPT_METHOD, $define_val->CRYPT_KEY);

$main = 1;
$sub = 1;
$mtitle = "회원관리";
$stitle = "사용자 보기";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "user_view.tpl");

$tpl->setVar("T_USER_ID", $p_user_id);
$tpl->setVar("T_USER_NICKNAME", $p_user_nickname);
$tpl->setVar("T_USER_NAME", $p_user_name);
$tpl->setVar("T_USER_EMAIL", $p_user_email);
$tpl->setVar("T_USER_PHONE", $p_user_phone);
$tpl->setVar("T_USER_PASSWORD", $p_user_password);
$tpl->setVar("SELECT_IS_LETTER_RECEIVE", ARRAY_RETURN($define_val->DEFINE_user_is_letter_receive, $p_is_letter_receive));
//$tpl->setVar("T_USER_TYPE", ARRAY_RETURN($define_val->DEFINE_user_type, $p_user_type));
//$tpl->setVar("T_PERMISSION_GROUP_ID", ARRAY_RETURN($define_val->DEFINE_user_permission_group_id, $p_permission_group_id));
$tpl->setVar("T_PERMISSION_GROUP_ID", @DB_ARRAY_RETURN($db, "permission_group", "permission_group_name", "permission_group_id = '{$p_permission_group_id}'"));
$tpl->setVar("T_STATE_CODE", @DB_ARRAY_RETURN($db, "common_code", "code_sub_name", "code_sub = '{$p_state_code}'"));
$tpl->setVar("T_COUNTRY_CODE", @DB_ARRAY_RETURN($db, "common_code", "code_sub_name", "code_sub = '{$p_country_code}'"));
$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_RETURN($define_val->DEFINE_is_active, $p_is_active));
$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_UPDATED_USER", $p_updated_user);
$tpl->setVar("T_UPDATED_AT", $p_updated_at);
$tpl->setVar("T_LAST_LOGIN_DATE", $p_last_login_date);
$tpl->setVar("T_LAST_LOGIN_IP_ADDRESS", $p_last_login_ip_address);

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

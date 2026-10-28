<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/include/session.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$sql = "SELECT A.* FROM users A where A.user_id = :id";

$placeholders = ['id' => $SS_ID];

$result = $db->query($sql, $placeholders);
if (!$result) {
    echo "데이터가 없습니다.";
    exit;
}

$row = $db->fetch();

$p_user_nickname = $row->user_nickname;
$p_user_password = $row->user_password;
$p_user_name = $row->user_name;
$p_user_email = $row->user_email;
$p_user_phone = $row->user_phone;
$p_is_letter_receive = $row->is_letter_receive;
$p_state_code = $row->state_code;
$p_country_code = $row->country_code;;
$p_is_active = $row->is_active;
$p_created_user = $row->created_user;
$p_updated_user = $row->updated_user;
$p_created_at = $row->created_at;
$p_updated_at = $row->updated_at;
$p_last_login_ip_address = $row->last_login_ip_address;

$p_is_letter_receive_check = "";
if($p_is_letter_receive == "1") $p_is_letter_receive_check = "checked";

$p_user_password = DECRYPT_DATA($p_user_password, $define_val->CRYPT_METHOD, $define_val->CRYPT_KEY);

$page="index";
$main="0";
$sub="1";
$mtitle="멤버";
$stitle="회원정보 수정";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "register_info.tpl");

$tpl->setVar("T_USER_ID", $SS_ID);
$tpl->setVar("T_USER_NICKNAME", $p_user_nickname);
$tpl->setVar("T_PASSWORD", $p_user_password);
$tpl->setVar("T_USER_NAME", $p_user_name);
$tpl->setVar("T_USER_EMAIL", $p_user_email);
$tpl->setVar("T_USER_PHONE", $p_user_phone);
$tpl->setVar("T_IS_LETTER_RECEIVE", $p_is_letter_receive_check);

$tpl->setVar("S_SELECT_COUNTRY_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_country_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'country' order by sort asc"));
if($p_country_code == "USA") $tpl->setVar("S_SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by code_sub_name asc"));
else $tpl->setVar("S_SELECT_STATE_CODE", "<option value=''>없음</option>");

include("$DOCUMENT_ROOT/include/common.php");

$tpl->tprint("main");

<?php

use BearTemplate\BearTemplate;

//error_reporting(E_ALL);
//ini_set('display_errors', '1');


session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "agent_ad_payment";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$ad_payments_id = $_GET["ad_payments_id"] ?? "";

$sql = "SELECT A.*,  
            C.desired_start_date, C.desired_end_date, C.start_date, C.end_date, C.validity_period, C.is_paid, C.payment_date, C.payment_amount, C.payment_method,
            C.created_user, C.updated_user, C.created_at, C.updated_at, C.ip_address,
            D.logo_image_url, D.office_name, D.office_key, D.office_mls_id, D.office_phone, D.office_email, D.office_address1, D.office_address2, D.office_city, D.office_state, D.office_zip
        FROM realestate_agents A        
        LEFT JOIN ad_payments C ON A.realestate_agent_id = C.listing_id        
        LEFT JOIN realestate_office D on D.office_key = A.office_key
        where C.ad_payments_id = :ad_payments_id
        AND C.section_type = 5
        order by A.realestate_agent_id desc
        ";

$placeholders = ['ad_payments_id' => $ad_payments_id];

$result = $db->query($sql, $placeholders);
if (!$result) {
    echo "데이터가 없습니다.";
    exit;
}

$p_advertising_level_array = array();
$p_job_type_array = array();
$g_num = 0;
$row = $db->fetch();

$p_user_id = $row->user_id;
$p_realestate_agent_id = $row->realestate_agent_id;

$p_desired_start_date = $row->desired_start_date;
$p_desired_end_date = $row->desired_end_date;
$p_start_date = $row->start_date;
$p_end_date = $row->end_date;
$p_validity_period = $row->validity_period;
$p_is_paid = $row->is_paid;
$p_payment_date = $row->payment_date;
$p_payment_amount = $row->payment_amount;
$p_payment_method = $row->payment_method;

$p_main_image_url = $row->main_image_url;
$p_agent_dre_license = $row->agent_dre_license;
$p_agent_key = $row->agent_key;
$p_specialized_field = $row->specialized_field;
$p_agent_full_name = $row->agent_full_name;
$p_agent_email = $row->agent_email;
$p_agent_phone = $row->agent_phone;
$p_has_active_advertisement = $row->has_active_advertisement;
$p_self_introduction = $row->self_introduction;

$p_logo_image_url = $row->logo_image_url;
$p_office_key = $row->office_key;
$p_office_name = $row->office_name;
$p_office_mls_id = $row->office_mls_id;
$p_office_phone = $row->office_phone;
$p_office_email = $row->office_email;
$p_office_address1 = $row->office_address1;
$p_office_address2 = $row->office_address2;
$p_office_city = $row->office_city;
$p_office_state = $row->office_state;
$p_office_zip = $row->office_zip;

$p_content = $row->content;
$p_view_count = $row->view_count;
$p_is_active = $row->is_active;
$p_is_approved = $row->is_approved;
$p_created_user = $row->created_user;
$p_updated_user = $row->updated_user;
$p_created_at = $row->created_at;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;

$blank_img = "";


if ($p_main_image_url != "") {
    $v_main_image_url = $define_val->IMG_PROTECT . "?c=realestate&cc=agent&d=main&s=" . $p_realestate_agent_id;
    $v_main_image_url = "<img src=\"$v_main_image_url\" alt=\"\" />";
} else {
    $v_main_image_url = $blank_img;
}

if ($p_logo_image_url != "") {
    $v_logo_image_url = $define_val->IMG_PROTECT . "?c=realestate&cc=office&d=logo&s=" . $p_office_key;
    $v_logo_image_url = "<img src=\"$v_logo_image_url\" alt=\"\" />";
} else {
    $v_logo_image_url = $blank_img;
}

$main=6;
$sub=3;
$mtitle = "커뮤니티";
$stitle = "비지니스 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "agent_pay_view.tpl");

$tpl->setVar("T_USER_ID", $p_user_id);
$tpl->setVar("T_ID", $ad_payments_id);
$tpl->setVar("T_AID", $p_realestate_agent_id);


$tpl->setVar("T_OFFICE_KEY", $p_office_key);
$tpl->setVar("T_OFFICE_NAME", $p_office_name);
$tpl->setVar("T_OFFICE_MLS_ID", $p_office_mls_id);
$tpl->setVar("T_OFFICE_PHONE", $p_office_phone);
$tpl->setVar("T_OFFICE_EMAIL", $p_office_email);
$tpl->setVar("T_OFFICE_ADDRESS1", $p_office_address1);
$tpl->setVar("T_OFFICE_ADDRESS2", $p_office_address2);
$tpl->setVar("T_OFFICE_CITY", $p_office_city);
$tpl->setVar("T_OFFICE_STATE", $p_office_state);
$tpl->setVar("T_OFFICE_ZIP", $p_office_zip);


$tpl->setVar("T_IS_PAID", $p_is_paid);
$tpl->setVar("T_PAYMENT_DATE", $p_payment_date);
$tpl->setVar("T_PAYMENT_AMOUNT", $p_payment_amount);
$tpl->setVar("T_PAYMENT_METHOD", $p_payment_method);

$tpl->setVar("T_VALIDITY_PERIOD", $p_validity_period);
$tpl->setVar("T_DESIRED_START_DATE", $p_desired_start_date);
$tpl->setVar("T_DESIRED_END_DATE", $p_desired_end_date);
$tpl->setVar("T_START_DATE", $p_start_date);
$tpl->setVar("T_END_DATE", $p_end_date);

$tpl->setVar("T_MAIN_IMAGE_URL", $v_main_image_url);
$tpl->setVar("T_LOGO_IMAGE_URL", $v_logo_image_url);

$tpl->setVar("T_AGENT_KEY", $p_agent_key);
$tpl->setVar("T_SPECIALIZED_FIELD", ARRAY_RETURN($define_val->DEFINE_specialized_field, $p_specialized_field));
$tpl->setVar("T_HAS_ACTIVE_ADVERTISEMENT", ARRAY_RETURN($define_val->DEFINE_user_is_letter_receive, $p_has_active_advertisement));
$tpl->setVar("T_AGENT_FULL_NAME", $p_agent_full_name);
$tpl->setVar("T_AGENT_DRE_LICENSE", $p_agent_dre_license);
$tpl->setVar("T_AGENT_EMAIL", $p_agent_email);
$tpl->setVar("T_AGENT_PHONE", $p_agent_phone);

$tpl->setVar("T_SELF_INTRODUCTION", @str_replace("\n", "<br>", $p_self_introduction));

$tpl->setVar("T_VIEW_COUNT", $p_view_count);
$tpl->setVar("T_ADVERTISER_NOTES", @str_replace("\n", "<br>", $p_advertiser_notes));
$tpl->setVar("T_INTERNAL_NOTES", @str_replace("\n", "<br>", $p_internal_notes));
$tpl->setVar("T_IS_ACTIVE", ARRAY_RETURN($define_val->DEFINE_is_active, $p_is_active));
$tpl->setVar("T_IS_APPROVED", ARRAY_RETURN($define_val->DEFINE_is_active, $p_is_approved));

$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_UPDATED_USER", $p_updated_user);
$tpl->setVar("T_UPDATED_AT", $p_updated_at);
$tpl->setVar("T_IP_ADDRESS", $p_ip_address);

$tpl->setVar("T_STATE_CODE", @DB_ARRAY_RETURN($db, "common_code", "code_sub_name", "code_sub = '{$p_state_code}'"));
$tpl->setVar("T_CITY_NAME", @DB_ARRAY_RETURN($db, "common_code", "code_sub_name", "code = '{$p_state_code}' and code_sub = '{$p_city_name}'"));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

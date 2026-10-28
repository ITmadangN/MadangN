<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "business_ad_payment";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$ad_payments_id = $_GET["ad_payments_id"] ?? "";

$sql = "SELECT A.*,  
            C.ad_payments_id, C.desired_start_date, C.desired_end_date, C.start_date, C.end_date, C.validity_period, C.is_paid, C.payment_date, C.payment_amount, C.payment_method, 
            D.ad_company_id, D.company_website, D.company_address
        FROM community_business A
        LEFT JOIN ad_payments C ON A.community_business_id = C.listing_id
        LEFT JOIN ad_company D ON A.ad_company_id = D.ad_company_id
        where C.ad_payments_id = :ad_payments_id
        AND C.section_type = 3
        order by A.created_at desc
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

$p_ad_payments_id = $row->ad_payments_id;
$p_ad_company_id = $row->ad_company_id;
$p_community_business_id = $row->community_business_id;
$p_company_name = $row->company_name;
$p_company_website = $row->company_website;
$p_company_address = $row->company_address;

$p_desired_start_date = $row->desired_start_date;
$p_desired_end_date = $row->desired_end_date;
$p_start_date = $row->start_date;
$p_end_date = $row->end_date;
$p_validity_period = $row->validity_period;
$p_is_paid = $row->is_paid;
$p_payment_date = $row->payment_date;
$p_payment_amount = $row->payment_amount;
$p_payment_method = $row->payment_method;

$p_title = $row->title;
$p_business_type = $row->business_type;
$p_main_image_url = $row->main_image_url;
$p_sub_image_01_url = $row->sub_image_01_url;
$p_sub_image_02_url = $row->sub_image_02_url;
$p_sub_image_03_url = $row->sub_image_03_url;
$p_sub_image_04_url = $row->sub_image_04_url;
$p_sub_image_05_url = $row->sub_image_05_url;
$p_contact_name = $row->contact_name;
$p_contact_email = $row->contact_email;
$p_contact_phone = $row->contact_phone;
$p_state_code = $row->state_code;
$p_city_name = $row->city_name;

$p_content = $row->content;
$p_view_count = $row->view_count;
$p_advertiser_notes = $row->advertiser_notes;
$p_internal_notes = $row->internal_notes;
$p_is_active = $row->is_active;
$p_is_approved = $row->is_approved;
$p_is_modify_yn = $row->is_modify_yn;
$p_created_user = $row->created_user;
$p_updated_user = $row->updated_user;
$p_created_at = $row->created_at;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;
$p_has_active_advertisement = $row->has_active_advertisement;

$blank_img = "";
$p_del_main_image_url = "";
$p_del_sub_image_01_url = "";

$blank_img = "";
if ($p_main_image_url != "") {
    $v_main_image_url = $define_val->IMG_PROTECT . "?c=community&cc=business&d=main&s=" . $p_community_business_id."&t=".time();
    $v_main_image_url = "<img src=\"$v_main_image_url\" alt=\"\" width=\"100\" />";
    $p_del_main_image_url = GET_DEL_UPLOAD_IMAGE('main_image_url');
} else {
    $v_main_image_url = $blank_img;
}

$p_del_sub_image_01_url = "";

if ($p_sub_image_01_url != "") {
    $v_sub_image_01_url = $define_val->IMG_PROTECT . "?c=community&cc=business&d=img1&s=" . $p_community_business_id."&t=".time();
    $v_sub_image_01_url = "<img src=\"$v_sub_image_01_url\" alt=\"\" width=\"100\" />";
    $p_del_sub_image_01_url = GET_DEL_UPLOAD_IMAGE('sub_image_01_url');
} else {
    $v_sub_image_01_url = $blank_img;
}

$p_del_sub_image_02_url = "";

if ($p_sub_image_02_url != "") {
    $v_sub_image_02_url = $define_val->IMG_PROTECT . "?c=community&cc=business&d=img2&s=" . $p_community_business_id."&t=".time();
    $v_sub_image_02_url = "<img src=\"$v_sub_image_02_url\" alt=\"\" />";
    $p_del_sub_image_02_url = GET_DEL_UPLOAD_IMAGE('sub_image_02_url');
} else {
    $v_sub_image_02_url = $blank_img;
}

$p_del_sub_image_03_url = "";

if ($p_sub_image_03_url != "") {
    $v_sub_image_03_url = $define_val->IMG_PROTECT . "?c=community&cc=business&d=img3&s=" . $p_community_business_id."&t=".time();
    $v_sub_image_03_url = "<img src=\"$v_sub_image_03_url\" alt=\"\" />";
    $p_del_sub_image_03_url = GET_DEL_UPLOAD_IMAGE('sub_image_03_url');
} else {
    $v_sub_image_03_url = $blank_img;
}

$p_del_sub_image_04_url = "";

if ($p_sub_image_04_url != "") {
    $v_sub_image_04_url = $define_val->IMG_PROTECT . "?c=community&cc=business&d=img4&s=" . $p_community_business_id."&t=".time();
    $v_sub_image_04_url = "<img src=\"$v_sub_image_04_url\" alt=\"\" />";
    $p_del_sub_image_04_url = GET_DEL_UPLOAD_IMAGE('sub_image_04_url');
} else {
    $v_sub_image_04_url = $blank_img;
}

$p_del_sub_image_05_url = "";

if ($p_sub_image_05_url != "") {
    $v_sub_image_05_url = $define_val->IMG_PROTECT . "?c=community&cc=business&d=img5&s=" . $p_community_business_id."&t=".time();
    $v_sub_image_05_url = "<img src=\"$v_sub_image_05_url\" alt=\"\" />";
    $p_del_sub_image_05_url = GET_DEL_UPLOAD_IMAGE('sub_image_05_url');
} else {
    $v_sub_image_05_url = $blank_img;
}

$main = 4;
$sub = 4;
$mtitle = "커뮤니티";
$stitle = "비지니스 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "business_pay_update.tpl");

$tpl->setVar("T_ID", $p_community_business_id);
$tpl->setVar("T_AC_ID", $p_ad_company_id);
$tpl->setVar("T_AP_ID", $p_ad_payments_id);

$tpl->setVar("T_COMPANY_NAME", $p_company_name);
$tpl->setVar("T_COMPANY_WEBSITE", $p_company_website);
$tpl->setVar("T_COMPANY_ADDRESS", $p_company_address);

$tpl->setVar("T_IS_PAID", $p_is_paid);
$tpl->setVar("T_PAYMENT_DATE", $p_payment_date);
$tpl->setVar("T_PAYMENT_AMOUNT", $p_payment_amount);
$tpl->setVar("T_PAYMENT_METHOD", $p_payment_method);

$tpl->setVar("SELECT_VALIDITY_PERIOD", ARRAY_ARRAY_RETURN($define_val->DEFINE_validity_period, 1, $p_validity_period));
$tpl->setVar("T_DESIRED_START_DATE", $p_desired_start_date);
$tpl->setVar("T_DESIRED_END_DATE", $p_desired_end_date);
$tpl->setVar("T_START_DATE", $p_start_date);
$tpl->setVar("T_END_DATE", $p_end_date);

$tpl->setVar("T_DEL_MAIN_IMAGE_URL", $p_del_main_image_url);
$tpl->setVar("H_MAIN_IMAGE_URL", $p_main_image_url);
$tpl->setVar("T_MAIN_IMAGE_URL", $v_main_image_url);

$tpl->setVar("T_DEL_SUB_IMAGE_01_URL", $p_del_sub_image_01_url);
$tpl->setVar("H_SUB_IMAGE_01_URL", $p_sub_image_01_url);
$tpl->setVar("T_SUB_IMAGE_01_URL", $v_sub_image_01_url);

$tpl->setVar("T_DEL_SUB_IMAGE_02_URL", $p_del_sub_image_02_url);
$tpl->setVar("H_SUB_IMAGE_02_URL", $p_sub_image_02_url);
$tpl->setVar("T_SUB_IMAGE_02_URL", $v_sub_image_02_url);

$tpl->setVar("T_DEL_SUB_IMAGE_03_URL", $p_del_sub_image_03_url);
$tpl->setVar("H_SUB_IMAGE_03_URL", $p_sub_image_03_url);
$tpl->setVar("T_SUB_IMAGE_03_URL", $v_sub_image_03_url);

$tpl->setVar("T_DEL_SUB_IMAGE_04_URL", $p_del_sub_image_04_url);
$tpl->setVar("H_SUB_IMAGE_04_URL", $p_sub_image_04_url);
$tpl->setVar("T_SUB_IMAGE_04_URL", $v_sub_image_04_url);

$tpl->setVar("T_DEL_SUB_IMAGE_05_URL", $p_del_sub_image_05_url);
$tpl->setVar("H_SUB_IMAGE_05_URL", $p_sub_image_05_url);
$tpl->setVar("T_SUB_IMAGE_05_URL", $v_sub_image_05_url);

$tpl->setVar("SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by code_sub_name asc"));
$tpl->setVar("SELECT_CITY_NAME", DB_ARRAY_ARRAY_RETURN(1, $p_city_name, $db, "common_code", "code_sub_name", "code_sub", "code = '{$p_state_code}' order by code_sub_name asc"));

$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_active));
$tpl->setVar("SELECT_IS_APPROVED", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_approved));
$tpl->setVar("T_HAS_ACTIVE_ADVERTISEMENT", ARRAY_RETURN($define_val->DEFINE_is_active, $p_has_active_advertisement));
$tpl->setVar("SELECT_IS_PAID", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_paid, 1, $p_is_active));

$tpl->setVar("SELECT_BUSINESS_TYPE", ARRAY_ARRAY_RETURN($define_val->DEFINE_business_type, 1, $p_business_type));
$tpl->setVar("T_TITLE", $p_title);

$tpl->setVar("T_CONTACT_NAME", $p_contact_name);
$tpl->setVar("T_CONTACT_EMAIL", $p_contact_email);
$tpl->setVar("T_CONTACT_PHONE", $p_contact_phone);
$tpl->setVar("T_CONTENT", $p_content);

$tpl->setVar("T_VIEW_COUNT", $p_view_count);
$tpl->setVar("T_ADVERTISER_NOTES", $p_advertiser_notes);
$tpl->setVar("T_INTERNAL_NOTES", $p_internal_notes);


$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_UPDATED_USER", $p_updated_user);
$tpl->setVar("T_UPDATED_AT", $p_updated_at);
$tpl->setVar("T_IP_ADDRESS", $p_ip_address);

$tpl->setVar("SELECT_IS_MODIFY_YN",ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_modify_yn));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

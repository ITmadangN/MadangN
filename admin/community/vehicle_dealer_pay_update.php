<?php

use BearTemplate\BearTemplate;

session_start();

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$permission_menu = "autodealer_ad_payment";
include("$DOCUMENT_ROOT/admin/include/permission.php");

include("$DOCUMENT_ROOT/admin/include/session.php");
include("$DOCUMENT_ROOT/admin/include/auth.php");
include("$DOCUMENT_ROOT/include/class.BearTemplate.php");
include("$DOCUMENT_ROOT/include/define.php");
include("$DOCUMENT_ROOT/include/func.php");
include("$DOCUMENT_ROOT/admin/include/db.php");

$ad_payments_id = $_GET["ad_payments_id"] ?? "";

$sql = "SELECT A.*,  
           C.ad_payments_id, C.desired_start_date, C.desired_end_date, C.start_date, C.end_date, C.validity_period, C.is_paid, C.payment_date, C.payment_amount, C.payment_method
        FROM community_car_dealers A        
        LEFT JOIN ad_payments C ON A.community_car_dealers_id = C.listing_id        
        where C.ad_payments_id = :ad_payments_id
        AND C.section_type = 4
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

// 딜러 community_car_dealers
$p_community_car_dealers_id = $row->community_car_dealers_id;
$p_company_name = $row->company_name;
$p_company_website = $row->company_website;
$p_dealer_website = $row->dealer_website;
$p_contact_name = $row->contact_name;
$p_contact_email = $row->contact_email;
$p_contact_phone = $row->contact_phone;
$p_listing_address1 = $row->listing_address1;
$p_state_code = $row->state_code;
$p_city_name = $row->city_name;
$p_logo_url = $row->logo_url;
$p_main_image_url = $row->main_image_url;
$p_dealer_introduction = $row->dealer_introduction;
$p_view_count = $row->view_count;
$p_is_active = $row->is_active;
$p_is_approved = $row->is_approved;
$p_is_modify_yn = $row->is_modify_yn;
$p_created_user = $row->created_user;
$p_updated_user = $row->updated_user;
$p_created_at = $row->created_at;
$p_updated_at = $row->updated_at;
$p_ip_address = $row->ip_address;
$p_has_active_advertisement = $row->has_active_advertisement;


// payment 정보
$p_ad_payments_id = $row->ad_payments_id;
$p_desired_start_date = $row->desired_start_date;
$p_desired_end_date = $row->desired_end_date;
$p_start_date = $row->start_date;
$p_end_date = $row->end_date;
$p_validity_period = $row->validity_period;
$p_is_paid = $row->is_paid;
$p_payment_date = $row->payment_date;
$p_payment_amount = $row->payment_amount;
$p_payment_method = $row->payment_method;

$blank_img = "";
$p_del_logo_url = "";
$p_del_main_image_url = "";
if($p_logo_url != "" ) {  $v_logo_url = $define_val->IMG_PROTECT ."?c=community&cc=vehicle_dealer&d=logo&s=".$p_community_car_dealers_id;  $v_logo_url = "<img src=\"$v_logo_url\" alt=\"\" width=\"100\" />";   $p_del_logo_url = GET_DEL_UPLOAD_IMAGE('logg_url');} else { $v_logo_url = $blank_img; }
if($p_main_image_url != "" ) { $v_main_image_url = $define_val->IMG_PROTECT ."?c=community&cc=vehicle_dealer&d=main&s=".$p_community_car_dealers_id; $v_main_image_url = "<img src=\"$v_main_image_url\" alt=\"\" width=\"100\" />";$p_del_main_image_url = GET_DEL_UPLOAD_IMAGE('main_image_url');  } else { $v_main_image_url = $blank_img; }


$main = 4;
$sub = 7;
$mtitle = "커뮤니티";
$stitle = "자동차 딜러 관리";
$ytitle = "";
$page = "";

$tpl = new BearTemplate("./tpl");
$tpl->setFile("main", "vehicle_dealer_pay_update.tpl");

$tpl->setVar("T_ID", $p_community_car_dealers_id);
$tpl->setVar("T_AP_ID", $p_ad_payments_id);
$tpl->setVar("T_COMPANY_NAME", $p_company_name);
$tpl->setVar("T_COMPANY_WEBSITE", $p_company_website);
$tpl->setVar("T_DEALER_WEBSITE", $p_dealer_website);
$tpl->setVar("T_CONTACT_NAME", $p_contact_name);
$tpl->setVar("T_CONTACT_EMAIL", $p_contact_email);
$tpl->setVar("T_CONTACT_PHONE", $p_contact_phone);
$tpl->setVar("T_LISTING_ADDRESS1", $p_listing_address1);
$tpl->setVar("SELECT_STATE_CODE", DB_ARRAY_ARRAY_RETURN(-1, $p_state_code, $db, "common_code", "code_sub_name", "code_sub", "code = 'state' order by code_sub_name asc","주선택"));
$tpl->setVar("SELECT_CITY_NAME", DB_ARRAY_ARRAY_RETURN(-1, $p_city_name, $db, "common_code", "code_sub_name", "code_sub", "code = '{$p_state_code}' order by code_sub_name asc","도시선택"));
$tpl->setVar("T_DEALER_INTRODUCTION", $p_dealer_introduction);
$tpl->setVar("T_VIEW_COUNT", $p_view_count);
$tpl->setVar("SELECT_IS_ACTIVE", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_active));
$tpl->setVar("SELECT_IS_APPROVED", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_active, 1, $p_is_approved));
$tpl->setVar("T_HAS_ACTIVE_ADVERTISEMENT", ARRAY_RETURN($define_val->DEFINE_is_active, $p_has_active_advertisement));

$tpl->setVar("T_CREATED_USER", $p_created_user);
$tpl->setVar("T_CREATED_AT", $p_created_at);
$tpl->setVar("T_UPDATED_USER", $p_updated_user);
$tpl->setVar("T_UPDATED_AT", $p_updated_at);
$tpl->setVar("T_IP_ADDRESS", $p_ip_address);

$tpl->setVar("T_DESIRED_START_DATE", $p_desired_start_date);
$tpl->setVar("T_DESIRED_END_DATE", $p_desired_end_date);
$tpl->setVar("T_START_DATE", $p_start_date);
$tpl->setVar("T_END_DATE", $p_end_date);
$tpl->setVar("SELECT_VALIDITY_PERIOD", ARRAY_ARRAY_RETURN($define_val->DEFINE_validity_period,1,$p_validity_period));
$tpl->setVar("SELECT_IS_PAID", ARRAY_ARRAY_RETURN($define_val->DEFINE_is_paid, 1, $p_is_active));
$tpl->setVar("T_PAYMENT_DATE", $p_payment_date);
$tpl->setVar("T_PAYMENT_AMOUNT", $p_payment_amount);
$tpl->setVar("T_PAYMENT_METHOD", $p_payment_method);

$tpl->setVar("T_DEL_LOGO_URL", $p_del_logo_url);
$tpl->setVar("T_DEL_MAIN_IMAGE_URL", $p_del_main_image_url);

$tpl->setVar("H_LOGO_URL", $p_logo_url);
$tpl->setVar("H_MAIN_IMAGE_URL", $p_main_image_url);

$tpl->setVar("T_LOGO_URL", $v_logo_url);
$tpl->setVar("T_MAIN_IMAGE_URL", $v_main_image_url);

$tpl->setVar("T_IS_MODIFY_YN",ARRAY_RETURN($define_val->DEFINE_is_active, $p_is_modify_yn));

include("$DOCUMENT_ROOT/admin/include/common.php");

$tpl->tprint("main");

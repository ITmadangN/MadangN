<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/admin/include/db.php");

require_once __DIR__ . '/../../vendor/autoload.php';

//\Stripe\Stripe::setApiKey('sk_test_51Tem4pJrnxNGZT5a9nfY3XENdpmwXywpEdMbtRnfnIaSyTQEgfLI4j0ucbUNUiuuEQAho4IvrGWvhZCnJiLO9tvt00wFGRAA6f');
\Stripe\Stripe::setApiKey('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');

$session_id = $_GET['session_id'] ?? '';

$session = \Stripe\Checkout\Session::retrieve($session_id);

// order_id는 $ad_payments_id
$order_id = $session->metadata->order_id;
    
$row_sql = "SELECT * FROM ad_payments A                                    
            where A.ad_payments_id = {$order_id}           
           ";

$placeholders = [];
$result = $db->query($row_sql, $placeholders);
$row = $db->fetch();

$section_type = $row->section_type;
$listing_id = $row->listing_id;


// DB로 데이터 업데이트
// 업데이트 필요
// ad_payments_id로 셀렉트해서 아래 업데이트
// community_recruit_listings > is_active = 1
// community_business > is_active = 1
// community_car_dealers > is_active = 1
// ad_payments > is_active = 1 , is_paid = 'Y'



if($section_type == "1" ||  $section_type == "2") {
    
    $update_values = array(
                    'is_active' => 1                    
                );

    $result = $db->update('community_recruit_listings', $update_values, 'community_recruit_listings_id = ' . $listing_id);
    
}

if($section_type == "3") {
    
    $update_values = array(
                    'is_active' => 1                    
                );

    $result = $db->update('community_business', $update_values, 'community_business_id = ' . $listing_id);
    
}

if($section_type == "4") {
    
    $update_values = array(
                    'is_active' => 1                   
                );

    $result = $db->update('community_car_dealers', $update_values, 'community_car_dealers_id = ' . $listing_id);
    
}


if($section_type == "5") {
    
    $update_values = array(
                    'is_active' => 1                    
                );

    $result = $db->update('realestate_agents', $update_values, 'realestate_agent_id = ' . $listing_id);
    
}

if($section_type == "6") {
    
    $update_values = array(
                    'is_active' => 1                    
                );

    $result = $db->update('ad_banners', $update_values, 'ad_banner_id = ' . $listing_id);
    
}

//실제 결제 비용과 결제 메소드를 등록한다.

$amount_raw = $session->amount_total;        // 예: 1050 (Cents 단위)
$actual_amount = $amount_raw / 100;          // 예: 10.50 (인간이 읽는 달러 단위)

$payment_intent = $session->payment_intent;
$payment_type = $payment_intent->payment_method->type; // 예: 'card', 'link', 'apple_pay' 등

$update_payment_values = array(
                    'is_paid' => 'Y',                    
                    'is_active' => 1,
                    'payment_amount' => $actual_amount,
                    'payment_method' => $payment_type
                );

$result = $db->update('ad_payments', $update_payment_values, 'ad_payments_id = ' . $order_id);
    


// echo $order_id;

echo("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n" .
                "<script language=\"javascript\">\n" .
                "<!--\n" .
                "alert(\"신청 및 결제가 완료되었습니다.\");\n" .
                "location.href='/';\n" .
                "//-->\n" .
                "</script>\n");
            exit;
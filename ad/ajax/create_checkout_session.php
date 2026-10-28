<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

include("$DOCUMENT_ROOT/admin/include/db.php");
include("$DOCUMENT_ROOT/include/define.php");

require_once __DIR__ . '/../../../vendor/autoload.php';

header('Content-Type: application/json; charset=utf-8');

// 현재 Test mode 키 , 실제에서는 live mode 키로 변경 필요
//\Stripe\Stripe::setApiKey('sk_test_51Tem4pJrnxNGZT5a9nfY3XENdpmwXywpEdMbtRnfnIaSyTQEgfLI4j0ucbUNUiuuEQAho4IvrGWvhZCnJiLO9tvt00wFGRAA6f');
\Stripe\Stripe::setApiKey('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');

$order_id = $_POST['order_id'] ?? '';
        
$row_sql = "SELECT * FROM ad_payments A                                    
            where A.ad_payments_id = {$order_id}           
           ";

$placeholders = [];
$result = $db->query($row_sql, $placeholders);
$row = $db->fetch();

$section_type = $row->section_type;
$listing_id = $row->listing_id;
$validity_period = $row->validity_period;

$ad_type = "";

switch($section_type) {
    
    case "1" : $ad_type = "recruit_platinum"; break;
    case "2" : $ad_type = "recruit_gold"; break;
    case "3" : $ad_type = "business_platinum"; break;
    case "4" : $ad_type = "vehicle_dealer"; break;
    case "5" : $ad_type = "agent"; break;
//    case "6" : $ad_type = "recruit_platinum"; break;
}

if($section_type != "6") {
    
    $row_sql = "SELECT * FROM ad_community_agent_amount A                                    
            where A.ad_type = '{$ad_type}'
           ";

    $placeholders = [];
    $result = $db->query($row_sql, $placeholders);
    $row = $db->fetch();
    
    $p_amount = 1000;
    
    switch($validity_period) {
        case "1" : $p_amount = $row->ad_amount_1; break;
        case "3" : $p_amount = $row->ad_amount_3; break;
        case "6" : $p_amount = $row->ad_amount_6; break;
        case "9" : $p_amount = $row->ad_amount_9; break;
        case "12" : $p_amount = $row->ad_amount_12; break;
        
    }
    
    $ad_amount = $p_amount * 100;
}
else {
    
    $banner_type = $_POST['banner_type'] ?? '';
    $banner_location = $_POST['banner_location'] ?? '';
    
    $row_sql = "SELECT * FROM ad_banner_amount A                                    
            where A.banner_type = '{$banner_type}' and A.banner_location = '{$banner_location}'
           ";

    $placeholders = [];
    $result = $db->query($row_sql, $placeholders);
    $row = $db->fetch();
    
    $p_amount = 1000;
    
    switch($validity_period) {
        case "1" : $p_amount = $row->banner_amount_1; break;
        case "3" : $p_amount = $row->banner_amount_3; break;
        case "6" : $p_amount = $row->banner_amount_6; break;
        case "9" : $p_amount = $row->banner_amount_9; break;
        case "12" : $p_amount = $row->banner_amount_12; break;
        
    }
    
    $ad_amount = $p_amount * 100;
    
}


if($ad_amount == "" || $ad_amount < 1 ) {
    
    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
    
    exit;

}

try {

    $session = \Stripe\Checkout\Session::create([

        'ui_mode' => 'embedded_page',

        'mode' => 'payment',

        'line_items' => [
            [
                'price_data' => [

                    'currency' => 'usd',

                    'product_data' => [
                        'name' => '광고 결제 ',
                    ],

                    'unit_amount' => $ad_amount,

                ],

                'quantity' => 1
            ]
        ],
        
        'metadata' => [
            'order_id' => $order_id,
        ],
        
        'redirect_on_completion' => 'always',

        'return_url' =>
            $define_val->MADANGN_URL.'/ad/payment_return.php?session_id={CHECKOUT_SESSION_ID}'

    ]);

    echo json_encode([
        'success' => true,
        'client_secret' => $session->client_secret
    ]);

} catch (Exception $e) {

    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);

}
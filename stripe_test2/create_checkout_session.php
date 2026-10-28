<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');


require_once __DIR__ . '/../../vendor/autoload.php';

header('Content-Type: application/json; charset=utf-8');

\Stripe\Stripe::setApiKey('sk_test_51Tem4pJrnxNGZT5a9nfY3XENdpmwXywpEdMbtRnfnIaSyTQEgfLI4j0ucbUNUiuuEQAho4IvrGWvhZCnJiLO9tvt00wFGRAA6f');

try {

    $product_id = $_POST['product_id'] ?? '';

    /*
     * 실제 서비스에서는
     * product_id를 이용해서 DB에서 가격을 가져오는 것을 권장합니다.
     */

    $session = \Stripe\Checkout\Session::create([

        'ui_mode' => 'embedded_page',

        'mode' => 'payment',

        'line_items' => [
            [
                'price_data' => [

                    'currency' => 'krw',

                    'product_data' => [
                        'name' => 'Premium 상품',
                    ],

                    'unit_amount' => 30000,

                ],

                'quantity' => 1
            ]
        ],

        'return_url' =>
            'https://www.example.com/payment_return.php?session_id={CHECKOUT_SESSION_ID}'

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
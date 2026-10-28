<?php

require_once '../../../vendor/autoload.php';
require_once '../secrets.php';

$stripe = new \Stripe\StripeClient($stripeSecretKey);
header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://madangn.phps.kr';

$checkout_session = $stripe->checkout->sessions->create([
  'line_items' => [[
  'price_data' => [
    'currency' => 'usd',
    'unit_amount' => 100, // 50.00 USD (센트 단위로 입력)
    'product_data' => [
      'name' => 'T-Shirt', // 즉석에서 상품명 지정
    ],
  ],
  'quantity' => 1,
]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/stripe_test/public/success.html',
  // Provide a name (for example, hosted_web_0001) to label this Checkout integration and measure its conversion independently
  'integration_identifier' => 'my-website-id-1', 
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
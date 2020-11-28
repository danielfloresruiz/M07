<?php
session_start();
require 'stripe/init.php';

\Stripe\Stripe::setApiKey('sk_test_51HotTBFXhO5sy2LGwx608HBR7nDsQZWnVMmOTbue9zKYE3a8UdOxkUnrqk4GcLmLkbScZhSCWmgZGTpCBXNJ1tFD00wXMt6RGe');
header('Content-Type: application/json');



$total_price = $_SESSION["total-price"];
$YOUR_DOMAIN = 'http://dawjavi.insjoaquimmir.cat';

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'eur',
      'unit_amount' => $total_price,
      'product_data' => [
        'name' => 'Stubborn Attachments',
        'images' => ["https://i.imgur.com/EHyR2nP.png"],
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);
echo json_encode(['id' => $checkout_session->id]);
echo $_SESSION["total-price"];
?>
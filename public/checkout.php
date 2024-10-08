<?php

use app\library\Cart;
use app\library\Product;
use Stripe\StripeClient;

require '../vendor/autoload.php';

session_start();

$private_key = 'sk_test_YOUR_PRIVATE_KEY';     ## chave secreta

$stripe = new StripeClient($private_key);

$cart = new Cart;
$productsInCart = $cart->getCart();

$items = [
    'mode' => 'payment',
    'success_url' => 'http://localhost:8000/success.php',
    'cancel_url' => 'http://localhost:8000/cancel.php',
];

foreach ($productsInCart as $product) {
    $items['line_items'][] = [
        'price_data' => [
            'currency' => 'BRL',
            'product_data' => [
                'name' => $product->getName(),
            ],
            'unit_amount' => $product->getPrice() * 100
        ],
        'quantity' => $product->getQuantity()
    ];
    
}

$checkout_session = $stripe->checkout->sessions->create($items);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
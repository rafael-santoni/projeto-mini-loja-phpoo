<?php

namespace App\Controllers;

use App\Library\Auth;
use App\Library\Cart;
use Stripe\StripeClient;
use App\Library\CartInfo;
use App\Library\Redirect;
use Exception;

class CheckoutController
{
    public function checkout()
    {
        try {

            if(!Auth::auth()) {
                throw new Exception("Para fazer o checkout você precisa estar logado");
            }

            // $private_key = $_ENV['STRIPE_KEY'];     ## chave secreta

            $stripe = new StripeClient($_ENV['STRIPE_KEY']);

            // $cart = new Cart;
            // $productsInCart = $cart->getCart();
            # $productsInCart = CartInfo::getCart();

            $baseUrl = $_ENV['BASE_URL'];
            $items = [
                'mode' => 'payment',
                // 'success_url' => 'http://localhost:8000/success.php',
                // 'cancel_url' => 'http://localhost:8000/cancel.php',
                'success_url' => $baseUrl.'/success',
                'cancel_url' => $baseUrl.'/cancel',
            ];

            // foreach ($productsInCart as $product) {
            foreach (CartInfo::getCart() as $product) {
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

            Redirect::to($checkout_session->url);

        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
}

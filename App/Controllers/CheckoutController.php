<?php

namespace App\Controllers;

use App\Library\Auth;
use Stripe\StripeClient;
use App\Library\CartInfo;
use App\Library\Redirect;
use App\Services\AuthInfoService;
use App\Services\CartInfoService;
use App\Services\CheckoutService;
use Exception;

class CheckoutController
{
    public function checkout()
    {
        try {

            /* if(!AuthInfoService::isAuth()) {
                throw new Exception("Para fazer o checkout você precisa estar logado");
            }

            $stripe = new StripeClient($_ENV['STRIPE_KEY']);

            $baseUrl = $_ENV['BASE_URL'];
            $items = [
                'mode' => 'payment',
                'success_url' => $baseUrl.'/success',
                'cancel_url' => $baseUrl.'/cancel',
            ];

            foreach (CartInfoService::getCart() as $product) {
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

            $checkout_session = $stripe->checkout->sessions->create($items); */
            $checkoutService = new CheckoutService;
            $checkout_session = $checkoutService->checkout();
            Redirect::to($checkout_session->url);

        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
}

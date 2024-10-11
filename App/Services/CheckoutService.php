<?php

namespace App\Services;

use Stripe\StripeClient;
use App\Services\AuthInfoService;
use App\Services\CartInfoService;
use Exception;

class CheckoutService
{
    public function checkout()
    {
        if(!AuthInfoService::isAuth()) {
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

        // $checkout_session = $stripe->checkout->sessions->create($items);
        return $stripe->checkout->sessions->create($items);
    }
}

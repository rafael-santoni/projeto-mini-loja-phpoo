<?php

namespace App\Library;

use App\Library\CartInfo;

class Cart
{

    private function init()
    {
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }
    
    public function add(Product $product)
    {
        $this->init();

        $inCart = false;
        $cart = CartInfo::getCart();
        $this->setTotal($product);
        if(count($cart) > 0) {

            foreach ($cart as $productInCart) {

                if($productInCart->getId() === $product->getId()) {

                    $quantity = $productInCart->getQuantity() + $product->getQuantity();
                    $productInCart->setQuantity($quantity);

                    $inCart = true;
                    break;

                }
                
            }

        }

        if(!$inCart) {
            $this->setProductsInCart($product);
        }
    }

    private function setProductsInCart($product)
    {
        if(!isset($_SESSION['cart']['products'])) {
            $_SESSION['cart']['products'] = [];
        }

        $_SESSION['cart']['products'][$product->getSlug()] = $product;
    }

    private function setTotal(Product $product)
    {
        if(!isset($_SESSION['cart']['total'])) {
            $_SESSION['cart']['total'] = 0;
        }

        $_SESSION['cart']['total'] += $product->getPrice() * $product->getQuantity();
    }

    public function remove(string $slug)
    {

        if(array_key_exists($slug, $_SESSION['cart']['products'])) {
            unset($_SESSION['cart']['products'][$slug]);
        }

        /* if(isset($_SESSION['cart']['products'])) {
            foreach (CartInfo::getCart() as $index => $product) {
                
                if($product->getId() === $id) {
                    unset($_SESSION['cart']['products'][$index]);
                    $_SESSION['cart']['total'] -= $product->getPrice() * $product->getQuantity();
                }

            }

        } */
    }

    public function update(string $slug, string|int $quantity)
    {
        if(array_key_exists($slug, $_SESSION['cart']['products'])) {
            $product = $_SESSION['cart']['products'][$slug];
            $product->setQuantity($quantity);
        }
    }

/*     public function getCart()
    {
        return $_SESSION['cart']['products'] ?? [];
    }
    
    public function getTotal()
    {
        return $_SESSION['cart']['total'] ?? 0;
    } */

}
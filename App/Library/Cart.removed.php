<?php
/*
    --***************************--
    *****    Removed Class    *****
    *****                     *****
    *****   Esta classe foi   *****
    ***** removida do projeto *****
    --***************************--

namespace App\Library;

use App\Entities\ProductEntity;
use App\Services\CartInfoService;
// use App\Library\CartInfo;

class Cart
{

    private function init()
    {
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }
    
    public function add(ProductEntity $productEntity)
    {
        $this->init();

        $inCart = false;
        // $cart = CartInfo::getCart();
        $cart = CartInfoService::getCart();
        $this->setTotal($productEntity);
        if(count($cart) > 0) {

            foreach ($cart as $productInCart) {

                if($productInCart->getId() === $productEntity->getId()) {

                    $quantity = $productInCart->getQuantity() + $productEntity->getQuantity();
                    $productInCart->setQuantity($quantity);

                    $inCart = true;
                    break;

                }

            }

        }

        if(!$inCart) {
            $this->setProductsInCart($productEntity);
        }
    }

    private function setProductsInCart($product)
    {
        if(!isset($_SESSION['cart']['products'])) {
            $_SESSION['cart']['products'] = [];
        }

        $_SESSION['cart']['products'][$product->getSlug()] = $product;
    }

    private function setTotal(ProductEntity $productEntity)
    {
        if(!isset($_SESSION['cart']['total'])) {
            $_SESSION['cart']['total'] = 0;
        }

        $_SESSION['cart']['total'] += $productEntity->getPrice() * $productEntity->getQuantity();
    }

    public function remove(string $slug)
    {
        if(array_key_exists($slug, $_SESSION['cart']['products'])) {
            unset($_SESSION['cart']['products'][$slug]);
        }
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
*/
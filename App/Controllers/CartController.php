<?php

namespace App\Controllers;

use App\Database\Models\Product as ProductModel;
use App\Library\Cart;
use App\Library\Product;
use App\Library\Redirect;
use App\Core\View;
use App\Services\CartService;

class CartController
{
    private CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService;
    }

    public function index()
    {
        View::render('cart');
    }

    public function add()
    {
        $this->cartService->add();

        return Redirect::back();
    }

    public function update()
    {
        $this->cartService->update();

        return Redirect::to('/cart');
    }

    public function destroy()
    {
        $this->cartService->delete();

        return Redirect::back();
    }
}

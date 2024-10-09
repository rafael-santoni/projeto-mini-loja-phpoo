<?php

namespace App\Controllers;

use App\Library\View;

class CartController
{
    public function index()
    {
        View::render('cart');
    }
}

<?php

namespace App\Controllers;

use App\Database\Models\Product;
use App\Library\View;

class HomeController
{
    public function index()
    {
        $products = Product::all('id,name,slug,price,image');

        View::render('home', ['products' => $products]);
    }
}

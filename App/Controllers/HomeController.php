<?php

namespace App\Controllers;

use App\Database\Models\Product;
use App\Library\Cart;
use App\Library\View;
use Symfony\Component\VarDumper\VarDumper;

class HomeController
{
    public function index()
    {
        $products = Product::all('id,name,slug,price,image');

        View::render('home', ['products' => $products]);
    }
}

<?php

namespace App\Controllers;

use App\Library\View;

class HomeController
{
    public function index()
    {
        View::render('home');
    }
}

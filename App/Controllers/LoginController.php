<?php

namespace App\Controllers;

use App\Library\Redirect;
use App\Library\View;

class LoginController
{
    public function index()
    {
        View::render('login');
    }

    public function store()
    {
        // dump('LoginController -> store()');
        Redirect::back();
    }
}

<?php

namespace App\Controllers;

use App\Core\View;

class StatusCheckoutController
{
    public function success()
    {
        View::render('success');
    }

    public function cancel()
    {
        View::render('cancel');
    }
}

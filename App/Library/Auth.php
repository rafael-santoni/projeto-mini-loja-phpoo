<?php

namespace App\Library;

use App\Database\Models\User;
use stdClass;

class Auth
{
    public static function loginAs(User $user)
    {
        if(!isset($_SESSION['auth'])) {

            $stdClass = new stdClass;
            $stdClass->id = $user->id;
            $stdClass->firstName = $user->firstName;
            $stdClass->lastName = $user->lastName;
            $stdClass->fullName = $user->firstName.' '.$user->lastName;

            $_SESSION['auth'] = $stdClass;

        }
    }

    public static function auth()
    {
        return $_SESSION['auth'] ?? null;
    }

    public static function logout()
    {
        if(isset($_SESSION['auth'])){
            unset($_SESSION['auth']);
        }
    }
}

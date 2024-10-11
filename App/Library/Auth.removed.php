<?php
/*
    --***************************--
    *****    Removed Class    *****
    *****                     *****
    *****   Esta classe foi   *****
    ***** removida do projeto *****
    --***************************--

namespace App\Library;

use App\Database\Models\User;
use App\Dto\AuthDto;
use stdClass;

class Auth
{
    public static function loginAs(User $user)
    {
        if(!isset($_SESSION['auth'])) {

            $authDto = new AuthDto($user->id, $user->firstName, $user->lastName);

            $_SESSION['auth'] = $authDto;
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
*/
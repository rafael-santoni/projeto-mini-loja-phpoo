<?php

namespace App\Services;

use App\Database\Models\User;
use App\Dto\AuthDto;
use Exception;

class AuthService
{
    public function authenticate()
    {
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);

        $user = User::where('email', $email);

        if(!$user) {
            throw new Exception("Usuário ou senha inválidos");
        }
        
        if(!password_verify($password, $user->password)) {
            throw new Exception("Usuário ou senha inválidos");
        }

        $this->loginAs($user);
    }

    private function loginAs(User $user)
    {
        if(!isset($_SESSION['auth'])) {

            $authDto = new AuthDto($user->id, $user->firstName, $user->lastName);

            $_SESSION['auth'] = $authDto;
        }
    }

    /* public static function auth()
    {
        return $_SESSION['auth'] ?? null;
    } */

    public function logout()
    {
        if(isset($_SESSION['auth'])){
            unset($_SESSION['auth']);
        }
    }
}

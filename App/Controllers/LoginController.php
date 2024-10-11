<?php

namespace App\Controllers;

use App\Core\View;
use App\Library\Redirect;
use App\Database\Models\User;
use App\Library\Auth;
use App\Services\AuthService;
use Exception;

class LoginController
{
    private AuthService $authService;

    public function __construct() {
        $this->authService = new AuthService;
    }

    public function index()
    {
        View::render('login');
    }

    public function store()
    {
        /* $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);

        $user = User::where('email', $email);

        if(!$user) {
            throw new Exception("Usuário ou senha inválidos");
        }
        
        if(!password_verify($password, $user->password)) {
            throw new Exception("Usuário ou senha inválidos");
        }

        Auth::loginAs($user); */
        $this->authService->authenticate();
        
        return Redirect::to('/');
    }

    public function destroy()
    {
        $this->authService->logout();

        return Redirect::back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{

    public function register()
    {
        return Inertia::render('User/Register');
    }

    public function login()
    {
        return Inertia::render('User/Login', [
            'messageLoginError' => session('message_login_error', '')
        ]);
    }

}

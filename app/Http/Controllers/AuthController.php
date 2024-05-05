<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function store(UserRegisterRequest $registerRequest)
    {
        $validated = $registerRequest->validated();

        $user = User::create($validated);

        auth()->login($user);
        return to_route('customers.index');
    }

    public function authenticate(Request $request, UserLoginRequest $loginRequest)
    {
        $validated = $loginRequest->validated();

        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password'],
        ];

        $remember = $validated['remember'];

        if(auth()->attempt($credentials, remember: $remember))
        {
            $request->session()->regenerate();

            return redirect()->intended('/customers');
        }

        return back()->with('message_login_error', 'Email or Password invalid, please try again...');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('user.login');
    }
}

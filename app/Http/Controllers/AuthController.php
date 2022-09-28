<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SignInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signInForm()
    {
        return view('sign-in');
    }

    public function signIn(SignInRequest $request)
    {
        $credentials = $request->validated();

        $check = function ($user) {
            return $user->email_verified_at !== null;
        };

        //attemptWhen - проверяем верификацию email

        if (Auth::attemptWhen($credentials, $check)) {
            session()->flash('success', 'Signed In');

            return redirect()->route('home');
        }

        session()->flash('error', 'The provided credentials are incorrect');
        return redirect()->route('login');
    }

    public function logout()
    {
        //login() принимает объект текущего пользователя
        //Auth::login();

        // удаляем куки для текущего пользователя
        Auth::logout();

        return redirect()->route('login');
    }
}

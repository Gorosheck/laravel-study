<?php

namespace App\Http\Controllers;

use App\Events\UserLoggedIn;
use App\Http\Requests\User\SignInRequest;
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

        if (Auth::attemptWhen($credentials)) {
            $user = auth()->user();
            $event = new UserLoggedIn($user, $request);
            event($event);

            session()->flash('success', 'Signed In');
            return redirect()->route('home');
        }

        session()->flash('error', 'The provided credentials are incorrect');
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

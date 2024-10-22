<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(): View
    {
        return view("auth.login");
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            "email" => "required|string|email|max:100",
            "password" => "required|string"
        ]);

        // Attempt to Authenticate User
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent to fixation attack
            $request->session()->regenerate();
            return redirect()->intended(route("home"))->with('Success', 'You are now Logged In');
        }

        // If auth fails, redirect back with error
        return back()->withErrors([
            "email" => "The provided credentials do not match our records",
        ])->onlyInput("email");
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        // Get Logged User
        $user = Auth::user();

        // Validate Data
        $validatedData = $request->validate([
            "name" => "required|string",
            "email" => "required|string|email",
        ]);

        // dd($user);
        // Update User Info
        $user->update($validatedData);

        return redirect()->route("dashboard")->with("Success", "Profile Info Updated");
    }
}

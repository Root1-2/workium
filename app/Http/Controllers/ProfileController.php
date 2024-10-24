<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            "avatar" => "nullable|image|mimes:jpeg,jpg,png,gif,ico|max:2048"
        ]);

        // Get User name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Handle Avatar Upload
        if ($request->hasFile('avatar')) {
            // Delete Old Avatar if exist
            if ($user->avatar) {
                unlink(storage_path('app/public/' . $user->avatar));
            }

            // Store new avatar
            $avatarPath = $request->file("avatar")->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
        // Update User Info
        $user->save();

        return redirect()->route("dashboard")->with("Success", "Profile Info Updated");
    }
}

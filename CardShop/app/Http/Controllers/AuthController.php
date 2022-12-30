<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    public function register(Request $request){

        // Form validation
        $validated = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
            "confirm_password" => "required|same:password",
            "address" => "required",
            "profile_picture" => "required|image"
        ]);

        // Store image in directory under formatted file name
        $img = $request->profile_picture;
        $ext = $request->file('profile_picture')->extension();
        $newFileName = $request->email.'.'.$ext;
        Storage::putFileAs('/public/user_profile_pics', $img, $newFileName);

        // Register user in database
        $user = User::create([
            "name" => $validated['name'],
            "email" => $validated['email'],
            "password" => bcrypt($validated['password']),
            "address" => $validated['address'],
            "profile_picture" => $newFileName
        ]);

        // Login user
        Auth::login($user);

        return redirect('/');
    }

}
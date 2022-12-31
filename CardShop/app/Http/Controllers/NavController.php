<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NavController extends Controller
{
    //

    public function getHomePage(){
        return view('home');
    }

    public function getRegisterPage(){
        return view('register');
    }

    public function getLoginPage(){
        return view('login');
    }

    public function getProfilePage(Request $request){

        // Get user id from url
        $id = $request->route('user_id');

        // Get user from db
        $user = User::where('id', $id)->first();

        return view('profile', compact('user'));

    }

    public function getCreateListingPage(Request $request){
        return view('create-listing');
    }

}

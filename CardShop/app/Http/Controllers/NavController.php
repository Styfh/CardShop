<?php

namespace App\Http\Controllers;

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

}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use App\Models\Series;
use App\Models\User;
use Illuminate\Http\Request;

class NavController extends Controller
{
    //

    public function getHomePage(){

        // Fetch all series
        $series_array = Series::all();

        return view('home', compact('series_array'));
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

    public function getUserListingPage(Request $request){

        // Get user id from url
        $id = $request->route('user_id');

        // Get listings of the specified user from db
        $listings = Listing::where('lister_id', $id)
            ->get();

        return view('listings', compact('listings'));
    }

    public function getCreateListingPage(){

        // Get categories from db
        $categories = Category::all();

        // Get series from db
        $series_array = Series::all();

        return view('create-listing', compact('categories',
            'series_array'));
    }

}

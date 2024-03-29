<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Listing;
use App\Models\PurchaseHeader;
use App\Models\Series;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavController extends Controller
{
    //

    public function getHomePage(){

        // Fetch all series
        $series_array = Series::all();

        // Fetch all listings that are categorized as apparel or accessory
        $listings = Listing::whereHas('category', function($query){
                $query->where('name', 'Apparel')
                    ->orWhere('name', 'Accessory');
        })->get();

        return view('home', compact('series_array', 'listings'));
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

        // Fetch user purchases
        $purchases = PurchaseHeader::where('buyer_id', $id)->get();

        // Get user from db
        $user = User::where('id', $id)->first();

        return view('profile', compact('user', 'purchases'));

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

    public function getSearchPage(Request $request){

        // Get all queries from route
        $nameQuery = $request->query('name');
        $categoryQuery = $request->query('category');
        $seriesQuery = $request->query('series');
        $minPriceQuery = $request->query('minprice');
        $maxPriceQuery = $request->query('maxprice');

        // Initialize price queries if not queried
        if($minPriceQuery == null){
            $minPriceQuery = 0;
        }
        if($maxPriceQuery == null){
            $maxPriceQuery = PHP_INT_MAX;
        }

        // Get category choices from db
        $categories = Category::all();

        // Get series choices from db
        $series_array = Series::all();

        // Get search result according to query
        $listings = Listing::where('listings.name', 'LIKE', "%$nameQuery%")
            ->where('category_id', 'LIKE' ,$categoryQuery)
            ->where('series_id', 'LIKE', $seriesQuery)
            ->where('listings.individual_price', '>=', $minPriceQuery)
            ->where('listings.individual_price', '<', $maxPriceQuery)
            ->paginate(10);



        return view('search', compact('categories', 'series_array', 'listings', 'nameQuery', 'categoryQuery', 'seriesQuery', 'minPriceQuery', 'maxPriceQuery'));

    }

    public function getListingPage(Request $request){

        // Get id from route
        $id = $request->route('listing_id');

        // Fetch listing from db
        $listing = Listing::where('id', $id)->first();

        return view('listing', compact('listing'));

    }

    public function getCartPage(){

        // Get authed user id
        $id = Auth::id();

        // Get all items in cart belonging to user
        $cart = Cart::where('user_id', $id)->get();

        return view('cart', compact('cart'));
    }

}

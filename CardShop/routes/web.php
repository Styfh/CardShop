<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [NavController::class, 'getHomePage']);

Route::middleware('auth')->group(function(){
    Route::get('/cart', [NavController::class, 'getCartPage']);
    Route::post('/cart/add/{listing_id}', [CartController::class, 'add']);
    Route::post('/cart/stock/{cart_id}', [CartController::class, 'updateQty']);
    Route::delete('/cart/delete/{cart_id}', [CartController::class, 'delete']);

    Route::post('/purchase', [TransactionController::class, 'purchase']);

    Route::get('/listing/create', [NavController::class, 'getCreateListingPage']);
    Route::post('/listing/create', [ListingController::class, 'create']);
    Route::delete('/listing/delete/{listing_id}', [ListingController::class, 'delete']);
    Route::post('/listing/update/{listing_id}', [ListingController::class, 'updateStock']);

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware('guest')->group(function(){

    Route::get('/login', [NavController::class, 'getLoginPage']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [NavController::class, 'getRegisterPage']);
    Route::post('/register', [AuthController::class, 'register']);

});

Route::get('/profile/{user_id}', [NavController::class, 'getProfilePage']);

Route::get('/listings/{user_id}', [NavController::class, 'getUserListingPage']);

Route::get('/listing/{listing_id}', [NavController::class, 'getListingPage']);

Route::get('/search', [NavController::class, 'getSearchPage']);

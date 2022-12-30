<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NavController;
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

Route::get('/login', [NavController::class, 'getLoginPage']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [NavController::class, 'getRegisterPage']);
Route::post('/register', [AuthController::class, 'register']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\RentalsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('rentals-query', [UsersController::class, 'rentalsQuery']);
Route::post('login', [UsersController::class, 'login']);
Route::post('register', [UsersController::class, 'register']);

// RENTALS
Route::get('get-all-rentals', [RentalsController::class, 'getAllrentals']);
Route::get('get-rentals', [RentalsController::class, 'getrentals']);
Route::get('search-rentals', [RentalsController::class, 'searchrentals']);
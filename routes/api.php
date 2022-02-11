<?php

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// RESTAURANTS
Route::resource('/restaurants', RestaurantController::class);

// MENUS
Route::resource('/menus', MenuController::class);

// ORDERS
Route::resource('/orders', OrderController::class);
Route::post('/orders/{id}/{content}/{count}', [OrderController::class, 'addContent']);
Route::patch('/orders/{id}/{content}/{count}', [OrderController::class, 'updateContent']);
Route::delete('/orders/{id}/{content}', [OrderController::class, 'deleteContent']);

// CLIENTS
Route::resource('/clients', ClientController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

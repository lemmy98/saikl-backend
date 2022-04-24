<?php

use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Auth Routes
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
});

//Products Routes
Route::get('/shop', [ProductController::class, 'index']);
Route::post('/shop', [ProductController::class, 'store']);


//Categories Routes
Route::get('/shop/category/', [CategoryController::class, 'index']);
Route::post('/shop/category/', [CategoryController::class, 'store']);
Route::get('/shop/category/{category_id}', [CategoryController::class, 'show']);
Route::delete('/shop/category/{category_id}', [CategoryController::class, 'destroy']);


// Cart Routes
Route::get('/cart', [CartController::class, 'index']);
Route::post('cart/{id}', [CartController::class, 'addToCart']);
Route::post('update-cart', [CartController::class, 'updateCart']);
Route::post('remove', [CartController::class, 'removeCart']);
Route::post('clear', [CartController::class, 'clearAllCart']);

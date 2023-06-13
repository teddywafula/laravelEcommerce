<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::apiResources([
    'category' => CategoryController::class,
    'vendor' => VendorController::class,
    'product' => ProductController::class,
//    'cart' => CartController::class,
]);

Route::controller(CartController::class)->group(function() {
    Route::post('/cart/add-to-cart', 'addToCart');
    Route::post('/cart', 'createCart');
    Route::get('/cart', 'getCart');
    Route::delete('/cart/item/{id}', 'removeCartItem');
});


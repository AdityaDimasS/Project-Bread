<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;
use App\Models\User; //tidak di pakai yah
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

//INI UNTUK POSTMAN YAH
Route::apiResource('menus', MenuController::class);

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']); // Endpoint login
Route::apiResource('products', ProductController::class); // Endpoint CRUD Produk
Route::put('products/{id}', [ProductController::class,'update']);
Route::get('logout', [AuthController::class, "logout"]);
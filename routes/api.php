<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::prefix('category')->group(function () {
    Route::post('/store', [CategoryController::class, 'store']);
    Route::post('/update', [CategoryController::class, 'update']);
    Route::post('/delete', [CategoryController::class, 'destroy']);
});


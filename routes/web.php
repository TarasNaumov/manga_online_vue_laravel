<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/{any}', IndexController::class)->where('any', '.*');

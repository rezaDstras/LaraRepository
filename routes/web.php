<?php

use Illuminate\Support\Facades\Route;


//Route::get('/', [\App\Http\Controllers\CustomerController::class,'index']);

Route::resource('customer',\App\Http\Controllers\CustomerController::class);

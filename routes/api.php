<?php

use App\Http\Controllers\API\ProductController as APIProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', APIProductController::class);

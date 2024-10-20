<?php

use App\Controllers\TestController;
use App\Controllers\UserController;
use App\Routes\Route;

Route::get('/', [UserController::class, 'index']);
Route::get('/test', [TestController::class, 'test']);
Route::post('/create', [TestController::class, 'create']);

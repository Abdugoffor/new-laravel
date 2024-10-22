<?php

use App\Controllers\AuthController;
use App\Controllers\IndexController;
use App\Controllers\PostController;
use App\Routes\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logaut', [AuthController::class, 'logaut']);

// Post CRUD
Route::post('/post-create', [PostController::class, 'create']);
Route::post('/post-update', [PostController::class, 'update']);
Route::post('/post-delete', [PostController::class, 'destroy']);

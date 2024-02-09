<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index']);

Route::get('/posts', [PostController::class, 'posts']);
Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'category']);

Route::get('/login', [AuthController::class, 'viewLogin']);
Route::get('/register', [AuthController::class, 'viewRegister']);
Route::post('/login', [AuthController::class, 'doLogin']);
Route::post('/register', [AuthController::class, 'doRegister']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/dashboard/posts/checkslug', [DashboardController::class, 'checkSlug'])->middleware(['auth','verified']);
Route::resource('/dashboard/posts', DashboardController::class)->middleware(['auth','verified']);

Route::get('/email/verify', [AuthController::class, 'verifyEmail'])->middleware('auth')->name('verification.notice');;
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'doVerifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');;
Route::get('/email/verification-notification', [AuthController::class, 'sendVerifyEmail'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');;
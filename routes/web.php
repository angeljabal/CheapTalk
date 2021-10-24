<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => '/'], function(){
    Route::get('/', [SiteController::class, 'index'])->name('landing');
    Route::get('register', [AuthController::class, 'registrationForm'])->name('register');
    Route::post('register',  [AuthController::class, 'register']);
    Route::get('login',  [AuthController::class, 'loginForm'])->name('login');
    Route::post('login',  [AuthController::class, 'login']);
    Route::get('verify-email',  [AuthController::class, 'login']);
    Route::get('logout',  [AuthController::class, 'logout']);
    Route::get('verification/{user}/{token}',  [AuthController::class, 'verification']);

    Route::get('home', [PostController::class, 'all'])->name('home');
    Route::get('categories/{category}',  [PostController::class, 'byCategory'])->name('categories');
    Route::get('authors/{author}',  [PostController::class, 'byAuthor']);
    Route::get('authors',  [UserController::class, 'index'])->name('authors');

    Route::group(['prefix' => 'user', 'middleware' => ['auth', 'verified']], function(){
        Route::get('create-post',  [PostController::class, 'create'])->name('create-post');
        Route::post('create-post',  [PostController::class, 'store']);

    });
});
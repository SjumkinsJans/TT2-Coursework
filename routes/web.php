<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\AuthController;


Route::get('/', [ComicController::class, 'index'])->name('main.index');

Route::resource('user_profile', UserProfileController::class);
Route::resource('comic', ComicController::class);
Route::resource('main', ComicController::class)->except(['index']);


Route::middleware('guest')->group(function () {

Route::get('/login',[AuthController::class,'showLogin'])->name('showLogin');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/register',[AuthController::class,'showRegister'])->name('showRegister');
Route::post('/register',[AuthController::class,'register'])->name('register');

});

Route::middleware('auth')->post('/logout',[AuthController::class,'logout'])->name('logout');
<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'authenticate')->name('login.post');
    });
    Route::controller(RegisterController::class)->group(function () {
       Route::get('/register', 'index')->name('register');
       Route::post('/register', 'store')->name('register.post'); 
    });
});
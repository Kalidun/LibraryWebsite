<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Create\CreateController;
use App\Http\Controllers\Library\LibraryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
    });
    Route::prefix('library')->group(function () {
        Route::controller(LibraryController::class)->group(function () {
            Route::get('/', 'index')->name('library.index');
        });
    });
    Route::prefix('create')->group(function () {
        Route::controller(CreateController::class)->group(function () {
            Route::get('/', 'index')->name('create.index');
        });
    });
    Route::controller(LoginController::class)->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });
});

require __DIR__ . '/auth.php';

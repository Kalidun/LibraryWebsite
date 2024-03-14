<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Data\ShowController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Library\LibraryController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Borrowed\BorrowedController;
use App\Http\Controllers\Data\Create\CreateController;

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
            Route::get('/{title}', 'show')->name('library.show');
            Route::post('/borrow', 'borrow')->name('library.borrow');
            Route::post('/return', 'returnBook')->name('library.return');
        });
    });
    Route::prefix('data')->group(function () {
        Route::controller(ShowController::class)->group(function () {
            Route::get('/', 'index')->name('data.index');
        });
        Route::prefix('create')->group(function () {
            Route::controller(CreateController::class)->group(function () {
                Route::post('/book', 'createBook')->name('data.create.book');
                Route::post('/category', 'createCategory')->name('data.create.category');
            });
        });
    });
    Route::prefix('borrowed')->group(function () {
        Route::controller(BorrowedController::class)->group(function () {
            Route::get('/', 'index')->name('borrowed.index');
            Route::get('/{id}', 'show')->name('borrowed.show');
        });
    });
    Route::prefix('profile')->group(function () {
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/', 'index')->name('profile.index');
            Route::post('/', 'updateProfile')->name('profile.update');
            Route::post('/photo', 'updatePhoto')->name('profile.photo');
            Route::post('/delete-photo', 'deletePhoto')->name('profile.delete-photo');
        });
    });
    Route::controller(LoginController::class)->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });
});

require __DIR__ . '/auth.php';

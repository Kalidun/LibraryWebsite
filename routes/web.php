<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Borrowed\BorrowedController;
use App\Http\Controllers\Data\Create\CreateController;
use App\Http\Controllers\Data\ShowController;
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
    Route::controller(LoginController::class)->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });
});

require __DIR__ . '/auth.php';

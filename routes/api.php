<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\{UserController, BookController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->namespace('v1')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('get_users');
    Route::get('/users/{id}', [UserController::class, 'show'])
        ->where('id', '[0-9]*')->name('get_user');
    Route::post('/users', [UserController::class, 'store'])->name('create_user');
    Route::put('/users/{id}', [UserController::class, 'update'])
        ->where('id', '[0-9]*')->name('update_user');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])
        ->where('id', '[0-9]*')->name('remove_user');
    Route::get('/users/{id}/books', [UserController::class, 'books'])
        ->where('id', '[0-9]*')->name('get_user_books');

    Route::get('/books', [BookController::class, 'index'])->name('get_books');
    Route::get('/books/{id}', [BookController::class, 'show'])
        ->where('id', '[0-9]*')->name('get_book');
    Route::post('/books', [BookController::class, 'store'])->name('create_book');
    Route::put('/books/{id}', [BookController::class, 'update'])
        ->where('id', '[0-9]*')->name('update_book');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])
        ->where('id', '[0-9]*')->name('remove_book');
});

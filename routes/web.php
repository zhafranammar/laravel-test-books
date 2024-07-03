<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('home');
});

Route::resource('authors', AuthorController::class);
Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);

Route::resource('books', BookController::class);
Route::delete('/books/{id}', [BookController::class, 'destroy']);

<?php

use App\Http\Controllers\AuthorBooksController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookAuthorsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::name('api.')
    ->group(function () {
        Route::apiResource('borrows', BorrowController::class);
        Route::apiResource('categories', CategoryController::class);
        Route::apiResource('students', StudentController::class);
        Route::apiResource('authors', AuthorController::class);
        Route::apiResource('books', BookController::class);

        // Author Books
        Route::get('/authors/{author}/books', [
            AuthorBooksController::class,
            'index',
        ])->name('authors.books.index');
        Route::post('/authors/{author}/books/{book}', [
            AuthorBooksController::class,
            'store',
        ])->name('authors.books.store');
        Route::delete('/authors/{author}/books/{book}', [
            AuthorBooksController::class,
            'destroy',
        ])->name('authors.books.destroy');

        Route::apiResource('books', BookController::class);

        // Book Authors
        Route::get('/books/{book}/authors', [
            BookAuthorsController::class,
            'index',
        ])->name('books.authors.index');
        Route::post('/books/{book}/authors/{author}', [
            BookAuthorsController::class,
            'store',
        ])->name('books.authors.store');
        Route::delete('/books/{book}/authors/{author}', [
            BookAuthorsController::class,
            'destroy',
        ])->name('books.authors.destroy');
    });

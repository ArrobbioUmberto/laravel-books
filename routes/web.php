<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\Guest\BookController;

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

Route::get('/', function () {
    return view('welcome');
});
// ROTTA CHE UTILIZZO PER IL TOGGLE
Route::patch('/books/{book}/toggle', [BookController::class, 'enableToggle'])->name('books.toggle');
Route::resource('books', BookController::class);

// QUESTE SONO LE ROTTE DI LUIGI CHE NOI AVEVAMO FATTO CON L'ESERCIZIO DI GIANLUCA 
// Route::name('books.')->prefix('books')->group(function () {
//     Route::patch('/{book}/toggle', [BooksController::class, 'enableToggle'])->name('toggle');
//     Route::get('/trashed', [BooksController::class, 'trashed'])->name('trashed');
//     Route::post('/{book}/restore', [BooksController::class, 'restore'])->name('restore');
//     Route::delete('/{book}/force-delete', [BooksController::class, 'forceDelete'])->name('force-delete');
//     Route::post('/restore-all', [BooksController::class, 'restoreAll'])->name('restore-all');
// });

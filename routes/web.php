<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/',                         [BookController::class,     'index']);
    Route::get('/books',                    [BookController::class,     'index'])->name('books');
    Route::get('/book/create',              [BookController::class,     'create'])->name('book.create');
    Route::get('/book/destroy/{book}',     [BookController::class,     'destroy'])->name('book.destroy');
    Route::get('/book/edit/{book}',        [BookController::class,     'edit'])->name('book.edit');
    Route::post('/book/store',              [BookController::class,     'store'])->name('book.store');

    Route::get('/users',        [RegisteredUserController::class, 'index'])->name('users');
    Route::get('create_user',   [RegisteredUserController::class, 'create'])->name('create_user');
    Route::post('create_user',  [RegisteredUserController::class, 'store']);

    Route::get('/authors',                [AuthorsController::class,     'index'])->name('authors');
});



require __DIR__.'/auth.php';

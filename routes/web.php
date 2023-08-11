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
    Route::get('/profile', [ProfileController::class,       'edit']     )->name('profile.edit');
    Route::patch('/profile', [ProfileController::class,     'update']   )->name('profile.update');
    Route::delete('/profile', [ProfileController::class,    'destroy']  )->name('profile.destroy');

    Route::get('/',                         [BookController::class,     'index']    );
    Route::get('/books',                    [BookController::class,     'index']    )->name('books');
    Route::get('/book/create',              [BookController::class,     'create']   )->name('book.create');
    Route::get('/book/destroy/{book}',      [BookController::class,     'destroy']  )->name('book.destroy');
    Route::get('/book/edit/{book}',         [BookController::class,     'edit']     )->name('book.edit');
    Route::post('/book/update',             [BookController::class,     'update']   )->name('book.update');
    Route::post('/book/store',              [BookController::class,     'store']    )->name('book.store');
    Route::post('/book/search',             [BookController::class,     'search']   )->name('book.search');

    Route::get('/users',                    [RegisteredUserController::class, 'index']      )->name('users');
    Route::get('create_user',               [RegisteredUserController::class, 'create']     )->name('create_user');
    Route::post('create_user',              [RegisteredUserController::class, 'store']      );
    Route::get('/user/destroy/{user}',      [RegisteredUserController::class, 'destroy']    )->name('user.destroy');
    Route::get('/user/edit/{user}',         [RegisteredUserController::class, 'edit']       )->name('user.edit');
    Route::post('/user/update',             [RegisteredUserController::class, 'update']     )->name('user.update');

    Route::get('/authors',                  [AuthorsController::class,  'index']    )->name('authors');
    Route::get('/author/create',            [AuthorsController::class,  'create']   )->name('author.create');
    Route::get('/author/destroy/{author}',  [AuthorsController::class,  'destroy']  )->name('author.destroy');
    Route::get('/author/edit/{author}',     [AuthorsController::class,  'edit']     )->name('author.edit');
    Route::post('/author/update',             [AuthorsController::class,  'update']   )->name('author.update');
    Route::post('/author/store',              [AuthorsController::class,  'store']    )->name('author.store');
});

require __DIR__.'/auth.php';

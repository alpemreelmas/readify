<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\WaitingListController;

Route::get('/', function () {
    return view('welcome');
})->name('home'); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Author routes
Route::get('authors', [AuthorController::class,"index"])->name('authors.index');
Route::get('authors/{id}', [AuthorController::class, 'show'])->name('authors.show');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('authors', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('authors/{id}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::put('authors/{id}', [AuthorController::class, 'update'])->name('authors.update');
    Route::delete('authors/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');
});

// Book routes 
Route::get('books', [BookController::class,"index"])->name('books.index');
Route::get('books/{id}', [BookController::class,"show"])->name('books.show');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('books', [BookController::class, 'store'])->name('books.store');
    Route::get('books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('books/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});

// Genre routes
Route::get('genres', [GenreController::class,"index"])->name('genres.index');
Route::get('genres/{id}', [GenreController::class, 'show'])->name('genres.show');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('genres/create', [GenreController::class, 'create'])->name('genres.create');
    Route::post('genres', [GenreController::class, 'store'])->name('genres.store');
    Route::get('genres/{id}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    Route::put('genres/{id}', [GenreController::class, 'update'])->name('genres.update');
    Route::delete('genres/{id}', [GenreController::class, 'destroy'])->name('genres.destroy');
});

// Member routes
Route::resource('members', MemberController::class)->middleware(['auth', 'isAdmin']);

// Rental routes
Route::get('rentals', [RentalController::class,"index"])->name('rentals.index');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('rentals/create', [RentalController::class, 'create'])->name('rentals.create');
    Route::post('rentals', [RentalController::class, 'store'])->name('rentals.store');
    Route::get('rentals/{id}', [RentalController::class, 'show'])->name('rentals.show');
    Route::get('rentals/{id}/edit', [RentalController::class, 'edit'])->name('rentals.edit');
    Route::put('rentals/{id}', [RentalController::class, 'update'])->name('rentals.update');
    Route::delete('rentals/{id}', [RentalController::class, 'destroy'])->name('rentals.destroy');
    Route::post('rentals/{id}/return', [RentalController::class, 'returnBook'])->name('rentals.confirmReturn');
});

// Waiting List routes
Route::get('waiting-lists', [WaitingListController::class,"index"])->name('waiting-lists.index');
Route::post('waiting-lists', [WaitingListController::class, 'store'])->name('waiting-lists.store');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('waiting-lists/create', [WaitingListController::class, 'create'])->name('waiting-lists.create');
    Route::get('waiting-lists/{id}/edit', [WaitingListController::class, 'edit'])->name('waiting-lists.edit');
    Route::put('waiting-lists/{id}', [WaitingListController::class, 'update'])->name('waiting-lists.update');
    Route::delete('waiting-lists/{id}', [WaitingListController::class, 'destroy'])->name('waiting-lists.destroy');
});

require __DIR__.'/auth.php';
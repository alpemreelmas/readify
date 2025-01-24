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
    Route::resource('authors', AuthorController::class);

    // Book routes 
    Route::resource('books', BookController::class);

    // Genre routes
    Route::resource('genres', GenreController::class);

    // Member routes
    Route::resource('members', MemberController::class);

    // Rental routes
    Route::resource('rentals', RentalController::class);
    Route::post('rentals/{rental}/return', [RentalController::class, 'returnBook'])->name('rentals.confirmReturn');

    // Waiting List routes
    Route::resource('waiting-lists', WaitingListController::class)->except(["update","create","edit","show"]);


});

require __DIR__.'/auth.php';
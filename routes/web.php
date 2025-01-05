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

// Author routes
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

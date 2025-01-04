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
}); 

// Author routes
Route::resource('authors', AuthorController::class);

// Book routes 
Route::resource('books', BookController::class);
Route::get('books/{book}/rentals', [BookController::class, 'rentals']);
Route::get('books/{book}/waiting-list', [BookController::class, 'waitingList']);

// Genre routes
Route::resource('genres', GenreController::class);

// Member routes
Route::resource('members', MemberController::class);
Route::get('members/{member}/rentals', [MemberController::class, 'rentals']);
Route::get('members/{member}/waiting-list', [MemberController::class, 'waitingList']);

// Rental routes
Route::resource('rentals', RentalController::class);
Route::post('rentals/{rental}/return', [RentalController::class, 'returnBook']);

// Waiting List routes
Route::resource('waiting-lists', WaitingListController::class);
Route::post('waiting-lists/{waitingList}/cancel', [WaitingListController::class, 'cancel']);
Route::post('waiting-lists/{waitingList}/complete', [WaitingListController::class, 'complete']);

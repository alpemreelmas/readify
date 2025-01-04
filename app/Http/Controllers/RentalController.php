<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of rentals.
     */
    public function index()
    {
        $rentals = \DB::select('SELECT * FROM rentals');
        return view('rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new rental.
     */
    public function create()
    {
        $books = \DB::select('SELECT * FROM books');
        $users = \DB::select('SELECT * FROM users');
        return view('rentals.create', compact('books', 'users'));
    }

    /**
     * Store a newly created rental in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        \DB::insert('INSERT INTO rentals (book_id, user_id, rental_date, return_date) VALUES (?, ?, ?, ?)', [
            $validated['book_id'],
            $validated['user_id'],
            $validated['rental_date'],
            $validated['return_date']
        ]);

        return redirect()->route('rentals.index')
            ->with('success', 'Rental created successfully.');
    }

    /**
     * Display the specified rental.
     */
    public function show(string $id)
    {
        $rental = \DB::selectOne('SELECT * FROM rentals WHERE id = ?', [$id]);
        return view('rentals.show', compact('rental'));
    }

    /**
     * Show the form for editing the specified rental.
     */
    public function edit(string $id)
    {
        $rental = \DB::selectOne('SELECT * FROM rentals WHERE id = ?', [$id]);
        $books = \DB::select('SELECT * FROM books');
        $users = \DB::select('SELECT * FROM users');
        return view('rentals.edit', compact('rental', 'books', 'users'));
    }

    /**
     * Update the specified rental in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validated = $request->validated();

        \DB::update('UPDATE rentals SET book_id = ?, user_id = ?, rental_date = ?, return_date = ? WHERE id = ?', [
            $validated['book_id'],
            $validated['user_id'],
            $validated['rental_date'],
            $validated['return_date'],
            $id
        ]);

        return redirect()->route('rentals.index')
            ->with('success', 'Rental updated successfully.');
    }

    /**
     * Remove the specified rental from storage.
     */
    public function destroy(string $id)
    {
        \DB::delete('DELETE FROM rentals WHERE id = ?', [$id]);

        return redirect()->route('rentals.index')
            ->with('success', 'Rental deleted successfully.');
    }
}

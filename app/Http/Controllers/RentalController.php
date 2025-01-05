<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rental\StoreRequest;
use App\Http\Requests\Rental\UpdateRequest;
use App\Models\Rental;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    /**
     * Display a listing of rentals.
     */
    public function index()
    {
        $calendar = DB::select("
            SELECT 
                rentals.id,
                DATE(rented_at, '+' || duration_of_rent || ' days') as date,
                books.title as book_title,
                member_id,
                rented_at,
                returned_at,
                DATE(rented_at, '+' || duration_of_rent || ' days') as expected_return_date,
                duration_of_rent,
                CASE 
                    WHEN returned_at IS NOT NULL THEN 'returned'
                    ELSE 'expected_return'
                END as type
            FROM rentals
            JOIN books ON rentals.book_id = books.id
            WHERE rented_at IS NOT NULL
            ORDER BY expected_return_date DESC
        ");

        return view('rentals.index', compact('calendar'));
    }

    /**
     * Show the form for creating a new rental.
     */
    public function create()
    {
        $books = \DB::select('
            SELECT * FROM books 
            WHERE id NOT IN (
                SELECT book_id FROM rentals 
                WHERE returned_at IS NULL 
                OR (rented_at = date("now") AND member_id IN (
                    SELECT member_id FROM waiting_lists WHERE book_id = rentals.book_id
                ))
            )
        ');
        $members = \DB::select('SELECT * FROM members');
        return view('rentals.create', compact('books', 'members'));
    }

    /**
     * Store a newly created rental in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $validated = array_merge($validated, ['operator_id' => auth()->user()->id]);
        \DB::insert('INSERT INTO rentals (book_id, member_id, rented_at, duration_of_rent, returned_at, operator_id) VALUES (?, ?, ?, ?, ?, ?)', [
            $validated['book_id'],
            $validated['member_id'],
            $validated['rented_at'],
            $validated['duration_of_rent'],
            $validated['returned_at'],
            $validated['operator_id']
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
        $validated = array_merge($validated, ['operator_id' => 1]);
        \DB::update('UPDATE rentals SET book_id = ?, member_id = ?, rented_at = ?, duration_of_rent = ?, returned_at = ?, operator_id = ? WHERE id = ?', [
            $validated['book_id'],
            $validated['member_id'],
            $validated['rented_at'],
            $validated['duration_of_rent'],
            $validated['returned_at'],
            $validated['operator_id'],
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

    public function returnBook(string $id)
    {
        \DB::update('UPDATE rentals SET returned_at = ? WHERE id = ?', [date('Y-m-d'), $id]);
        return redirect()->route('rentals.index')->with('success', 'Rental confirmed returned successfully.');
    }
}

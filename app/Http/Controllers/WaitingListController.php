<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaitingListController extends Controller
{
    /**
     * Display a listing of the waiting list.
     */
    public function index()
    {
        $waitingList = \DB::select('SELECT * FROM waiting_list');
        return view('waiting_list.index', compact('waitingList'));
    }

    /**
     * Show the form for creating a new waiting list entry.
     */
    public function create()
    {
        $users = \DB::select('SELECT * FROM users');

        $books = \DB::select('
            SELECT b.*, MIN(r.rental_date) as start_date, MAX(r.return_date) as end_date 
            FROM books b
            LEFT JOIN rentals r ON b.id = r.book_id AND r.return_date IS NOT NULL
            GROUP BY b.id
        ');

        return view('waiting_list.create', compact('books', 'users', 'availableDates'));
    }

    /**
     * Store a newly created waiting list entry in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|integer',
            'user_id' => 'required|integer',
            'request_date' => 'required|date',
        ]);

        \DB::insert('INSERT INTO waiting_list (book_id, user_id, request_date) VALUES (?, ?, ?)', [
            $validated['book_id'],
            $validated['user_id'],
            $validated['request_date']
        ]);

        return redirect()->route('waiting_list.index')
            ->with('success', 'Waiting list entry created successfully.');
    }

    /**
     * Display the specified waiting list entry.
     */
    public function show(string $id)
    {
        $waitingListEntry = \DB::selectOne('SELECT * FROM waiting_list WHERE id = ?', [$id]);
        return view('waiting_list.show', compact('waitingListEntry'));
    }

    /**
     * Show the form for editing the specified waiting list entry.
     */
    public function edit(string $id)
    {
        $waitingListEntry = \DB::selectOne('SELECT * FROM waiting_list WHERE id = ?', [$id]);
        $books = \DB::select('SELECT * FROM books');
        $users = \DB::select('SELECT * FROM users');

        // Fetch the first available start and finish dates based on rental status
        $availableDates = $this->getFirstAvailableDates();

        return view('waiting_list.edit', compact('waitingListEntry', 'books', 'users', 'availableDates'));
    }

    /**
     * Update the specified waiting list entry in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'book_id' => 'required|integer',
            'user_id' => 'required|integer',
            'request_date' => 'required|date',
        ]);

        \DB::update('UPDATE waiting_list SET book_id = ?, user_id = ?, request_date = ? WHERE id = ?', [
            $validated['book_id'],
            $validated['user_id'],
            $validated['request_date'],
            $id
        ]);

        return redirect()->route('waiting_list.index')
            ->with('success', 'Waiting list entry updated successfully.');
    }

    /**
     * Remove the specified waiting list entry from storage.
     */
    public function destroy(string $id)
    {
        \DB::delete('DELETE FROM waiting_list WHERE id = ?', [$id]);

        return redirect()->route('waiting_list.index')
            ->with('success', 'Waiting list entry deleted successfully.');
    }

    /**
     * Get the first available start and finish dates based on rental status.
     */
    private function getFirstAvailableDate($bookId)
    {
        // Find the next available start date after the current rentals
        $nextAvailableStartDate = \DB::selectOne('
            SELECT MAX(return_date) as next_available_start_date 
            FROM rentals 
            WHERE book_id = ? AND return_date > NOW()
        ', [$bookId]);

        // If there are no current rentals, the book is available now
        $availableDate = $nextAvailableStartDate->next_available_start_date ?? now();

        return [
            'start_date' => $availableDate,
        ];
    }
}

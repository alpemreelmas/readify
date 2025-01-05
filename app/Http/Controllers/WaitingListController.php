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
        $waitingList = \DB::select('
            SELECT wl.*, m.email as member_email, b.title as book_title 
            FROM waiting_lists wl
            JOIN members m ON wl.member_id = m.id
            JOIN books b ON wl.book_id = b.id
        ');
        return view('waiting_lists.index', compact('waitingList'));
    }

    /**
     * Store a newly created waiting list entry in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|integer|exists:books,id',
            'email' => 'required|email|exists:members,email',
        ]);

        $member = \DB::selectOne('SELECT * FROM members WHERE email = ?', [$validated['email']]);

        $existingEntry = \DB::selectOne('SELECT * FROM waiting_lists WHERE book_id = ? AND member_id = ?', [
            $validated['book_id'],
            $member->id
        ]);

        if ($existingEntry) {
            return redirect()->route('books.show', $validated['book_id'])
                ->withErrors( 'You are already on the waiting list for this book.');
        }

        $position = \DB::selectOne('SELECT COUNT(*) as count FROM waiting_lists WHERE book_id = ?', [$validated['book_id']])->count;
        
        \DB::insert('INSERT INTO waiting_lists (book_id, member_id,position) VALUES (?, ?,?)', [
            $validated['book_id'],
            $member->id,
            $position + 1
        ]);

        return redirect()->route('books.show', $validated['book_id'])
            ->with('success', 'Waiting list entry created successfully.');
    }
    
    /**
     * Remove the specified waiting list entry from storage.
     */
    public function destroy(string $id)
    {
        \DB::delete('DELETE FROM waiting_lists WHERE id = ?', [$id]);

        return redirect()->route('waiting-lists.index')
            ->with('success', 'Waiting list entry deleted successfully.');
    }
}

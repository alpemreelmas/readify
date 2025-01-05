<?php

namespace App\Http\Controllers;

use App\Http\Requests\Member\StoreRequest;
use App\Http\Requests\Member\UpdateRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of members.
     */
    public function index()
    {
        $members = \DB::select('SELECT * FROM members');
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new member.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created member in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        
        \DB::insert('INSERT INTO members (first_name, last_name, email, date_of_birth, address) VALUES (?, ?, ?, ?, ?)', [
            $validated['first_name'],
            $validated['last_name'],
            $validated['email'],
            $validated['date_of_birth'],
            $validated['address']
        ]);

        return redirect()->route('members.index')
            ->with('success', 'Member created successfully.');
    }

    /**
     * Display the specified member.
     */
    public function show(string $id)
    {
        $member = \DB::selectOne('SELECT * FROM members WHERE id = ?', [$id]);
        $member->rentals = \DB::select('SELECT rentals.*, books.title as book_title FROM rentals JOIN books ON rentals.book_id = books.id WHERE rentals.member_id = ?', [$id]);
        $member->waitingList = \DB::select('SELECT waiting_lists.*, books.title as book_title FROM waiting_lists JOIN books ON waiting_lists.book_id = books.id WHERE waiting_lists.member_id = ?', [$id]);
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified member.
     */
    public function edit(string $id)
    {
        $member = \DB::selectOne('SELECT * FROM members WHERE id = ?', [$id]);
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified member in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validated = $request->validated();

        \DB::update('UPDATE members SET first_name = ?, last_name = ?, email = ?, date_of_birth = ?, address = ? WHERE id = ?', [
            $validated['first_name'],
            $validated['last_name'],
            $validated['email'],
            $validated['date_of_birth'],
            $validated['address'],
            $id
        ]);

        return redirect()->route('members.index')
            ->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified member from storage.
     */
    public function destroy(string $id)
    {
        \DB::delete('DELETE FROM members WHERE id = ?', [$id]);

        return redirect()->route('members.index')
            ->with('success', 'Member deleted successfully.');
    }

    /**
     * Display member's rentals.
     */
    public function rentals(string $id)
    {
        $member = \DB::selectOne('SELECT * FROM members WHERE id = ?', [$id]);
        if (!$member) {
            return redirect()->route('members.index')->with('error', 'Member not found.');
        }
        $rentals = \DB::select('SELECT * FROM rentals WHERE member_id = ?', [$id]);
        
        return view('members.rentals', compact('member', 'rentals'));
    }

    /**
     * Display member's waiting list.
     */
    public function waitingList(string $id)
    {
        $member = \DB::selectOne('SELECT * FROM members WHERE id = ?', [$id]);
        if (!$member) {
            return redirect()->route('members.index')->with('error', 'Member not found.');
        }
        $waitingList = \DB::select('SELECT * FROM waiting_lists WHERE member_id = ?', [$id]);
        
        return view('members.waiting-list', compact('member', 'waitingList'));
    }
}

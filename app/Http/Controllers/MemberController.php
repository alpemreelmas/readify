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
        
        \DB::insert('INSERT INTO members (name, email, phone, address) VALUES (?, ?, ?, ?)', [
            $validated['name'],
            $validated['email'], 
            $validated['phone'],
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

        \DB::update('UPDATE members SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?', [
            $validated['name'],
            $validated['email'],
            $validated['phone'],
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

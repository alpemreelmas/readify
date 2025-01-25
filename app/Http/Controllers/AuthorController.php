<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\StoreRequest;
use App\Http\Requests\Author\UpdateRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of authors.
     */
    public function index()
    {
        $authors = \DB::select('SELECT * FROM authors');
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new author.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created author in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        
        \DB::insert('INSERT INTO authors (name, picture, date_of_birth, date_of_death, biography) VALUES (?, ?, ?, ?, ?)', [
            $validated['name'],
            $validated['picture'],
            $validated['date_of_birth'],
            $validated['date_of_death'],
            $validated['biography']
        ]);

        return redirect()->route('authors.index')
            ->with('success', 'Author created successfully.');
    }

    /**
     * Display the specified author.
     */
    public function show(string $id)
    {
        $author = \DB::selectOne('SELECT * FROM authors WHERE id = ?', [$id]);
        $books = \DB::select('SELECT * FROM books WHERE author_id = ?', [$id]);
        
        return view('authors.show', compact('author', 'books'));
    }

    /**
     * Show the form for editing the specified author.
     */
    public function edit(string $id)
    {
        $author = \DB::selectOne('SELECT * FROM authors WHERE id = ?', [$id]);
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified author in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validated = $request->validated();

        \DB::update('UPDATE authors SET name = ?, picture = ?, date_of_birth = ?, date_of_death = ?, biography = ? WHERE id = ?', [
            $validated['name'],
            $validated['picture'],
            $validated['date_of_birth'],
            $validated['date_of_death'],
            $validated['biography'],
            $id
        ]);

        return redirect()->route('authors.index')
            ->with('success', 'Author updated successfully.');
    }

    /**
     * Remove the specified author from storage.
     */
    public function destroy(string $id)
    {
//         BEGIN TRANSACTION
//            DELETE FROM books WHERE author_id = ?
//            DELETE FROM authors WHERE id = ?
//         ROLLBACK / COMMIT
        \DB::transaction(function () use ($id) {
            \DB::delete('DELETE FROM books WHERE author_id = ?', [$id]);
            \DB::delete('DELETE FROM authors WHERE id = ?', [$id]);
        });

        return redirect()->route('authors.index')
            ->with('success', 'Author deleted successfully.');
    }
}

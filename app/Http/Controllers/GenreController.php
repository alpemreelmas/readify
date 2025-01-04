<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\StoreRequest;
use App\Http\Requests\Genre\UpdateRequest;

class GenreController extends Controller
{
    /**
     * Display a listing of genres.
     */
    public function index()
    {
        $genres = \DB::select('SELECT * FROM genres');
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new genre.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created genre in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        
        \DB::insert('INSERT INTO genres (name, description) VALUES (?, ?)', [
            $validated['name'],
            $validated['description']
        ]);

        return redirect()->route('genres.index')
            ->with('success', 'Genre created successfully.');
    }

    /**
     * Display the specified genre.
     */
    public function show(string $id)
    {
        $genre = \DB::selectOne('SELECT * FROM genres WHERE id = ?', [$id]);
        $books = \DB::select('SELECT * FROM books WHERE genre_id = ?', [$id]);
        
        return view('genres.show', compact('genre', 'books'));
    }

    /**
     * Show the form for editing the specified genre.
     */
    public function edit(string $id)
    {
        $genre = \DB::selectOne('SELECT * FROM genres WHERE id = ?', [$id]);
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified genre in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validated = $request->validated();

        \DB::update('UPDATE genres SET name = ?, description = ? WHERE id = ?', [
            $validated['name'],
            $validated['description'],
            $id
        ]);

        return redirect()->route('genres.index')
            ->with('success', 'Genre updated successfully.');
    }

    /**
     * Remove the specified genre from storage.
     */
    public function destroy(string $id)
    {
        \DB::delete('DELETE FROM genres WHERE id = ?', [$id]);

        return redirect()->route('genres.index')
            ->with('success', 'Genre deleted successfully.');
    }
}

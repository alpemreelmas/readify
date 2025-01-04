<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;

class BookController extends Controller
{
    /**
     * Display a listing of books.
     */
    public function index()
    {
        $books = \DB::select('SELECT * FROM books');
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new book.
     */
    public function create()
    {
        $authors = \DB::select('SELECT id, name FROM authors');
        $genres = \DB::select('SELECT id, name FROM genres');
        return view('books.create',compact("authors","genres"));
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        \DB::insert('INSERT INTO books (title, author_id, genre_id, published_date, summary) VALUES (?, ?, ?, ?, ?)', [
            $validated['title'],
            $validated['author_id'],
            $validated['genre_id'],
            $validated['published_date'],
            $validated['summary']
        ]);

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified book.
     */
    public function show(string $id)
    {
        $book = \DB::selectOne('SELECT * FROM books WHERE id = ?', [$id]);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified book.
     */
    public function edit(string $id)
    {
        $book = \DB::selectOne('SELECT * FROM books WHERE id = ?', [$id]);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified book in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validated = $request->validated();

        \DB::update('UPDATE books SET title = ?, author_id = ?, genre_id = ?, published_date = ?, summary = ? WHERE id = ?', [
            $validated['title'],
            $validated['author_id'],
            $validated['genre_id'],
            $validated['published_date'],
            $validated['summary'],
            $id
        ]);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified book from storage.
     */
    public function destroy(string $id)
    {
        \DB::delete('DELETE FROM books WHERE id = ?', [$id]);

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }

    /**
     * Display book's waiting list.
     */
    public function waitingList(string $id)
    {
        $book = \DB::selectOne('SELECT * FROM books WHERE id = ?', [$id]);
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Book not found.');
        }
        $waitingList = \DB::select('SELECT * FROM waiting_lists WHERE book_id = ?', [$id]);
        
        return view('books.waiting-list', compact('book', 'waitingList'));
    }
}

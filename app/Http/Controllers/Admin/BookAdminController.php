<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Theme;
use Illuminate\Http\Request;

class BookAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('themes')->get();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $themes = Theme::all();
        return view('admin.books.create', compact('themes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'cover_image' => 'required|image|max:2048',
            'description' => 'required|string',
            'for_you_reason' => 'required|string',
            'themes' => 'required|array',
        ]);

        $path = $request->file('cover_image')->store('books', 'public');

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'cover_image' => $path,
            'description' => $request->description,
            'for_you_reason' => $request->for_you_reason,
        ]);

        $book->themes()->attach($request->themes);

        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $themes = Theme::all();
        $selectedThemes = $book->themes->pluck('id')->toArray();

        return view('admin.books.edit', compact('book', 'themes', 'selectedThemes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'cover_image' => 'nullable|image|max:2048',
            'description' => 'required|string',
            'for_you_reason' => 'required|string',
            'themes' => 'required|array',
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('books', 'public');
            $book->cover_image = $path;
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'for_you_reason' => $request->for_you_reason,
        ]);

        $book->themes()->sync($request->themes);

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}

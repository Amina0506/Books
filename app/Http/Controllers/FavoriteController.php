<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Book $book)
    {
        Favorite::firstOrCreate([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
        ]);

        return redirect()->route('profile.show', auth()->id());
    }

    public function destroy(Favorite $favorite)
    {
        if ($favorite->user_id !== auth()->id()) {
            abort(403);
        }

        $favorite->delete();

        return redirect()->back()->with('status', 'Favorite removed');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Theme;
use Illuminate\Http\Request;

class ForYouController extends Controller
{
    public function index(Request $request)
    {
        $themes = Theme::all();

        if ($request->theme) {
            //boeken van bepaalde thema tonen
            $theme = Theme::find($request->theme);
            $books = $theme ? $theme->books : collect();
        } else {
            $books = Book::all();
        }

        return view('for-you.index', compact('books', 'themes'));
    }
}

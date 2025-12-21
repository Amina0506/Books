<?php

namespace App\Http\Controllers;

use App\Models\AdminNews;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = AdminNews::latest()->get();

        return view('pages.nieuws', compact('news'));
    }

}

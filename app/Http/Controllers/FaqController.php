<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index() {
        $faqs = Faq::with('category')->get();
        return view('pages.faq', compact('faqs'));
    }

    public function show(Faq $faq) {
        return view('pages.faq', compact('faq'));
    }

}

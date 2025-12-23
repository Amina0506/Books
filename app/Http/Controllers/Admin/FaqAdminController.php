<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqAdminController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::with('category')->get();
        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            'faq_category_id' => 'required|exists:faq_categories,id',
        ]);

        Faq::create($request->all());

        return redirect()->route('faq.index')->with('success', 'Question added successfully');
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
    public function edit(Faq $faq)
    {
        $categories = FaqCategory::all();
        return view('admin.faq.edit', compact('faq', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            'faq_category_id' => 'required|exists:faq_categories,id',
        ]);

        $faq->update($request->all());

        return redirect()->route('faq.index')->with('success', 'Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'Question deleted successfully');
    }
}

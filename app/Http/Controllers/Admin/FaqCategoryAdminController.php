<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryAdminController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.faq_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.faq.faq_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:faq_categories,name|max:255',
        ]);

        FaqCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('faq-category.index')->with('success', 'Category added');
    }

    public function edit(FaqCategory $faqCategory)
    {
        return view('admin.faq.faq_categories.edit', compact('faqCategory'));
    }

    public function update(Request $request, FaqCategory $faqCategory)
    {
        $request->validate([
            'name' => 'required|unique:faq_categories,name,' . $faqCategory->id . '|max:255',
        ]);

        $faqCategory->update([
            'name' => $request->name,
        ]);

        return redirect()->route('faq-category.index')->with('success', 'Category updated');
    }

    public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();

        return redirect()->route('faq-category.index')->with('success', 'Category deleted!');
    }


}

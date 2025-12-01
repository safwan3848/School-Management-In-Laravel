<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->paginate(5);
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
            'status' => 'required|in:0,1'
        ]);

        Faq::create($request->only('question', 'answer', 'status'));

        return redirect()->route('faq.index')->with('success', 'FAQ Added Successfully!');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
            'status' => 'required|in:0,1'
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($request->only('question', 'answer', 'status'));

        return redirect()->route('faq.index')->with('success', 'FAQ Updated Successfully!');
    }

    public function delete($id)
    {
        Faq::findOrFail($id)->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ Deleted Successfully!');
    }

    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.show', compact('faq'));
    }
}

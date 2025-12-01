<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopManagement;
use Illuminate\Http\Request;

class TopManagementController extends Controller
{
    public function index()
    {
        $managements = TopManagement::latest()->paginate(10);
        return view('admin.top_management.index', compact('managements'));
    }

    public function create()
    {
        return view('admin.top_management.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'message' => 'nullable',
            'status' => 'required',
            'photo' => 'nullable',
        ]);

        // Check if file is uploaded
        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/top_management'), $imageName);
        }
        TopManagement::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'message' => $request->message,
            'photo' => $imageName,
            'status' => $request->status
        ]);

        return redirect()->route('management.index')->with('success', 'Management added successfully');
    }

    public function show($id)
    {
        $managements = TopManagement::findOrFail($id);
        return view('admin.top_management.show', compact('managements'));
    }

    public function edit($id)
    {
        $managements = TopManagement::findOrFail($id);
        return view('admin.top_management.edit', compact('managements'));
    }

    public function update(Request $request, $id)
    {
        $managements = TopManagement::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'message' => 'nullable',
            'status' => 'required',
            'photo' => 'nullable|image|max:2048',
        ]);

        $imageName = $managements->photo;

        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/top_management'), $imageName);
        }

        $managements->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'message' => $request->message,
            'photo' => $imageName,
            'status' => $request->status
        ]);

        return redirect()->route('management.index')->with('success', 'Management updated successfully');
    }

    public function destroy($id)
    {
        $managements = TopManagement::findOrFail($id);

        if ($managements->photo && file_exists(public_path('uploads/top_management/' . $managements->photo))) {
            unlink(public_path('uploads/top_management/' . $managements->photo));
        }

        $managements->delete();

        return redirect()->route('management.index')->with('success', 'Management deleted successfully');
    }
}

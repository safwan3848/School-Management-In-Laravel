<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopManagement;
use Illuminate\Http\Request;
use Spatie\Image\Image;

class TopManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = TopManagement::select('id', 'name', 'designation', 'photo', 'status');

        // Search by name / designation
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('designation', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $managements = $query->orderByDesc('id')->paginate(10);
        $managements->appends($request->all());

        return view('admin.top_management.index', compact('managements'));
    }

    public function create()
    {
        return view('admin.top_management.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'message'     => 'nullable|string',
            'status'      => 'required|in:0,1',
            'photo'       => 'nullable|image|max:2048',
        ]);

        $imageName = null;

        // Upload + Optimize
        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();

            Image::load($request->photo->path())
                ->quality(75)
                ->width(800)
                ->optimize()
                ->save(public_path("uploads/top_management/" . $imageName));
        }

        TopManagement::create([
            'name'        => $request->name,
            'designation' => $request->designation,
            'message'     => $request->message,
            'photo'       => $imageName,
            'status'      => $request->status
        ]);

        return redirect()->route('management.index')->with('success', 'Management added successfully');
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
            'name'        => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'message'     => 'nullable|string',
            'status'      => 'required|in:0,1',
            'photo'       => 'nullable|image|max:2048',
        ]);

        $imageName = $managements->photo;

        // If new image uploaded
        if ($request->hasFile('photo')) {

            // Delete old
            $oldPath = public_path('uploads/top_management/' . $managements->photo);
            if ($managements->photo && file_exists($oldPath)) {
                unlink($oldPath);
            }

            // Upload + optimize new
            $imageName = time() . '.' . $request->photo->extension();

            Image::load($request->photo->path())
                ->quality(75)
                ->width(800)
                ->optimize()
                ->save(public_path("uploads/top_management/" . $imageName));
        }

        $managements->update([
            'name'        => $request->name,
            'designation' => $request->designation,
            'message'     => $request->message,
            'photo'       => $imageName,
            'status'      => $request->status
        ]);

        return redirect()->route('management.index')->with('success', 'Management updated successfully');
    }

    public function destroy($id)
    {
        $managements = TopManagement::findOrFail($id);

        $imagePath = public_path('uploads/top_management/' . $managements->photo);

        if ($managements->photo && file_exists($imagePath)) {
            unlink($imagePath);
        }

        $managements->delete();

        return redirect()->route('management.index')->with('success', 'Management deleted successfully');
    }
}

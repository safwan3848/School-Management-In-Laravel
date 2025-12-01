<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(5);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'title' => 'nullable|string|max:255',
            'status' => 'required|in:0,1'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/gallery'), $imageName);

        Gallery::create([
            'image' => 'uploads/gallery/' . $imageName,
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()->route('gallery.index')->with('success', 'Image added successfully!');
    }

    public function delete($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Delete file from folder
        if (file_exists(public_path($gallery->image))) {
            unlink(public_path($gallery->image));
        }

        // Delete record
        $gallery->delete();

        return back()->with('success', 'Image deleted successfully!');
    }

    public function bulkCreate()
    {
        return view('admin.gallery.bulk_create');
    }

    public function bulkStore(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|max:4096',
            'status' => 'required|in:0,1'
        ]);

        foreach ($request->file('images') as $img) {

            $imageName = time() . '-' . uniqid() . '.' . $img->extension();
            $img->move(public_path('uploads/gallery'), $imageName);

            Gallery::create([
                'image' => 'uploads/gallery/' . $imageName,
                'title' => null,
                'status' => $request->status
            ]);
        }

        return redirect()->route('gallery.index')->with('success', 'Images uploaded successfully!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Spatie\Image\Image;

class GalleryController extends Controller
{
    private $uploadPath = 'uploads/gallery/';

    public function index(Request $request)
    {
        $query = Gallery::select('id', 'title', 'image', 'status');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $galleries = $query->orderByDesc('id')->paginate(5);
        $galleries->appends($request->all());

        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:4096',
            'title' => 'nullable|string|max:255',
            'status' => 'required|in:0,1'
        ]);

        $imageName = $this->processImage($request->file('image'));

        Gallery::create([
            'image' => $imageName,
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()->route('gallery.index')->with('success', 'Image added successfully!');
    }

    public function delete($id)
    {
        $gallery = Gallery::findOrFail($id);

        $this->deleteImage($gallery->image);

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

        foreach ($request->file('images') as $image) {
            $imageName = $this->processImage($image);

            Gallery::create([
                'image' => $imageName,
                'title' => null,
                'status' => $request->status
            ]);
        }

        return redirect()->route('gallery.index')->with('success', 'Images uploaded successfully!');
    }

    /**
     * ------------------------------
     * Helper: Optimize + Save Image
     * ------------------------------
     */
    private function processImage($image)
    {
        $imageName = time() . '-' . uniqid() . '.' . $image->extension();
        $fullPath = public_path($this->uploadPath . $imageName);

        // Ensure folder exists
        if (!is_dir(public_path($this->uploadPath))) {
            mkdir(public_path($this->uploadPath), 0755, true);
        }

        // Optimize image using Spatie
        Image::load($image->path())
            ->quality(75)
            ->width(1920)
            ->optimize()
            ->save($fullPath);

        return $imageName;
    }

    /**
     * ------------------------------
     * Helper: Delete image from folder
     * ------------------------------
     */
    private function deleteImage($imageName)
    {
        $imagePath = public_path($this->uploadPath . $imageName);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}

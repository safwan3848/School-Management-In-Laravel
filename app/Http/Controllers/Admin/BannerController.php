<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Spatie\Image\Image;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->paginate(5);
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'status' => 'required'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        Image::load($request->image->path())
            ->quality(75)
            ->width(1920)
            ->optimize()
            ->save(public_path("uploads/banner/" . $imageName));

        Banner::create([
            'title' => $request->title,
            'image' => $imageName,
            'status' => $request->status
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner added successfully');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image',
            'status' => 'required'
        ]);

        $banner = Banner::findOrFail($id);

        $imageName = $banner->image;

        if ($request->hasFile('image')) {

            // Delete old file if exists
            $oldPath = public_path('uploads/banner/' . $banner->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            // Create new optimized file name
            $imageName = time() . '.' . $request->image->extension();

            // Optimize new image (Spatie)
            Image::load($request->file('image'))
                ->quality(75)
                ->width(1920)
                ->optimize()
                ->save(public_path('uploads/banner/' . $imageName));
        }

        $banner->update([
            'title' => $request->title,
            'image' => $imageName,
            'status' => $request->status
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner updated successfully');
    }

    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        $imagePath = public_path('uploads/banner/' . $banner->image);

        // Delete image if it exists
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner deleted successfully');
    }
}

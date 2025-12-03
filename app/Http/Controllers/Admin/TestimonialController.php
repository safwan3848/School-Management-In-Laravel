<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Spatie\Image\Image;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(5);
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $backgroundImage = time() . '.' . $request->background_image->extension();
        list($bgWidth) = getimagesize($request->background_image->path());
        $bg = Image::load($request->background_image->path());

        if ($bgWidth > 1920) {
            $bg->width(1920);
        }
        $bg->quality(65) // lower quality reduces file size drastically
            ->save(public_path("uploads/testimonials/backgroundImage/" . $backgroundImage));

        $userImage = time() . '.' . $request->image->extension();
        list($imgWidth) = getimagesize($request->image->path());
        $img = Image::load($request->image->path());

        if ($imgWidth > 800) {
            $img->width(800);
        }
        $img->quality(65)
            ->save(public_path("uploads/testimonials/userImage/" . $userImage));

        Testimonial::create([
            'title' => $request->title,
            'image' => $userImage,
            'description' => $request->description,
            'background_image' => $backgroundImage,
            'status' => $request->status
        ]);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial created successfully!');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image',
            'background_image' => 'image',
            'description' => 'required',
            'status' => 'required',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        $userImage = $testimonial->image;
        $backgroundImage = $testimonial->background_image;

        if ($request->hasFile('image')) {

            // Delete old user image
            $oldUserPath = public_path('uploads/testimonials/userImage/' . $userImage);
            if (file_exists($oldUserPath)) unlink($oldUserPath);

            // Get original width
            list($imgWidth) = getimagesize($request->image->path());

            $userImageName = time() . '.' . $request->image->extension();

            $img = Image::load($request->image->path());

            // Resize only if bigger than 800px
            if ($imgWidth > 800) {
                $img->width(800);
            }

            $img->quality(65)
                ->save(public_path('uploads/testimonials/userImage/' . $userImageName));

            $userImage = $userImageName;
        }

        if ($request->hasFile('background_image')) {

            // Delete old background image
            $oldBgPath = public_path('uploads/testimonials/backgroundImage/' . $backgroundImage);
            if (file_exists($oldBgPath)) unlink($oldBgPath);

            // Get original width
            list($bgWidth) = getimagesize($request->background_image->path());

            $backgroundImageName = time() . '.' . $request->background_image->extension();

            $bg = Image::load($request->background_image->path());

            // Resize only if bigger than 1920px
            if ($bgWidth > 1920) {
                $bg->width(1920);
            }

            $bg->quality(65)
                ->save(public_path('uploads/testimonials/backgroundImage/' . $backgroundImageName));

            $backgroundImage = $backgroundImageName;
        }

        $testimonial->update([
            'title' => $request->title,
            'image' => $userImage,
            'background_image' => $backgroundImage,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial updated successfully!');
    }


    public function delete($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // delete files if exist
        if ($testimonial->image && file_exists(public_path('uploads/testimonials/userImage/' . $testimonial->image))) {
            @unlink(public_path('uploads/testimonials/userImage/' . $testimonial->image));
        }
        if ($testimonial->background_image && file_exists(public_path('uploads/testimonials/backgroundImage/' . $testimonial->background_image))) {
            @unlink(public_path('uploads/testimonials/backgroundImage/' . $testimonial->background_image));
        }

        $testimonial->delete();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial Deleted successfully!');
    }
}

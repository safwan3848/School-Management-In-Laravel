<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

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
        $request->background_image->move(public_path('uploads/testimonials/backgroundImage'), $backgroundImage);

        $userImage = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/testimonials/userImage'), $userImage);

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
            'description' => 'required',
            'status' => 'required'

        ]);

        $testimonial = Testimonial::findOrFail($id);

        $userImage = $testimonial->image;
        $backgroundImage = $testimonial->background_image;


        if ($request->hasFile('image')) {
            $userImage = time() . '_user.' . $request->image->extension();
            $request->image->move(public_path('uploads/testimonials/userImage'), $userImage);
        }

        // Update background image
        if ($request->hasFile('background_image')) {
            $backgroundImage = time() . '_bg.' . $request->background_image->extension();
            $request->background_image->move(public_path('uploads/testimonials/backgroundImage'), $backgroundImage);
        }

        $testimonial->update([
            'title' => $request->title,
            'image' => $userImage,
            'background_image' => $backgroundImage,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial Updated successfully!');
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

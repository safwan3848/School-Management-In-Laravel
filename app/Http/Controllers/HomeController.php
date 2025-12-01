<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $banners = Banner::where('status', 1)->orderBy('id', 'DESC')->get();
        $testimonials = Testimonial::where('status', 1)->orderBy('id', 'DESC')->get();
        $galleries = Gallery::where('status', 1)->get();
        return view('home.index', compact('banners', 'testimonials', 'galleries'));
    }
}

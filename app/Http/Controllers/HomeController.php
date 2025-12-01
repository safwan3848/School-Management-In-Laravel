<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $banners = Banner::where('status', 1)->orderBy('id', 'DESC')->get();
        $testimonials = Testimonial::where('status', 1)->orderBy('id', 'DESC')->get();
        $galleries = Gallery::where('status', 1)->orderBy('id', 'DESC')->get();
        $faqs = Faq::where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();

        return view('home.index', compact('banners', 'testimonials', 'galleries', 'faqs'));
    }
}

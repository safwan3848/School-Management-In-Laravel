<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Career;
use App\Models\Contact;
use App\Models\TeacherJob;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $models = [
            'bannerCount'  => Banner::class,
            'careerCount'  => Career::class,
            'jobCount'     => TeacherJob::class,
            'contactCount' => Contact::class,
        ];

        $data = array_map(fn($model) => $model::count(), $models);

        return view('admin.layout', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\CareerApplicationMail;
use App\Models\Career;
use App\Models\TeacherJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CareerController extends Controller
{
    public function index()
    {
        $jobs = TeacherJob::orderBy('id', 'DESC')->paginate(5);
        return view('home.career', compact('jobs'));
    }

    public function apply(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'other_docs' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        // $data = $request->only([
        //     'name',
        //     'email',
        //     'phone',
        //     'dob',
        //     'gender',
        //     'address',
        //     'position',
        //     'highest_qualification',
        //     'experience',
        //     'subjects',
        //     'preferred_grade',
        //     'expected_salary',
        //     'availability',
        //     'message'
        // ]);

        $career = new Career();
        $career->fill($request->except(['resume', 'photo', 'other_docs']));

        // File uploads
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumeName = time() . '_resume.' . $resume->getClientOriginalExtension();
            $resume->move(public_path('uploads/career/resume'), $resumeName);
            $career->resume_path = $resumeName;
        }

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_photo.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/career/photo'), $photoName);
            $career->photo_path = $photoName;
        }

        if ($request->hasFile('other_docs')) {
            $docs = $request->file('other_docs');
            $docsName = time() . '_docs.' . $docs->getClientOriginalExtension();
            $docs->move(public_path('uploads/career/otherdoc'), $docsName);
            $career->other_docs_path = $docsName;
        }

        // dd($data);
        $career->save();
        Mail::to('admin@example.com')->send(new CareerApplicationMail($career));

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

    public function jobDetails($id)
    {
        $job = TeacherJob::findOrFail($id);

        return response()->json([
            'title' => $job->title,
            'description' => $job->description
        ]);
    }
}

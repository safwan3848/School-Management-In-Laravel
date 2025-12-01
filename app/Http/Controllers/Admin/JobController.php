<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeacherJob;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = TeacherJob::latest()->get();
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    // Store job
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'department' => 'required',
            'location' => 'required',
            'description' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);

        // dd($request->all());
        TeacherJob::create($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job created successfully');
    }

    // Edit form
    public function edit($id)
    {
        $job = TeacherJob::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'department' => 'required',
            'location' => 'required',
            'description' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);
        $job = TeacherJob::findOrFail($id);
        $job->update($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    }

    // Delete
    public function destroy($id)
    {
        $job = TeacherJob::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully');
    }
}

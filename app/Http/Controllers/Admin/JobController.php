<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeacherJob;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = TeacherJob::select('id', 'title', 'department', 'location', 'type', 'status');

        // Search
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter: Department
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Filter: Type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter: Location
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // Filter: Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Pagination (with query strings)
        $jobs = $query->orderByDesc('id')->paginate(10);
        $jobs->appends($request->all());

        // Dropdown filter values
        $departments = TeacherJob::select('department')->distinct()->pluck('department');
        $types       = TeacherJob::select('type')->distinct()->pluck('type');
        $locations   = TeacherJob::select('location')->distinct()->pluck('location');

        return view('admin.jobs.index', compact('jobs', 'departments', 'types', 'locations'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        TeacherJob::create($data);

        return redirect()->route('jobs.index')
            ->with('success', 'Job created successfully');
    }

    public function edit($id)
    {
        $job = TeacherJob::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = TeacherJob::findOrFail($id);
        $data = $this->validateData($request);

        $job->update($data);

        return redirect()->route('jobs.index')
            ->with('success', 'Job updated successfully');
    }

    public function destroy($id)
    {
        $job = TeacherJob::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.index')
            ->with('success', 'Job deleted successfully');
    }

    private function validateData(Request $request)
    {
        return $request->validate([
            'title'       => 'required|string|max:255',
            'department'  => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'description' => 'required|string',
            'type'        => 'required|string|max:255',
            'status'      => 'required|in:0,1',
        ]);
    }
}

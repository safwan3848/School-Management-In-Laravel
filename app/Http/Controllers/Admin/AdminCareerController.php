<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class AdminCareerController extends Controller
{
    public function index()
    {
        $applications = Career::orderBy('id', 'desc')->paginate(1);
        return view('admin.career.index', compact('applications'));
    }

    public function show($id)
    {
        $career = Career::findOrFail($id);
        return view('admin.career.show', compact('career'));
    }

    public function updateStatus(Request $request, $id)
    {
        $application = Career::findOrFail($id);
        $application->status = $request->status;
        // dd($application->status);
        $application->save();

        return redirect()->route('career.index')
            ->with('success', 'Status updated successfully!');
    }
}

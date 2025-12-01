@extends('admin.layout')

@section('title', 'Career Detail')

@section('content')

<div class="card shadow">
    <div class="card-header">
        <h4>Application #{{ $career->id }}</h4>
    </div>

    <div class="card-body">

        <h5>Personal Details</h5>
        <p><strong>Name:</strong> {{ $career->name }}</p>
        <p><strong>Email:</strong> {{ $career->email }}</p>
        <p><strong>Phone:</strong> {{ $career->phone }}</p>
        <p><strong>DOB:</strong> {{ $career->dob }}</p>
        <p><strong>Gender:</strong> {{ $career->gender }}</p>
        <p><strong>Address:</strong> {{ $career->address }}</p>

        <hr>

        <h5>Job & Qualification</h5>
        <p><strong>Position:</strong> {{ $career->position }}</p>
        <p><strong>Qualification:</strong> {{ $career->highest_qualification }}</p>
        <p><strong>Experience:</strong> {{ $career->experience }} years</p>
        <p><strong>Subjects:</strong> {{ $career->subjects }}</p>
        <p><strong>Preferred Grade:</strong> {{ $career->preferred_grade }}</p>
        <p><strong>Expected Salary:</strong> {{ $career->expected_salary }}</p>
        <p><strong>Availability:</strong> {{ $career->availability }}</p>

        <hr>

        <h5>Documents</h5>
        <p>
            <a href="{{ asset('uploads/career/resume/' . $career->resume_path) }}" target="_blank" class="btn btn-primary btn-sm">Download Resume</a>
        </p>

        @if($career->photo_path)
            <img src="{{ asset('uploads/career/photo/' . $career->photo_path) }}" width="150" class="img-thumbnail mb-3">
        @endif

        @if($career->other_docs_path)
            <p>
                <a href="{{ asset('uploads/career/otherdocs/' . $career->other_docs_path) }}" target="_blank" class="btn btn-secondary btn-sm">Download Other Document</a>
            </p>
        @endif

        <hr>

        <h5>Status Update</h5>
        <form action="{{ route('career.updateStatus', $career->id) }}" method="POST">
            @csrf
            <select name="status" class="form-control w-25 d-inline">
                <option value="new" {{ $career->status=='new' ? 'selected' : '' }}>New</option>
                <option value="reviewed" {{ $career->status=='reviewed' ? 'selected' : '' }}>Reviewed</option>
                <option value="rejected" {{ $career->status=='rejected' ? 'selected' : '' }}>Rejected</option>
                <option value="hired" {{ $career->status=='hired' ? 'selected' : '' }}>Hired</option>
            </select>

            <button class="btn btn-success btn-sm">Update</button>
        </form>

    </div>
</div>

@endsection

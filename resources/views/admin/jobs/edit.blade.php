@extends('admin.layout')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h4>Edit Job</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('jobs.update', $job->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Job Title*</label>
                    <input type="text" name="title" class="form-control" value="{{ $job->title }}" required>
                </div>

                <div class="form-group">
                    <label>Department</label>
                    <input type="text" name="department" class="form-control" value="{{ $job->department }}">
                </div>

                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" value="{{ $job->location }}">
                </div>

                <div class="form-group">
                    <label>Job Type</label>
                    <select name="type" class="form-control">
                        <option value="Full-Time" {{ $job->type == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                        <option value="Part-Time" {{ $job->type == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5">{{ $job->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $job->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $job->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary">Update</button>

            </form>

        </div>

    </div>
@endsection

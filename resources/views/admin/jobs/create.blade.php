@extends('admin.layout')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h4>Add Job</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('jobs.store') }}">
                @csrf

                <div class="form-group">
                    <label>Job Title*</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Department</label>
                    <input type="text" name="department" class="form-control">
                </div>

                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control">
                </div>

                <div class="form-group">
                    <label>Job Type</label>
                    <select name="type" class="form-control">
                        <option value="Full-Time">Full-Time</option>
                        <option value="Part-Time">Part-Time</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Create</button>

            </form>

        </div>
    </div>
@endsection

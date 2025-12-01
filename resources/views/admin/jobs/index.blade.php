@extends('admin.layout')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h4>
                Job List
                <a href="{{ route('jobs.create') }}" class="btn btn-primary btn-sm float-right">Add Job</a>
            </h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Job Title</th>
                        <th>Department</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->department }}</td>
                            <td>{{ $job->location }}</td>
                            <td>{{ $job->type }}</td>
                            <td>
                                <span class="badge badge-{{ $job->status ? 'success' : 'danger' }}">
                                    {{ $job->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <a href="{{ route('jobs.delete', $job->id) }}" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this job?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
@endsection

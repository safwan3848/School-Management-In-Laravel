@extends('admin.layout')

@section('title', 'Jobs')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between">
            <h4>Job List</h4>
            <a href="{{ route('jobs.create') }}" class="btn btn-primary btn-sm">Add Job</a>
        </div>

        <div class="card-body">

            <!-- Search + Filters -->
            <form method="GET" action="{{ route('jobs.index') }}" class="mb-3">
                <div class="row">

                    <!-- Search -->
                    <div class="col-md-3">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Search by title, dept, location">
                    </div>

                    <!-- Department Filter -->
                    <div class="col-md-2">
                        <select name="department" class="form-control">
                            <option value="">All Departments</option>
                            @foreach ($departments as $d)
                                <option value="{{ $d }}" {{ request('department') == $d ? 'selected' : '' }}>
                                    {{ $d }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Type Filter -->
                    <div class="col-md-2">
                        <select name="type" class="form-control">
                            <option value="">All Types</option>
                            @foreach ($types as $t)
                                <option value="{{ $t }}" {{ request('type') == $t ? 'selected' : '' }}>
                                    {{ ucfirst($t) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Location Filter -->
                    <div class="col-md-2">
                        <select name="location" class="form-control">
                            <option value="">All Locations</option>
                            @foreach ($locations as $loc)
                                <option value="{{ $loc }}" {{ request('location') == $loc ? 'selected' : '' }}>
                                    {{ $loc }}
                                </option>
                            @endforeach
                        </select>

                    </div>
<div class="col-md-3">
                <select name="status" class="form-control">
                    <option value="">All Status</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
                    <div class="col-md-2">
                        <button class="btn btn-success">Filter</button>
                        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>

            <!-- Job Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Department</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jobs as $job)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->department }}</td>
                                <td>{{ $job->location }}</td>
                                <td>{{ ucfirst($job->type) }}</td>
                                <td>
                                    <span class="badge badge-{{ $job->status ? 'success' : 'danger' }}">
                                        {{ $job->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-sm btn-info">Edit</a>

                                    <form action="{{ route('jobs.delete', $job->id) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Delete job?')" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No jobs found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $jobs->links() }}
            </div>

        </div>
    </div>

@endsection

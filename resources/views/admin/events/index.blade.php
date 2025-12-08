@extends('admin.layout')

@section('title', 'Events List')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="m-0 font-weight-bold text-primary">Events List</h6>

            <a href="{{ route('events.create') }}" class="btn btn-primary btn-sm">Add Event</a>
        </div>

        <div class="card-body">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Filters --}}
            <form method="GET" action="{{ route('events.index') }}" class="mb-3">

                <div class="row">

                    {{-- Search --}}
                    <div class="col-md-4 mb-2">
                        <input type="text" name="search" class="form-control" placeholder="Search by title"
                            value="{{ request('search') }}">
                    </div>

                    {{-- Status Filter --}}
                    <div class="col-md-3 mb-2">
                        <select name="status" class="form-control">
                            <option value="">Status (All)</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    {{-- Filter Buttons --}}
                    <div class="col-md-3 mb-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('events.index') }}" class="btn btn-secondary">Reset</a>
                    </div>

                </div>

            </form>

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">

                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Date & Time</th>
                            <th>Attendees</th>
                            <th>Status</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($events as $event)
                            <tr>

                                <td>{{ $event->id }}</td>

                                <td>
                                    @if ($event->image)
                                        <img src="{{ asset('uploads/events/' . $event->image) }}" width="80"
                                            height="60" class="rounded" style="object-fit: cover;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td>{{ $event->title }}</td>

                                <td>{{ \Carbon\Carbon::parse($event->event_datetime)->format('F d, Y h:i A') }}</td>

                                <td>{{ $event->attendees }}</td>

                                <td>
                                    @if ($event->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('events.edit', $event->id) }}"
                                        class="btn btn-warning btn-sm me-1">Edit</a>

                                    <a href="{{ route('events.destroy', $event->id) }}"
                                        onclick="return confirm('Are you sure you want to delete this event?')"
                                        class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center text-danger">
                                    No events found!
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <div class="mt-3">
        {{ $events->links('pagination::bootstrap-5') }}
    </div>

@endsection

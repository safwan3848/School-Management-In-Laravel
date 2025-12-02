@extends('admin.layout')

@section('title', 'Events List')

@section('content')
    <div class="card shadow mb-4">

        <div class="card-header d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Events</h6>
            <a href="{{ route('events.create') }}" class="btn btn-primary btn-sm">Add Event</a>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Time</th>
                        <th>Attendees</th>
                        <th>Status</th>
                        <th width="240">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>

                            <td>
                                @if ($event->image)
                                    <img src="{{ asset('uploads/events/' . $event->image) }}" width="70" height="50"
                                        style="object-fit: cover;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            <td>{{ $event->title }}</td>

                            <td>{{ \Carbon\Carbon::parse($event->event_datetime)->format('F d, Y h:i A') }}
                            </td>
                            <td>{{ $event->attendees }}</td>
                            <td>
                                <span class="badge badge-{{ $event->status ? 'success' : 'danger' }}">
                                    {{ $event->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td>
                                {{-- SHOW BUTTON --}}
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm me-2">Show</a>

                                {{-- EDIT BUTTON --}}
                                <a href="{{ route('events.edit', $event->id) }}"
                                    class="btn btn-warning btn-sm me-2">Edit</a>

                                {{-- DELETE BUTTON --}}
                                <a href="{{ route('events.destroy', $event->id) }}" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this event?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $events->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

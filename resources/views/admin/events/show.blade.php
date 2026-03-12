@extends('admin.layout')

@section('title', 'Event Details')

@section('content')
    <div class="card shadow mb-4">

        <div class="card-header d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Event Details</h6>
            <a href="{{ route('events.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">
                    @if ($event->image)
                        <img src="{{ asset('uploads/events/' . $event->image) }}" class="img-fluid rounded shadow">
                    @else
                        <div class="alert alert-info">No Image Uploaded</div>
                    @endif
                </div>

                <div class="col-md-8">
                    <h4>{{ $event->title }}</h4>
                    <p><strong>Event DateTime:</strong>
                        {{ \Carbon\Carbon::parse($event->event_datetime)->format('F d, Y h:i A') }}</p>
                    <p><strong>Attendees:</strong> {{ $event->attendees }}</p>
                    <p><strong>Description:</strong></p>
                    <p>{{ $event->description }}</p>
                    <p>
                        <strong>Status:</strong>
                        <span class="badge badge-{{ $event->status ? 'success' : 'danger' }}">
                            {{ $event->status ? 'Active' : 'Inactive' }}
                        </span>
                    </p>
                </div>

            </div>

        </div>
    </div>
@endsection

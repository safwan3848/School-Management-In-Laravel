@extends('admin.layout')

@section('title', 'Edit Event')

@section('content')
    <div class="card shadow mb-4">

        <div class="card-header d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Event</h6>
            <a href="{{ route('events.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Please fix the errors below:</strong>
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6">
                        <label class="form-label">Event Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}"
                            required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Event Time</label>
                        <input type="datetime-local" name="event_datetime" class="form-control"
                            value="{{ date('Y-m-d\TH:i', strtotime($event->event_datetime)) }}">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label class="form-label">Attendees</label>
                        <input type="number" name="attendees" class="form-control"
                            value="{{ old('attendees', $event->attendees) }}" required>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">

                        @if ($event->image)
                            <img src="{{ asset('uploads/events/' . $event->image) }}" width="100" class="mt-2"
                                style="border-radius: 5px;">
                        @endif
                    </div>

                    <div class="col-md-12 mt-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $event->description) }}</textarea>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $event->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $event->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary mt-4">Update Event</button>

            </form>
        </div>
    </div>
@endsection

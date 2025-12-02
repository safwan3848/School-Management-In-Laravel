@extends('admin.layout')

@section('title', 'Add Event')

@section('content')
<div class="card shadow mb-4">

    <div class="card-header d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Add New Event</h6>
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

        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-md-6">
                    <label class="form-label">Event Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Date & Time (Combined)</label>
                    <input type="datetime-local" name="event_datetime" value="{{ old('event_datetime') }}" class="form-control" required>
                </div>

                <div class="col-md-6 mt-3">
                    <label class="form-label">Attendees</label>
                    <input type="number" name="attendees" class="form-control" value="{{ old('attendees') }}" required>
                </div>

                <div class="col-md-6 mt-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="col-md-12 mt-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>

                <div class="col-md-12 mt-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

            </div>

            <button class="btn btn-primary mt-4">Submit</button>

        </form>
    </div>
</div>
@endsection

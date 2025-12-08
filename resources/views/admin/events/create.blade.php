@extends('admin.layout')

@section('title', 'Add Event')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Add New Event</h6>
            <a href="{{ route('events.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <div class="card-body">

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Please fix the errors below:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    {{-- Event Title --}}
                    <div class="form-group mb-3 col-md-6">
                        <label><strong>Event Title</strong> <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    </div>

                    {{-- Date & Time --}}
                    <div class="form-group mb-3 col-md-6">
                        <label><strong>Date & Time</strong> <span class="text-danger">*</span></label>
                        <input type="datetime-local" name="event_datetime" class="form-control"
                            value="{{ old('event_datetime') }}" required>
                    </div>

                    {{-- Attendees --}}
                    <div class="form-group mb-3 col-md-6">
                        <label><strong>Attendees</strong> <span class="text-danger">*</span></label>
                        <input type="number" name="attendees" class="form-control" value="{{ old('attendees') }}" required>
                    </div>

                    {{-- Image --}}
                    <div class="form-group mb-3 col-md-6">
                        <label><strong>Event Image</strong></label>
                        <input type="file" name="image" id="imageInput" class="form-control">

                        {{-- Preview --}}
                        <img id="previewImage" class="mt-3 d-none rounded" style="width: 200px; height: auto;">
                    </div>

                    {{-- Description --}}
                    <div class="form-group mb-3 col-md-12">
                        <label><strong>Description</strong></label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                    </div>

                    {{-- Status --}}
                    <div class="form-group mb-3 col-md-12">
                        <label><strong>Status</strong></label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                </div>

                {{-- Buttons --}}
                <button class="btn btn-primary mt-2">Submit</button>
                <a href="{{ route('events.index') }}" class="btn btn-secondary mt-2">Cancel</a>

            </form>

        </div>
    </div>

    {{-- Image Preview Script --}}
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            let img = document.getElementById('previewImage');
            img.src = URL.createObjectURL(event.target.files[0]);
            img.classList.remove('d-none');
        });
    </script>

@endsection

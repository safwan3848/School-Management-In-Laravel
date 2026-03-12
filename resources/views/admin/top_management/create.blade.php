@extends('admin.layout')

@section('title', 'Add Top Management')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Add New Member</h6>
            <a href="{{ route('management.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <div class="card-body">

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('management.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    {{-- Name --}}
                    <div class="col-md-6 mb-3">
                        <label><strong>Name</strong> <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                    </div>

                    {{-- Designation --}}
                    <div class="col-md-6 mb-3">
                        <label><strong>Designation</strong> <span class="text-danger">*</span></label>
                        <input type="text" name="designation" value="{{ old('designation') }}" class="form-control"
                            required>
                    </div>

                    {{-- Message --}}
                    <div class="col-md-12 mb-3">
                        <label><strong>Message (optional)</strong></label>
                        <textarea name="message" rows="4" class="form-control">{{ old('message') }}</textarea>
                    </div>

                    {{-- Image Upload --}}
                    <div class="col-md-6 mb-3">
                        <label><strong>Profile Image</strong></label>
                        <input type="file" name="photo" id="imageInput" class="form-control">

                        {{-- Preview --}}
                        <img id="previewImage" class="mt-3 d-none rounded" style="width: 200px; height: auto;">
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mb-3">
                        <label><strong>Status</strong></label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                </div>

                <button class="btn btn-primary mt-2">Save</button>
                <a href="{{ route('management.index') }}" class="btn btn-secondary mt-2">Cancel</a>

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

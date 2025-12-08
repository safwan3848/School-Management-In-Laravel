@extends('admin.layout')

@section('title', 'Add Gallery')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Add New Gallery Image</h6>
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary btn-sm">Back</a>
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

            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Image Upload --}}
                <div class="form-group mb-3">
                    <label><strong>Image</strong> <span class="text-danger">*</span></label>
                    <input type="file" name="image" id="imageInput" class="form-control" required>

                    {{-- Preview --}}
                    <img id="previewImage" class="mt-3 d-none rounded" style="width: 200px; height: auto;">
                </div>

                {{-- Title --}}
                <div class="form-group mb-3">
                    <label><strong>Title (optional)</strong></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter image title">
                </div>

                {{-- Status --}}
                <div class="form-group mb-3">
                    <label><strong>Status</strong></label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                {{-- Buttons --}}
                <button class="btn btn-primary mt-2">Upload</button>
                <a href="{{ route('gallery.index') }}" class="btn btn-secondary mt-2">Cancel</a>

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

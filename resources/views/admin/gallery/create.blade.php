@extends('admin.layout')

@section('title', 'Add Gallery')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Image</h6>
        </div>

        <div class="card-body">

            {{-- Show Validation Errors --}}
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

                <div class="form-group">
                    <label>Image <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <label>Title (optional)</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary mt-3">Upload</button>
                <a href="{{ route('gallery.index') }}" class="btn btn-secondary mt-3 ml-2">Cancel</a>

            </form>

        </div>
    </div>

@endsection

@extends('admin.layout')

@section('title', 'Add Testimonial')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Testimonial</h6>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label>Background Image</label>
                    <input type="file" name="background_image" class="form-control">
                </div>

                <div class="form-group">
                    <label>User Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary">Save</button>
                <a href="{{ route('testimonial.index') }}" class="btn btn-secondary ml-2">Cancel</a>

            </form>
        </div>
    </div>

@endsection

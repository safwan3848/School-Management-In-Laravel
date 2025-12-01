@extends('admin.layout')

@section('title', 'Edit Testimonial')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Testimonial</h6>
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

            <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}

                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ $testimonial->title }}" required>
                </div>

                <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="4" required>{{ $testimonial->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Background Image</label><br>
                    @if ($testimonial->background_image)
                        <img src="{{ asset('uploads/testimonials/backgroundImage/' . $testimonial->background_image) }}"
                            width="120" class="mb-2">
                    @endif
                    <input type="file" name="background_image" class="form-control">
                </div>

                <div class="form-group">
                    <label>User Image</label><br>
                    @if ($testimonial->image)
                        <img src="{{ asset('uploads/testimonials/userImage/' . $testimonial->image) }}" width="120"
                            class="mb-2">
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" @if ($testimonial->status == 1) selected @endif>Active</option>
                        <option value="0" @if ($testimonial->status == 0) selected @endif>Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('testimonial.index') }}" class="btn btn-secondary ml-2">Cancel</a>

            </form>
        </div>
    </div>

@endsection

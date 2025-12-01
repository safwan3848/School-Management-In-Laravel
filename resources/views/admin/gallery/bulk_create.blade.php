@extends('admin.layout')

@section('title', 'Bulk Upload Gallery')

@section('content')

<div class="card shadow mb-4">

    <div class="card-header">
        <h4>Bulk Upload Images</h4>
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

        <form action="{{ route('gallery.bulk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Select Multiple Images <span class="text-danger">*</span></label>
                <input type="file" name="images[]" class="form-control" multiple required>
                <small class="text-muted">You can upload multiple images at once.</small>
            </div>

            <div class="form-group mt-2">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button class="btn btn-success mt-3">Upload All</button>
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary mt-3 ml-2">Cancel</a>

        </form>

    </div>
</div>

@endsection

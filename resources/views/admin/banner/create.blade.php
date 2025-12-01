@extends('admin.layout')

@section('content')

<h4>Add Banner</h4>

<form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Banner Title</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="form-group">
        <label>Banner Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection

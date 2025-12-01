@extends('admin.layout')

@section('content')

<h4>Edit Banner</h4>

<form method="POST" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Banner Title</label>
        <input type="text" name="title" class="form-control" value="{{ $banner->title }}">
    </div>

    <div class="form-group">
        <label>Current Image</label><br>
        <img src="{{ asset('uploads/banner/'.$banner->image) }}" width="150">
    </div>

    <div class="form-group">
        <label>New Image (optional)</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="1" @if($banner->status==1) selected @endif>Active</option>
            <option value="0" @if($banner->status==0) selected @endif>Inactive</option>
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
</form>

@endsection

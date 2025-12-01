@extends('admin.layout')

@section('title', 'Add Top Management')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Add New Member</h6>
            <a href="{{ route('management.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <div class="card-body">

            <form action="{{ route('management.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Designation</label>
                        <input type="text" name="designation" class="form-control" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Message</label>
                        <textarea name="message" rows="4" class="form-control"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Profile Image</label>
                        <input type="file" name="photo" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                </div>

                <button class="btn btn-primary">Save</button>

            </form>

        </div>

    </div>

@endsection

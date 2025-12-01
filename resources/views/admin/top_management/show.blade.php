@extends('admin.layout')

@section('title', 'Management Details')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow mb-4">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Management Details</h6>
                    <a href="{{ route('management.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>

                <div class="card-body">

                    <div class="text-center mb-4">
                        @if ($managements->photo)
                            <img src="{{ asset('uploads/top_management/' . $managements->photo) }}"
                                class="rounded-circle shadow" width="150">
                        @else
                            <p>No Image</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <h5>Name:</h5>
                        <p>{{ $managements->name }}</p>
                    </div>

                    <div class="mb-3">
                        <h5>Designation:</h5>
                        <p>{{ $managements->designation }}</p>
                    </div>

                    <div class="mb-3">
                        <h5>Short Message:</h5>
                        <p>{{ $managements->short_message }}</p>
                    </div>

                    <div class="mb-3">
                        <h5>Status:</h5>
                        @if ($managements->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection

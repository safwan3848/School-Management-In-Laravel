@extends('admin.layout')

@section('title', 'FAQ Details')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow mb-4">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">FAQ Details</h6>
                    <a href="{{ route('faq.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <h5 class="text-dark font-weight-bold">Question:</h5>
                        <p class="text-gray-800">{{ $faq->question }}</p>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <h5 class="text-dark font-weight-bold">Answer:</h5>
                        <p class="text-gray-800">{{ $faq->answer }}</p>
                    </div>

                    <div class="mb-3">
                        <h5 class="text-dark font-weight-bold">Status:</h5>

                        @if ($faq->status == 1)
                            <span class="badge badge-success px-3 py-2">Active</span>
                        @else
                            <span class="badge badge-danger px-3 py-2">Inactive</span>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

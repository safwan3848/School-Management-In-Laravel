@extends('admin.layout')

@section('title', 'Edit FAQ')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Edit FAQ</h6>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Question</label>
                    <input type="text" name="question" value="{{ $faq->question }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Answer</label>
                    <textarea name="answer" class="form-control" rows="4" required>{{ $faq->answer }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $faq->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $faq->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection

@extends('admin.layout')

@section('title', 'Add FAQ')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Add FAQ</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('faq.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Question</label>
                    <input type="text" name="question" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Answer</label>
                    <textarea name="answer" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

@endsection

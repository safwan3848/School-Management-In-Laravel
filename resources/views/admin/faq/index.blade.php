@extends('admin.layout')

@section('title', 'FAQ List')

@section('content')
    <div class="card shadow mb-4">

        <div class="card-header d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">FAQs</h6>
            <a href="{{ route('faq.create') }}" class="btn btn-primary btn-sm">Add FAQ</a>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Status</th>
                        <th width="240">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $faq)
                        <tr>
                            <td>{{ $faq->id }}</td>
                            <td>{{ $faq->question }}</td>
                            <td>{{ Str::limit($faq->answer, 40) }}</td>
                            <td>
                                <span class="badge badge-{{ $faq->status ? 'success' : 'danger' }}">
                                    {{ $faq->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>

                                {{-- SHOW BUTTON --}}
                                <a href="{{ route('faq.show', $faq->id) }}" class="btn btn-info btn-sm me-1">Show</a>

                                {{-- EDIT BUTTON --}}
                                <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>

                                {{-- DELETE BUTTON --}}
                                <a href="{{ route('faq.delete', $faq->id) }}" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this faq?')">
                                    Delete
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $faqs->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

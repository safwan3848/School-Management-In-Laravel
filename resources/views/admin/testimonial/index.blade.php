@extends('admin.layout')

@section('title', 'Testimonials List')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Testimonials List</h6>
            <a href="{{ route('testimonial.create') }}" class="btn btn-primary btn-sm">Add Testimonial</a>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>User Image</th>
                            <th>Background</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($testimonials as $item)
                            <tr>
                                <td>{{ $item->id }}</td>

                                <td>{{ $item->title }}</td>

                                <td>
                                    @if ($item->image)
                                        <img loading="lazy" src="{{ asset('uploads/testimonials/userImage/' . $item->image) }}"
                                            alt="{{ $item->title }}" width="100" height="50" class="rounded border">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($item->background_image)
                                        <img loading="lazy" src="{{ asset('uploads/testimonials/backgroundImage/' . $item->background_image) }}"
                                            alt="{{ $item->title }}" width="100" height="50" class="rounded border">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td>{{ Str::limit($item->description, 50) }}</td>

                                <td>
                                    <span class="badge badge-{{ $item->status ? 'success' : 'danger' }}">
                                        {{ $item->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('testimonial.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <a href="{{ route('testimonial.delete', $item->id) }}"
                                        onclick="return confirm('Are you sure you want to delete this testimonial?')"
                                        class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-danger py-3">
                                    No testimonials found!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <div class="mt-3">
        {{ $testimonials->links('pagination::bootstrap-5') }}
    </div>

@endsection

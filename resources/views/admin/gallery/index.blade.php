@extends('admin.layout')

@section('title', 'Gallery List')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Gallery List</h6>
            <a href="{{ route('gallery.create') }}" class="btn btn-primary btn-sm">Add Image</a>
            <a href="{{ route('gallery.bulk.create') }}" class="btn btn-success btn-sm ml-2">Bulk Upload</a>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($galleries as $item)
                            <tr>
                                <td>{{ $item->id }}</td>

                                <td>
                                    <img src="{{ asset($item->image) }}" width="80" height="60" class="rounded">
                                </td>

                                <td>{{ $item->title ?? '—' }}</td>

                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('gallery.delete', $item->id) }}"
                                        onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger">No gallery images found!</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <div class="mt-3">
        {{ $galleries->links('pagination::bootstrap-5') }}
    </div>

@endsection

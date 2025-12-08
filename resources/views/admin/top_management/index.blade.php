@extends('admin.layout')

@section('title', 'Top Management List')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Top Management</h6>
            <a href="{{ route('management.create') }}" class="btn btn-primary btn-sm">Add New</a>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- 🔍 Search + Filter Form -->
            <form method="GET" action="{{ route('management.index') }}" class="mb-3">
                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Search by name or designation">
                    </div>

                    <div class="col-md-3">
                        <select name="status" class="form-control">
                            <option value="">All Status</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-block">Filter</button>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('management.index') }}" class="btn btn-secondary btn-block">Reset</a>
                    </div>

                </div>
            </form>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="15%">Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Status</th>
                        <th width="18%">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($managements as $item)
                        <tr>
                            <td>{{ $loop->iteration + ($managements->currentPage() - 1) * $managements->perPage() }}</td>

                            <td>
                                @if ($item->photo)
                                    <img src="{{ asset('uploads/top_management/' . $item->photo) }}" width="80"
                                        class="rounded">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            <td>{{ $item->name }}</td>
                            <td>{{ $item->designation }}</td>

                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('management.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm mx-1">
                                        Edit
                                    </a>

                                    <a href="{{ route('management.delete', $item->id) }}"
                                        onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $managements->links() }}
            </div>

        </div>

    </div>

@endsection

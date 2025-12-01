@extends('admin.layout')

@section('title', 'Career Applications')

@section('content')

    <div class="card shadow">
        <div class="card-header">
            <h4>Career Applications</h4>
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
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($applications as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->position }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <form action="{{ route('career.updateStatus', $item->id) }}" method="POST">
                                    @csrf
                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                        <option value="new" {{ $item->status == 'new' ? 'selected' : '' }}>New</option>
                                        <option value="reviewed" {{ $item->status == 'reviewed' ? 'selected' : '' }}>Reviewed
                                        </option>
                                        <option value="rejected" {{ $item->status == 'rejected' ? 'selected' : '' }}>Rejected
                                        </option>
                                        <option value="hired" {{ $item->status == 'hired' ? 'selected' : '' }}>Hired
                                        </option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('career.show', $item->id) }}" class="btn btn-primary btn-sm">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $applications->links('pagination::bootstrap-5') }}

        </div>
    </div>

@endsection

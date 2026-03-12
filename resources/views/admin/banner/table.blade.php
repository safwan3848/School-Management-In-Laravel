<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Banner List</h6>
        <a href="{{ route('banner.create') }}" class="btn btn-primary btn-sm">Add Banner</a>
    </div>

    <div class="card-body">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Search & Filter Form --}}
        <form method="GET" class="mb-3 row g-2">
            <div class="col-md-4">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                    placeholder="Search by Title">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-control">
                    <option value="">All Status</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filter</button>

                <a href="{{ route('banner.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($banners as $banner)
                        <tr>
                            <td>{{ $banner->id }}</td>

                            <td>{{ $banner->title }}</td>

                            <td>
                                @if ($banner->image)
                                    <img src="{{ asset('uploads/banner/' . $banner->image) }}"
                                        alt="{{ $banner->title }}" width="80" height="40"
                                        class="rounded border" />
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            <td>
                                <span class="badge badge-{{ $banner->status ? 'success' : 'danger' }}">
                                    {{ $banner->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="{{ route('banner.delete', $banner->id) }}"
                                    onclick="return confirm('Are you sure you want to delete this banner?')"
                                    class="btn btn-danger btn-sm">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-danger py-3">
                                No banners found!
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>

{{-- Pagination --}}
<div class="mt-3">
    {{ $banners->appends(request()->query())->links('pagination::bootstrap-5') }}
</div>

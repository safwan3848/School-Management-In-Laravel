<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Banner List</h6>
        <a href="{{ route('banner.create') }}" class="btn btn-primary btn-sm">Add Banner</a>
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
                        <th>Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($banners as $banner)
                        <tr>
                            <td>{{ $banner->id }}</td>
                            <td>{{ $banner->title }}</td>
                            <td>
                                @if ($banner->image)
                                    <img src="{{ asset('uploads/banner/' . $banner->image) }}" width="80"
                                        height="40">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                @if ($banner->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('banner.edit', $banner->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('banner.delete', $banner->id) }}"
                                    onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger">No banners found!</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>
<div class="mt-3">
    {{ $banners->links('pagination::bootstrap-5') }}
</div>

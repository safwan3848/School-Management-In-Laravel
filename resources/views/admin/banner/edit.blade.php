@extends('admin.layout')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit Banner</h5>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
                @csrf

                {{-- Banner Title --}}
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Banner Title</label>
                    <input type="text" name="title" value="{{ old('title', $banner->title) }}"
                        class="form-control @error('title') is-invalid @enderror">

                    @error('title')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Current Image --}}
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Current Image</label><br>

                    <img src="{{ asset('uploads/banner/' . $banner->image) }}" width="150" height="80"
                        class="rounded border" alt="{{ $banner->title }}">
                </div>

                {{-- New Image --}}
                <div class="form-group mb-3">
                    <label class="font-weight-bold">New Image (optional)</label>
                    <input type="file" name="image" id="imageInput"
                        class="form-control @error('image') is-invalid @enderror" accept="image/*">

                    @error('image')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Preview New Image --}}
                <div class="mb-3">
                    <label class="font-weight-bold">Preview New Image</label>

                    <div id="previewBox"
                        style="
                        width: 100%;
                        max-width: 350px;
                        height: 180px;
                        border: 1px dashed #888;
                        border-radius: 6px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        overflow: hidden;
                        background: #f8f9fa;
                    ">
                        <span class="text-muted">No New Image Selected</span>
                    </div>
                </div>

                {{-- Status --}}
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">

                        <option value="1" {{ old('status', $banner->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0" {{ old('status', $banner->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>

                    @error('status')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary px-4">Update</button>
                <a href="{{ route('banner.index') }}" class="btn btn-secondary ml-2">Cancel</a>

            </form>

        </div>
    </div>

    {{-- Live Image Preview Script --}}
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const previewBox = document.getElementById('previewBox');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewBox.innerHTML = `<img src="${e.target.result}" style="
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 6px;
            ">`;
                };

                reader.readAsDataURL(file);

            } else {
                previewBox.innerHTML = `<span class="text-muted">No New Image Selected</span>`;
            }
        });
    </script>
@endsection

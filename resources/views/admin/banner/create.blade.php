@extends('admin.layout')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Add Banner</h5>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- Banner Title --}}
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Banner Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="form-control @error('title') is-invalid @enderror">

                    @error('title')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Banner Image --}}
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Banner Image</label>
                    <input type="file" name="image" id="imageInput"
                        class="form-control @error('image') is-invalid @enderror" accept="image/*">

                    @error('image')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Image Preview Box --}}
                <div class="mb-3">
                    <label class="font-weight-bold">Preview</label>
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
                        <span class="text-muted">No Image Selected</span>
                    </div>
                </div>

                {{-- Status --}}
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>

                    @error('status')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success px-4">Submit</button>

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
                previewBox.innerHTML = `<span class="text-muted">No Image Selected</span>`;
            }
        });
    </script>
@endsection

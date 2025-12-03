@extends('admin.layout')

@section('title', 'Add Testimonial')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Testimonial</h6>
        </div>

        <div class="card-body">

            <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Title --}}
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="form-control @error('title') is-invalid @enderror" required>
                    @error('title')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Description <span class="text-danger">*</span></label>
                    <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                {{-- User Image --}}
                <div class="form-group mb-3">
                    <label class="font-weight-bold">User Image</label>
                    <input type="file" name="image" id="userImageInput"
                        class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    @error('image')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                {{-- User Image Preview --}}
                <div class="mb-3">
                    <label class="font-weight-bold">User Image Preview</label>
                    <div id="userPreviewBox"
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

                {{-- Background Image --}}
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Background Image</label>
                    <input type="file" name="background_image" id="bgImageInput"
                        class="form-control @error('background_image') is-invalid @enderror" accept="image/*">
                    @error('background_image')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Background Image Preview --}}
                <div class="mb-3">
                    <label class="font-weight-bold">Background Image Preview</label>
                    <div id="bgPreviewBox"
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

                {{-- Buttons --}}
                <button type="submit" class="btn btn-success px-4">Submit</button>
                <a href="{{ route('testimonial.index') }}" class="btn btn-secondary ml-2">Cancel</a>

            </form>

        </div>
    </div>

    {{-- Live Image Preview Script --}}
    <script>
        function previewImage(inputId, previewBoxId) {
            const input = document.getElementById(inputId);
            const previewBox = document.getElementById(previewBoxId);

            input.addEventListener('change', function(event) {
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
        }

        previewImage('userImageInput', 'userPreviewBox');
        previewImage('bgImageInput', 'bgPreviewBox');
    </script>

@endsection

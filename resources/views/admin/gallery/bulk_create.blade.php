@extends('admin.layout')

@section('title', 'Bulk Upload Gallery')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="m-0">Bulk Upload Images</h4>
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <div class="card-body">

            {{-- Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('gallery.bulk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Drag & Drop Box --}}
                <div class="form-group mb-3">
                    <label><strong>Select Images</strong> <span class="text-danger">*</span></label>

                    <div id="dropZone" class="border border-primary rounded p-4 text-center"
                        style="cursor: pointer; background: #f8f9ff;">
                        <h6 class="text-muted mb-0">Drag & Drop Images Here<br>OR<br>Click to Select</h6>
                    </div>

                    <input type="file" name="images[]" id="imageInput" class="d-none" multiple required>
                    <small class="text-muted">You can upload multiple images at once.</small>
                </div>

                {{-- Preview Section --}}
                <div id="previewContainer" class="row mt-3"></div>

                {{-- Status --}}
                <div class="form-group mt-3">
                    <label><strong>Status</strong></label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                {{-- Buttons --}}
                <button class="btn btn-success mt-3">Upload All</button>
                <a href="{{ route('gallery.index') }}" class="btn btn-secondary mt-3 ml-2">Cancel</a>

            </form>

        </div>
    </div>

    {{-- SCRIPT: Preview and Drag Drop --}}
    <script>
        const dropZone = document.getElementById("dropZone");
        const input = document.getElementById("imageInput");
        const previewBox = document.getElementById("previewContainer");

        // Click to open uploader
        dropZone.addEventListener("click", () => input.click());

        // Drag Over
        dropZone.addEventListener("dragover", e => {
            e.preventDefault();
            dropZone.style.background = "#e3eaff";
        });

        dropZone.addEventListener("dragleave", () => {
            dropZone.style.background = "#f8f9ff";
        });

        // Drop images
        dropZone.addEventListener("drop", e => {
            e.preventDefault();
            dropZone.style.background = "#f8f9ff";

            let files = e.dataTransfer.files;
            input.files = files;
            showPreview(files);
        });

        // Preview on select
        input.addEventListener("change", function() {
            showPreview(this.files);
        });

        // Preview function
        function showPreview(files) {
            previewBox.innerHTML = "";

            Array.from(files).forEach((file, index) => {
                if (!file.type.startsWith("image/")) return;

                let reader = new FileReader();

                reader.onload = e => {
                    let col = document.createElement("div");
                    col.classList.add("col-md-3", "mb-3");

                    col.innerHTML = `
                    <div class="position-relative border rounded p-1">
                        <img src="${e.target.result}" class="w-100 rounded" style="height: 120px; object-fit: cover;">
                        <button type="button" class="btn btn-danger btn-sm position-absolute"
                            style="top: 5px; right: 5px;" onclick="removeImage(${index})">X</button>
                    </div>
                `;

                    previewBox.appendChild(col);
                };

                reader.readAsDataURL(file);
            });
        }

        // Remove preview image
        function removeImage(index) {
            const dt = new DataTransfer();
            let {
                files
            } = input;

            Array.from(files)
                .filter((_, i) => i !== index)
                .forEach(file => dt.items.add(file));

            input.files = dt.files;
            showPreview(dt.files);
        }
    </script>

@endsection

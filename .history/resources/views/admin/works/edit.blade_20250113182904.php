@extends('layouts.admin')

@section('title', 'Edit Work')

@section('content')
    <h1>Edit Work</h1>

    <form action="{{ route('admin.works.update', $work) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $work->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand', $work->brand) }}">
            @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="service_id" class="form-label">Service</label>
            <select class="form-control @error('service_id') is-invalid @enderror" id="service_id" name="service_id">
                <option value="">Select Service</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ old('service_id', $work->service_id) == $service->id ? 'selected' : '' }}>
                        {{ $service->title }}
                    </option>
                @endforeach
            </select>
            @error('service_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $work->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            @if($work->image)
                <div class="mb-2">
                    <img src="{{ asset('images/works/' . $work->image) }}" alt="{{ $work->title }}" width="100">
                </div>
            @endif
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Work</button>
        <a href="{{ route('admin.works.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
    @push('scripts')
    <!-- Perbaikan Script CKEditor 5 -->
    <script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error('Error initializing CKEditor:', error);
                });
        });
    </script>
    @endpush
@endsection
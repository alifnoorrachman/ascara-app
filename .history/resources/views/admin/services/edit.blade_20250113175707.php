@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
    <h1>Edit Service</h1>

    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $service->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $service->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea 
                name="content" 
                id="content" 
                class="form-control" 
                rows="5"
            >{{ old('content', $service->content ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            @if($service->image)
                <div class="mb-2">
                    <img src="{{ asset('images/services/' . $service->image) }}" alt="{{ $service->title }}" width="100">
                </div>
            @endif
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Service</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
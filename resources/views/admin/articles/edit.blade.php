@extends('layouts.admin')

@section('title', 'Edit Article')

@section('content')
    <h1>Edit Article</h1>

    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $article->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5">{{ old('content', $article->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            @if($article->image)
                <div class="mb-2">
                    <img src="{{ asset('images/articles/' . $article->image) }}" alt="{{ $article->title }}" width="100">
                </div>
            @endif
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <button type="submit" class="btn btn-primary">Update Article</button>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>

    @push('scripts')
    <!-- Perbaikan Script CKEditor 5 -->
    <script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#content'))
                .catch(error => {
                    console.error('Error initializing CKEditor:', error);
                });
        });
    </script>
    @endpush
@endsection

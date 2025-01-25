@extends('layouts.admin')

@section('title', 'Articles')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Articles</h1>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Article
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3" style="min-width: 200px;">Title</th>
                            <th class="px-4 py-3" style="min-width: 300px;">Content</th>
                            <th class="px-4 py-3" style="width: 150px;">Image</th>
                            <th class="px-4 py-3" style="width: 200px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="fw-semibold">{{ $article->title }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="text-muted prose">{{ Str::limit(html_entity_decode(strip_tags($article->content)), 100) }}</div>
                                </td>                              
                                <td class="px-4 py-3">
                                    @if($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}" 
                                             alt="{{ $article->title }}" 
                                             class="rounded shadow-sm"
                                             style="width: 100px; height: 70px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.articles.edit', $article) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>
                                        <form action="{{ route('admin.articles.destroy', $article) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this article?')">
                                                <i class="fas fa-trash-alt me-1"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="py-4">
        {{ $articles->links('pagination::bootstrap-5') }}
    </div>
    
    
    @push('styles')
    <style>
        .table td, .table th {
            vertical-align: middle;
        }
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border: none;
            border-radius: 0.5rem;
        }
        .btn-outline-primary:hover, .btn-outline-danger:hover {
            color: white;
        }
    </style>
    @endpush
@endsection
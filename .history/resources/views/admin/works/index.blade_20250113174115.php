@extends('layouts.admin')

@section('title', 'Works')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Work</h1>
        <a href="{{ route('admin.works.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add New Works
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3" style="min-width: 200px;">Title</th>
                            <th class="px-4 py-3" style="min-width: 300px;">Service</th>
                            <th class="px-4 py-3" style="min-width: 200px;">Brand</th>
                            <th class="px-4 py-3" style="width: 150px;">Image</th>
                            <th class="px-4 py-3" style="width: 200px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($works as $work)
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="fw-semibold">{{ $work->title }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="fw-semibold">{{ $work->service->title }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="fw-semibold">{{ $work->brand }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    @if($work->image)
                                        <img src="{{ asset('storage/' . $work->image) }}" 
                                             alt="{{ $work->title }}" 
                                             class="rounded shadow-sm"
                                             style="width: 100px; height: 70px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.works.edit', $work) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>
                                        <form action="{{ route('admin.works.destroy', $work) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this work?')">
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
        {{ $works->links('pagination::bootstrap-5') }}
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
@extends('layouts.admin')

@section('title', 'Services')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Services</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-2"></i>Add New Service
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3">Image</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td class="px-4 py-3">{{ $service->title }}</td>
                                <td class="px-4 py-3">{{ Str::limit($service->description, 100) }}</td>
                                <td class="px-4 py-3">
                                    @if($service->image)
                                        <img src="{{ asset('images/services/' . $service->image) }}" 
                                             alt="{{ $service->title }}" 
                                             class="rounded" 
                                             style="width: 50px; height: 50px; object-fit: cover;">
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.services.edit', $service) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>
                                        <form action="{{ route('admin.services.destroy', $service) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this service?')">
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
        {{ $services->links('pagination::bootstrap-5') }}
    </div>

@endsection
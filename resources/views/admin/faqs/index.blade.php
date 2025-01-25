@extends('layouts.admin')

@section('title', 'FAQs')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">FAQ's</h1>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-2"></i>Add New FAQ's
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3">Questions</th>
                            <th class="px-4 py-3">Answer</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $faq)
                            <tr>
                                <td class="px-4 py-3">{{ $faq->question}}</td>
                                <td class="px-4 py-3">{{ Str::limit($faq->answer, 150) }}</td>
                                <td class="px-4 py-3">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.faqs.edit', $faq) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>
                                        <form action="{{ route('admin.faqs.destroy', $faq) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this FAQs?')">
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
        {{ $faqs->links('pagination::bootstrap-5') }}
    </div>

@endsection
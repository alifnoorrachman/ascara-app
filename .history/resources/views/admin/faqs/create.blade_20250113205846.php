@extends('layouts.admin')

@section('title', 'Add FAQ')

@section('content')
    <h1>Add New FAQ</h1>

    <form action="{{ route('admin.faqs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question" value="{{ old('question') }}">
            @error('question')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" rows="3">{{ old('answer') }}</textarea>
            @error('answer')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <button type="submit" class="btn btn-primary">Save FAQ</button>
            <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
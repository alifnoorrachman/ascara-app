@extends('layouts.admin')

@section('title', 'Edit FAQ')

@section('content')
    <h1>Edit FAQ</h1>

    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question" value="{{ old('question', $faq->question) }}">
            @error('question')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" rows="3">{{ old('answer', $faq->answer) }}</textarea>
            @error('answer')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update FAQ</button>
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
<!-- resources/views/services/works.blade.php -->
@extends('layouts.public')

@section('title', 'All Works')

@section('content')
<section class="py-12 px-6 sm:px-8 lg:px-20 bg-colorOne text-colorNetral">
    <div class="container mx-auto">
        <!-- Header Section -->
        <div class="mb-12">
            <h2 class="text-lg font-semibold">{{ $service->id }}.</h2>
            <h1 class="text-4xl font-bold leading-tight mb-4">{{ $service->title }}</h1>
            <p class="text-gray-600 max-w-2xl">
                {{ $service->description }}
            </p>
        </div>

        <!-- Projects Grid - Adjusted for landscape images -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($works as $work)
                <div class="group relative rounded-lg">
                    <a href="{{ route('works.show', ['id' => $work->id]) }}" class="block">
                        <div class="relative overflow-hidden">
                            <img 
                                src="{{ asset('storage/' . $work->image) }}" 
                                class="w-full aspect-[16/9] object-cover transition-transform duration-300 group-hover:scale-105 rounded-lg hover:rounded-lg" 
                                alt="{{ $work->title }}">
                        </div>
                        <div class="mt-4">
                            <h3 class="text-lg font-semibold">{{ $work->title }}</h3>
                            <p class="text-gray-500 text-sm mt-1">Project: {{ $work->category }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $works->links() }}
        </div>
    </div>
</section>
@endsection
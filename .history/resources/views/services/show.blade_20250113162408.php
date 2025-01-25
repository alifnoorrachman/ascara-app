@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Our Services</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($services as $service)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" 
                     alt="{{ $service->title }}" 
                     class="w-full h-48 object-cover">
            @endif
            
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">{{ $service->title }}</h2>
                <p class="text-gray-600 mb-4">{{ $service->description }}</p>
                
                <a href="{{ route('services.show', $service) }}" 
                   class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Learn More
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
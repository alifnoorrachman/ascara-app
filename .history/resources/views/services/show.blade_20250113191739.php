@extends('layouts.public')

@section('title', $service->title)

@section('content')
{{-- Hero Section --}}
{{-- Service Detail Content --}}
<section data-animate class="parallax bg-colorOne py-0 px-4 sm:px-8 lg:px-16 xl:px-20 text-colorNetral">
    <div class="container max-w-7xl my-4">
        <article>
        {{-- Service Overview --}}
        <div class="bg-white rounded-xl shadow-lg p-2 mb-12">
            
            {{-- Image Section --}}
            <div class="mb-8">
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-auto rounded-xl object-cover">
            </div>
            
            {{-- Title Section --}}
            <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">
                {{ $service->title }}
            </h1>
            {{-- Content Section --}}
                <div class="prose prose-lg max-w-none mb-8 text-colorOne p-8">
                    {!! $service->content !!}
                </div>
            </div>
        </article>
        </div>

        {{-- Process Steps --}}
        {{-- Related Services --}}
        @if(isset($relatedServices) && count($relatedServices) > 0)
            <div class="mb-20">
                <h2 class="text-2xl font-medium text-colorNetral mb-12 text-start">Related Services</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($relatedServices as $relatedService)
                        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl hover:scale-105 transition duration-300">
                            <div class="bg-colorOne text-white p-3 rounded-lg inline-block">
                                <i class="fas fa-cube text-lg"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mt-4 mb-2">{{ $relatedService->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($relatedService->description, 100) }}</p>
                            <a href="{{ route('services.show', $relatedService->id) }}" 
                               class="text-colorOne font-semibold hover:underline">
                                Learn More
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

{{-- Contact Card --}}
<section class="mx-2 mt-20 mb-40 px-4 py-20 rounded-lg bg-colorNetral">
    <div data-animate class="md:w-full mb-8 md:mb-0">
        <x-contact-card 
            logo="/images/logo.png" 
            subtitle="Ready to Get Started?" 
            title="Let's discuss how we can help with {{ $service->title }}" 
            buttonText="Contact Us"
        />
    </div>
</section>

<script src="{{ mix('js/app.js') }}"></script>
<script type="module" src="{{ mix('resources/js/scroll.js') }}"></script>

@endsection
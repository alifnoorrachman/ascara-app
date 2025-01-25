@extends('layouts.public')

@section('title', $service->title)

@section('content')
{{-- Hero Section --}}
{{-- Service Detail Content --}}
<section data-animate class="parallax bg-colorOne py-20 px-4 sm:px-8 lg:px-16 xl:px-20 text-colorNetral">
    <div class="container mx-auto">
        {{-- Service Overview --}}
        <div class="bg-white rounded-xl shadow-lg p-8 mb-12">
            <div class="flex items-start gap-6 flex-wrap md:flex-nowrap">
                <div class="w-full md:w-2/3">
                    <div class="bg-colorOne text-white p-3 rounded-lg inline-block mb-6">
                        <i class="fas fa-cube text-lg"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Overview</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        {{ $service->description }}
                    </p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($service->tags ?? [] as $tag)
                            <span class="px-3 py-1 text-sm font-semibold text-colorThree border border-colorThree rounded-full">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                </div>
                <div class="w-full md:w-1/3">
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Key Features</h3>
                        <ul class="space-y-3">
                            @foreach($service->features ?? [] as $feature)
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-check-circle text-colorOne mt-1"></i>
                                    <span class="text-gray-600">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Process Steps --}}

        {{-- Related Services --}}
        @if(isset($relatedServices) && count($relatedServices) > 0)
            <div class="mb-20">
                <h2 class="text-3xl font-bold text-colorNetral mb-12 text-center">Related Services</h2>
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
                                Learn More →
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
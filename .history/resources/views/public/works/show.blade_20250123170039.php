<!-- resources/views/public/works/show.blade.php -->
@extends('layouts.public')

@section('content')
<div class="container mx-auto px-4 py-12">
    {{-- Breadcrumb --}}
    <div class="mb-8">
        <div class="flex items-center text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('works') }}" class="hover:text-blue-600">Works</a>
            <span class="mx-2">/</span>
            <span class="text-colorNetral">{{ $work->title }}</span>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        {{-- Left Column: Image Gallery --}}
        <div class="space-y-6">
            @if($work->image)
                <div class="rounded-lg overflow-hidden">
                    <img 
                        src="{{ asset('storage/' . $work->image) }}" 
                        alt="{{ $work->title }}"
                        class="w-full h-[500px] object-cover"
                    >
                </div>
            @endif
        </div>

        {{-- Right Column: Work Details --}}
        <div class="space-y-6">
            {{-- Category & Service Tags --}}
            <div class="flex gap-4">
                @if($work->service)
                    <span class="px-4 py-2 bg-colorNetral text-colorOne rounded-full text-sm">
                        {{ $work->service->title }}
                    </span>
                @endif
            </div>
            <article class="max-w-3xl mx-auto">
                <header class="mb-6 text-start">
                    <h1 class="text-4xl font-medium">{{ $work->title }}</h1>
                </header>
                <p class="prose prose-lg">
                    {!! $work->description !!}
                </p>
            </article>
            
            {{-- Title --}}

            {{-- Project Info --}}
            <div class="border-t pt-6 mt-8">
                <h3 class="text-lg font-semibold mb-2">Project Information</h3>
                <div class="grid grid-cols-2 gap-6">
                    @if($work->category)
                    @endif
                    @if($work->service)
                    <div>
                        <span>Brand</span>
                        <p class="font-medium">{{ $work->brand }}</p>
                    </div>
                    @endif
                    <div>
                        <span>Date</span>
                        <p class="font-medium">{{ $work->created_at->format('F d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Related Works --}}
    <div class="mt-20">
        <h2 data-animate class="text-2xl font-medium mb-8">Related Works</h2>
        <div data-animate>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($relatedWorks as $relatedWork)
                <div class="rounded-lg shadow-md overflow-hidden group">
                    @if($relatedWork->image)
                    <div class="relative overflow-hidden">
                        <img
                        src="{{ asset('storage/' . $relatedWork->image) }}" 
                        alt="{{ $relatedWork->title }}"
                        class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300"
                        >
                        <div class="absolute inset-0 bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                    </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">{{ $relatedWork->title }}</h3>
                        <p class="mb-4 prose">{{ Str::limit(html_entity_decode(strip_tags($relatedWork->description)), 100) }}</p>
                        <a 
                        href="{{ route('works.show', $relatedWork->id) }}" 
                        class="inline-flex items-center"
                        >
                        View Details
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


{{-- contact card --}}
<section class="mx-2 mt-20 mb-40 px-4 py-20 rounded-xl">
    <div data-animate class="md:w-full mb-8 md:mb-0">
        <x-contact-card 
            logo="/images/logo.png" 
            subtitle="Get in Touch" 
            title="Let’s create your next big project together." 
            buttonText="Contact"
        />
    </div> 
</section>+
@endsection
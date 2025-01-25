@extends('layouts.public')

@section('title', $service->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        @if($service->image)
            <img src="{{ asset('storage/' . $service->image) }}" 
                 alt="{{ $service->title }}" 
                 class="w-full h-64 object-cover rounded-lg mb-6">
        @endif
        
        <h1 class="text-4xl font-bold mb-4">{{ $service->title }}</h1>
        <div class="prose max-w-none mb-8">
            <p>{{ $service->description }}</p>
        </div>

        @if($service->works->count() > 0)
            <div class="mt-8">
                <h2 class="text-2xl font-semibold mb-4">Related Works</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($service->works as $work)
                        <div class="bg-white p-4 rounded-lg shadow">
                            <h3 class="font-semibold">{{ $work->title }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        
        <a href="{{ route('services.index') }}" 
           class="inline-block mt-6 bg-colorOne text-white px-4 py-2 rounded hover:opacity-90">
            Back to Services
        </a>
    </div>
</div>

{{-- contact card --}}
<section class="mx-2 mt-20 mb-40 px-4 py-20 rounded-lg bg-colorNetral">
    <div data-animate class="md:w-full mb-8 md:mb-0">
        <x-contact-card 
            logo="/images/logo.png" 
            subtitle="Get in Touch" 
            title="Let's create your next big project together." 
            buttonText="Contact"
        />
    </div> 
</section>

<script src="{{ mix('js/app.js') }}"></script>
<script type="module" src="{{ mix('resources/js/scroll.js') }}"></script>
@endsection
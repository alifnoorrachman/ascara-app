@extends('layouts.public')

@section('title', 'Retail Business')

@section('content')

{{-- Hero --}}
<section class="parallax-section mx-2 rounded-xl py-20 px-6 sm:px-8 lg:px-20 bg-colorOne text-colorNetral">
    <p class="text-xl mb-4 text-center sm:text-lg md:text-xl lg:text-2xl leading-relaxed">
        Branding, UI/UX design, art direction, animation, no-code development.
    </p>
    <h1 class="text-center pt-4 mb-8 text-4xl sm:text-5xl md:text-6xl lg:text-[215px] font-bold leading-tight">
        Retail Business
    </h1>
</section>

<!-- View -->
<section class="mx-2 rounded-xl py-44 px-6 sm:px-8 lg:px-20 bg-white parallax">
<div class="max-w-full pt-8 mx-2">
    <!-- Navigation Buttons -->
    <div data-animate class="flex flex-wrap justify-center gap-4 md:gap-8 md:mb-4">
        @foreach($retails as $index => $retail)
            <button onclick="showContent('content-{{ $index }}', this)" 
                    class="px-4 md:px-4 py-2 text-xs md:text-sm {{ $index === 0 ? 'border-1 border-colorThree bg-colorThree text-white' : 'border-1 border-colorThree bg-white text-colorThree' }} rounded-md hover:bg-colorThree hover:text-colorThree transition-colors">
                {{ $retail->title }}
            </button>
        @endforeach
    </div>
</div>

    <!-- Content Sections -->
    <div data-animate class="content-container mx-2 pb-16">
        @foreach($retails as $index => $retail)
            <div id="content-{{ $index }}" class="content-section {{ $index !== 0 ? 'hidden' : '' }}">
                <div class="relative h-[400px] md:h-[500px] lg:h-[600px] border-4 border-colorThree rounded-3xl overflow-hidden">
                    <div class="absolute inset-0">
                        <img src="{{ asset('storage/' . $retail->image) }}" 
                             alt="{{ $retail->title }}" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="absolute top-4 md:top-8 left-4 md:left-8 max-w-xs md:max-w-md shadow-md bg-white/95 p-4 md:p-8 rounded-2xl">
                        <h2 class="text-lg md:text-2xl mb-2 md:mb-4">{{ $retail->title }}</h2>
                        <p class="text-gray-700 text-sm md:text-base leading-relaxed">
                            {{ $retail->description }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- contact card --}}
<section class="mx-2 mt-20 mb-40 px-4 py-20 rounded-lg bg-colorThree">
    <div data-animate class="md:w-full mb-8 md:mb-0">
        <x-contact-card 
            logo="/images/logo.png" 
            subtitle="Get in Touch" 
            title="Let’s create your next big project together." 
            buttonText="Contact"
        />
    </div> 
</section>

<script>
function showContent(contentId, clickedButton) {
    // Hide all content sections
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.add('hidden');
    });
    
    // Show selected content section
    document.getElementById(contentId).classList.remove('hidden');
    
    // Update button styles
    document.querySelectorAll('.flex button').forEach(button => {
        button.classList.remove('bg-colorThree', 'text-white');
        button.classList.add('bg-white', 'text-colorThree');
    });
    
    clickedButton.classList.remove('bg-white', 'text-colorThree');
    clickedButton.classList.add('bg-colorThree', 'text-white');
}
</script>
<script type="module" src="{{ mix('resources/js/scroll.js') }}"></script>
@endsection

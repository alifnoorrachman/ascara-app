@extends('layouts.public')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
<!-- Hero Section -->
<section class="px-6 md:px-20 py-16">
    <div data-animate class="flex flex-col md:flex-row gap-12 items-start">
        <!-- Left Column -->
        <div class="w-full md:w-1/3 flex flex-col">
            <div class="flex items-center mb-6">
                <div class="w-4 h-4 mr-4"></div>
                <h2 class="text-lg font-medium">Who We Are</h2>
            </div>
            <!-- Image Container -->
            <div class="rounded-lg overflow-hidden w-full h-[300px] sm:h-[400px] md:h-[500px]">
                <img src="/images/Hero.png" alt="Studio professional" class="w-full h-full object-cover">
            </div>
        </div>
        
        <!-- Right Column -->
        <div class="w-full md:w-2/3 flex flex-col">
            <!-- Main Heading -->
            <h1 class="text-3xl sm:text-3xl md:text-4xl lg:text-6xl font-black leading-tight mb-6">
                WE SPECIALIZE IN BRAND DESIGN, DIGITAL DESIGN, AND DEVELOPMENT, 
                <span class="italic font-normal">seamlessly</span> INTEGRATING VARIOUS 
                <span class="italic font-normal">disciplines</span> TO ACHIEVE POWERFUL AND EFFECTIVE OUTCOMES.
            </h1>
    
            <!-- Description -->
            <p class="text-base sm:text-lg mb-8">
                What sets Lumin apart is our unique approach to digital design. We combine artistic flair with 
                technical expertise, strategic thinking with bold creativity, to deliver solutions that not only meet 
                but exceed our clients' expectations.
            </p>
        </div>
    </div>
</section>


 <!-- Featured Services -->
<section class="px-6 md:px-20 py-16">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row"> 
            <div data-animate class="md:w-full mb-8 md:mb-0"> 
                <div class="flex items-center">
                    <div class="w-4 h-4 mr-4"></div> 
                    <h2 class="text-lg font-medium">Our Services</h2> 
                </div>
                <div class="h-px w-full mt-1"></div> 
            </div>
        </div>
        
        <!-- Content Section -->
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2 mt-6">
                <h1 data-animate class="text-4xl sm:text-5xl md:text-6xl font-bold leading-tight">
                    Elevating <span class="italic font-normal">brands</span> with custom solutions
                </h1> 
            </div>
            <div class="md:w-1/2 mt-6 md:mt-0 pt-4">
                <div class="grid grid-cols-1 gap-4"> 
                    @foreach($services as $service)
                    <a href="{{ route('services.show', $service->id) }}" class="group flex items-center w-full transition duration-300 py-4 px-4 rounded-lg"> 
                        <div data-animate>
                            <h3 class="text-lg font-medium">{{ $service->title }}</h3> 
                        </div>
                        <div class="ml-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transition duration-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
</section>


    <!-- Latest Works -->  
    <section class="px-6 md:px-20 py-16">
            <!-- Section Header -->
            <div data-animate class="md:w-full mb-4 md:mb-0"> 
                <div class="flex items-center">
                    <div class="w-4 h-4 mr-4"></div> 
                    <h2 class="text-lg font-medium">Our Works</h2> 
                </div>
                <div class="h-px w-full mt-1"></div> 
            </div>
            
            <div class="md:w-1/2 mt-6">
                <h1 data-animate class="text-4xl sm:text-5xl md:text-6xl font-bold leading-tight">
                    Highlights of our <span class="italic font-normal">creative journey</span>
                </h1> 
            </div>        
            
            <!-- Column-Based Masonry Layout -->
            <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 py-16 space-y-6">
                @forelse($works as $work)
                    <div data-animate class="break-inside-avoid mb-6 overflow-hidden">
                        <!-- Image Container -->
                        <div class="group relative {{ $loop->iteration % 3 == 1 ? 'h-[650px]' : ($loop->iteration % 3 == 2 ? 'h-[500px]' : 'h-[300px]') }} bg-olive-800 overflow-hidden rounded-lg">
                            <a href="{{ route('works.show', $work->id) }}" class="block w-full h-full relative z-10">
                                <img 
                                    src="{{ asset('storage/' . $work->image) }}" 
                                    alt="{{ $work->title }}" 
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                >
                            </a>
                                                      
                            <div class="absolute inset-0 bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300"></div>
                        </div>
                        
                        <!-- Text Content -->
                        <div class="p-2">
                            <a href="{{ route('works.show', $work->id) }}">
                                <h3 class="text-xl font-bold hover:underline">{{ $work->title }}</h3>
                            </a>
                            <div class="h-px my-2"></div>
                            <div class="flex justify-between text-sm">
                                <p>{{ $work->service->title }}</p>
                                <span>{{ $work->created_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <p>No works found.</p>
                    </div>
                @endforelse
            </div>
    
            <!-- See more link -->
            <div class="text-right mt-4">
                <a href="{{ route('works') }}" class="inline-flex items-center text-sm transition-colors duration-300">
                    See more
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
        </div>

    </section>
  
  <!-- Card Container -->      
  {{-- <Article> --}}

    <section class="mpx-6 md:px-20 py-4">
        <div data-animate class="md:w-full mb-8 md:mb-0"> 
            <div class="flex items-center">
                <div class="w-4 h-4 mr-4"></div> 
                <h2 class="text-lg font-medium">Articles & Blog</h2> 
            </div>
            <div class="h-px w-full mt-1"></div> 
        </div>
        
        <div data-animate class="md:w-1/2 mt-4">
            <h1 class="text-xl sm:text-2xl font-light leading-tight italic">
                Stay ahead in the digital landscape with our expert insights, industry trends, and innovative strategies.
            </h1> 
            
            <a href="{{ route('articles') }}" 
                class="border border-colorOne px-6 py-2 mt-4 inline-flex items-center gap-2 transition-colors rounded-lg">
                View all Blog
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    <!-- Full width container -->
    <div class="py-16 px-6">
        <div data-animate class="lg-columns-2 flex flex-wrap gap-4 justify-center content-center md:justify-items-center">
            @foreach($articles as $article)
            <x-article-card
                :image="$article->image ? asset('storage/' . $article->image) : null"
                :title="$article->title"
                :date="$article->created_at->format('l, d F Y')"
                :link="route('articles.show', ['id' => $article->id])"
            />
            @endforeach
        </div>
    </div>
</section>




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
</section>

    
    
@endsection
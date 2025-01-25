@extends('layouts.public')

@section('content')

{{-- Hero Section --}}
<section class="parallax-section mx-2 rounded-xl py-44 px-6 sm:px-8 lg:px-20">
    <p class="text-xl mb-4 text-center sm:text-lg md:text-xl lg:text-2xl leading-relaxed">
        Branding, UI/UX design, art direction, animation, no-code development.
    </p>
    <h1 class="text-center pt-2 mb-8 text-4xl sm:text-5xl md:text-6xl lg:text-[250px] font-bold leading-tight">
        Articles
    </h1>
</section>

{{-- Main Content --}}
{{-- Main Content --}}
<section class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Featured Article Section --}}
        @if($articles->count() > 0)
        <div data-animate class="col-span-1 md:col-span-2">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-medium">
                    Featured Article
                </h2>
            </div>
            @php
                $featuredArticle = $articles->shift();
                $firstSideArticle = $articles->shift();
            @endphp
            <div class="group rounded-2xl overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl">
                <div class="relative">
                    @if($featuredArticle->image)
                        <img src="{{ asset('storage/' . $featuredArticle->image) }}" 
                             alt="{{ $featuredArticle->title }}" 
                             class="w-full h-96 md:h-[500px] object-cover transition-transform duration-300 group-hover:scale-105">
                    @else
                        <div class="w-full h-96 md:h-[500px] animate-pulse"></div>
                    @endif
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 via-transparent to-transparent">
                        <div class="flex items-center mb-2 space-x-3">
                            <span class="text-xs flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                    <path d="m2 17 10 5 10-5"></path>
                                    <path d="m2 12 10 5 10-5"></path>
                                </svg>
                                {{ $featuredArticle->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <h2 class="text-xl sm:text-2xl font-bold mt-1 mb-2 transition-colors text-colorNetral">
                            {{ $featuredArticle->title }}
                        </h2>
                        <p class="text-xs sm:text-sm line-clamp-2 sm:line-clamp-3">
                            {{ Str::limit(strip_tags($featuredArticle->content), 150) }}
                        </p>
                        <a href="{{ route('articles.show', $featuredArticle->id) }}" 
                           class="inline-block mt-3 px-4 py-2 rounded-lg transition-all duration-300 group-hover:pl-6">
                            <span class="flex items-center">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 opacity-0 group-hover:opacity-100 transition-all" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        {{-- First Side Article --}}
        @if(isset($firstSideArticle)) 
        <div data-animate class="col-span-1 hidden md:block group">
            <h2 class="text-2xl font-medium mb-6">Recent Article</h2>
            <div class="rounded-lg overflow-hidden transition-all duration-300 hover:shadow-xl shadow-md">
                <div class="relative">
                    @if($firstSideArticle->image)
                        <a href="{{ route('articles.show', $firstSideArticle->id) }}" class="block">
                            <img 
                                src="{{ asset('storage/' . $firstSideArticle->image) }}" 
                                class="w-full h-[270px] object-cover rounded-lg transform transition-transform duration-500 ease-in-out group-hover:scale-110" 
                                alt="{{ $firstSideArticle->title }}"
                            >
                        </a>
                    @else
                        <div class="w-full h-[270px] animate-pulse rounded-t-lg"></div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex items-center mb-2 space-x-3">
                        <span class="text-xs">
                            {{ $firstSideArticle->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <h3 class="text-xl font-bold mt-1 mb-2">
                        <a href="{{ route('articles.show', $firstSideArticle->id) }}" class="hover:underline transition duration-300">
                            {{ $firstSideArticle->title }}
                        </a>
                    </h3>
                    <p class="mt-2 line-clamp-3">
                        {{ Str::limit(strip_tags($firstSideArticle->content), 100) }}
                    </p>
                    <a href="{{ route('articles.show', $firstSideArticle->id) }}" 
                       class="mt-4 hover:underline flex items-center">
                        Read More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endif

        {{-- More Articles Section --}}
        <div data-animate class="col-span-1 md:col-span-3">
            <h2 class="text-2xl font-medium mb-6">More Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($articles as $article)
                    <div class="rounded-lg overflow-hidden transition-all duration-300 hover:shadow-xl group shadow-md">
                        <div class="relative">
                            @if($article->image)
                                <a href="{{ route('articles.show', $article->id) }}">
                                    <img src="{{ asset('storage/' . $article->image) }}" 
                                         alt="{{ $article->title }}" 
                                         class="w-full h-[270px] object-cover transition-transform duration-300 group-hover:scale-110 rounded-lg">
                                </a>
                            @else
                                <div class="w-full h-48 animate-pulse"></div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-2 space-x-3">
                                <span class="text-xs">
                                    {{ $article->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <a href="{{ route('articles.show', $article->id) }}">
                                <h3 class="text-xl font-bold mt-1 mb-2 hover:underline transition-colors">
                                    {{ $article->title }}
                                </h3>
                            </a>
                            <p class="mt-2 line-clamp-3">
                                {{ Str::limit(strip_tags($article->content), 100) }}
                            </p>
                            <a href="{{ route('articles.show', $article->id) }}" 
                               class=" mt-4 hover:underline flex items-center">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>        
    </div>
    <div class="mt-12">
        {{ $articles->links() }}
    </div>
</section>


{{-- Pagination --}}

{{-- contact card --}}
<section class="mx-2 mt-20 mb-40 px-4 py-20 rounded-lg">
    <div data-animate class="md:w-full mb-8 md:mb-0">
        <x-contact-card 
            logo="/images/logo.png" 
            subtitle="Get in Touch" 
            title="Let’s create your next big project together." 
            buttonText="Contact"
        />
    </div> 
</section>
<script type="module" src="{{ mix('resources/js/scroll.js') }}"></script>

@endsection

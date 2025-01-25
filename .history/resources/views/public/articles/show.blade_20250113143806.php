@extends('layouts.public')

@section('content')

<article class="max-w-6xl mx-auto px-4 py-8 text-colorNetral">
    {{-- Article Header with Date and Share --}}
    <div class="flex justify-between items-center text-sm mb-3">
        {{-- Article Date --}}
        <div>
            {{ $article->created_at->format('l, d F Y') }}
        </div>

        {{-- Share Section --}}
        <div class="flex items-center space-x-2">
            <span>Share on</span>
            {{-- Icon X --}}
            <a href="#" class="hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>
    </div>

    {{-- Featured Image --}}
    @if($article->image)
    <div class="mb-8 rounded-lg overflow-hidden">
        <img 
            src="{{ asset('storage/' . $article->image) }}" 
            alt="{{ $article->title }}"
            class="w-full h-[500px] object-cover bg-gray-300"
        />
    </div>
    @else
    <div class="w-full h-[400px] bg-gray-300 mb-8 rounded-lg"></div>
    @endif

    {{-- Article Header --}}
    <div class="mb-8 text-colorNetral">
        <h1 class="text-3xl font-bold mb-4 text-center leading-tight">
            {{ $article->title }}
        </h1>
    </div>

    {{-- Article Content --}}
    <div data-animate class="prose prose-lg max-w-none mb-8">
        {!! $article->content !!}
    </div>
</article>


    {{-- Related Articles --}}
    <div class="max-w-6xl mx-auto px-4 py-8 text-colorNetral">
        <h3 data-animate class="text-xl font-medium mb-8">Related Articles</h3>
    
        <div data-animate>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach(App\Models\Article::where('id', '!=', $article->id)->latest()->take(3)->get() as $relatedArticle)
                <x-article-card 
                :image="$relatedArticle->image ? asset('storage/' . $relatedArticle->image) : null"
                :title="$relatedArticle->title"
                :date="$relatedArticle->created_at->format('l, d F Y')"
                :link="route('articles.show', ['id' => $relatedArticle->id])"
                />
                @endforeach
            </div>
        </div>
    </div>
    

{{-- contact card --}}
<section class="mx-2 mt-20 mb-40 px-4 py-20 rounded-xl bg-colorNetral">
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
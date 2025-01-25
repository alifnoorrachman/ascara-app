@extends('layouts.public')

@section('content')

<div class="container mx-auto px-2 my-4 sm:px-6 lg:px-8">
    <article class="max-w-7xl mx-auto bg-white rounded-xl shadow-lg p-6 sm:p-8 mb-12">
        {{-- Article Header with Date and Share --}}
        <div class="flex justify-between items-center text-sm mb-4 text-gray-700">
            {{-- Article Date --}}
            <div>
                {{ $article->created_at->format('l, d F Y') }}
            </div>

            {{-- Share Section --}}
            <div class="flex items-center space-x-2">
                <span>Share on</span>
                {{-- Icon X --}}
                <a href="#" class="hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Featured Image --}}
        @if($article->image)
        <div class="mb-6 rounded-xl overflow-hidden">
            <img 
                src="{{ asset('storage/' . $article->image) }}" 
                alt="{{ $article->title }}"
                class="w-full h-auto sm:h-80 md:h-96 object-cover rounded-xl"
            />
        </div>
        @else
        <div class="w-full h-64 sm:h-80 bg-gray-300 mb-6 rounded-xl"></div>
        @endif

        {{-- Article Header --}}
        <div class="mb-6 text-gray-900">
            <h1 class="text-4xl font-bold text-center leading-tight">
                {{ $article->title }}
            </h1>
        </div>

        {{-- Article Content --}}
        <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed p-6">
            {!! $article->content !!}
        </div>
    </article>
</div>



    {{-- Related Articles --}}
    <div class="max-w-7xl mx-auto py-8 text-colorNetral">
        <h3 data-animate class="text-xl font-medium mb-8">Related Articles</h3>
    
        <div data-animate>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
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
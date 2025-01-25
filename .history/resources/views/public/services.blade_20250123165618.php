@extends('layouts.public')

@section('title', 'Our Services')

@section('content')

{{-- Hero --}}
<section class="parallax-section mx-2 rounded-xl py-44 px-6 sm:px-8 lg:px-20 bg-colorNetral text-colorOne">
    <p class="text-xl mb-4 text-center sm:text-lg md:text-xl lg:text-2xl leading-relaxed">
        Branding, UI/UX design, art direction, animation, no-code development.
    </p>
    <h1 class="text-center pt-2 mb-8 text-4xl sm:text-5xl md:text-6xl lg:text-[250px] font-bold leading-tight">
        Services
    </h1>
</section>


{{-- Card Service --}}
{{-- Card Service --}}
<section data-animate class="parallax bg-colorOne pt-12 px-4 sm:px-8 lg:px-16 xl:px-20 text-colorNetral">
    <!-- Menggunakan Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($services as $service)
            {{-- Tambahkan link wrapper di sini --}}
            <a href="{{ route('services.show', $service->id) }}" class="block">
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl hover:scale-105 transition duration-300 flex flex-col h-full">
                    <!-- Ikon di Dalam Card -->
                    <div class="bg-colorOne text-white p-3 rounded-lg inline-block self-start">
                        <i class="fas fa-cube text-lg"></i>
                    </div>

                    <!-- Konten Utama -->
                    <div class="flex flex-col flex-grow mt-4">
                        <h3 class="text-2xl font-bold text-gray-800">{{ $service->title }}</h3>
                        <p class="text-gray-600 text-base leading-relaxed flex-grow">{{ $service->description }}</p>
                    </div>

                    <!-- Learn More -->
                    <p class="mt-4 text-sm hover:underline font-semibold text-colorOne border-colorOne">
                        Learn More
                    </p>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
        {{ $services->links() }}
    </div>
</section>



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

<script src="{{ mix('js/app.js') }}"></script>
<script type="module" src="{{ mix('resources/js/scroll.js') }}"></script>
{{-- <script src="{{ mix('js/scroll.js') }}"></script> --}}


@endsection
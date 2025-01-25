@extends('layouts.public')

@section('title', 'Our Works')

@section('content')
<section class="parallax-section mx-2 rounded-xl py-44 px-6 sm:px-8 lg:px-20 bg-colorNetral text-colorOne">
    <p class="text-xl mb-4 text-center sm:text-lg md:text-xl lg:text-2xl leading-relaxed">
        Branding, UI/UX design, art direction, animation, no-code development.
    </p>
    <h1 class="text-center pt-2 mb-8 text-4xl sm:text-5xl md:text-6xl lg:text-[250px] font-bold leading-tight">
        Works
    </h1>
</section>
<section class="mx-2 py-12 px-6 sm:px-8 lg:px-20 bg-colorOne text-colorNetral">
    <section data-animate class="container mx-auto flex flex-col gap-20">
        @foreach($services as $service)
            <!-- Service section wrapper -->
            <div class="flex flex-col lg:flex-row gap-10">
                <!-- Left sidebar for each service -->
                <div class="lg:w-1/4 flex-shrink-0">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-500">{{ $loop->iteration }}.</h2>
                        <h1 class="text-3xl font-bold leading-tight">{{ $service->title }}</h1>
                        <p class="mt-4">
                            {{ $service->description }}
                        </p>
                        <a href="{{ route('service.works.all', ['service' => $service->id]) }}" class="inline-block mt-6 px-6 py-2 border border-colorNetral rounded-lg text-colorNetral font-medium hover:bg-colorNetral hover:text-colorOne transition-colors">
                            All Works
                        </a>
                    </div>
                </div>

                <!-- Right side works grid - limited to 4 items -->
                <div class="lg:w-3/4">
                    <div class="flex gap-6">
                        @foreach($service->works->take(4) as $work)
                            <div class="group relative w-1/4">
                                <a href="{{ route('works.show', ['id' => $work->id]) }}" class="block">
                                    <div class="relative overflow-hidden">
                                        <img 
                                            src="{{ asset('storage/' . $work->image) }}" 
                                            class="w-full aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105 rounded-lg" 
                                            alt="{{ $work->title }}">
                                        <div class="absolute inset-0 bg-colorOne/70 bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity hover:rounded-lg">
                                            <h3 class="text-white text-lg font-semibold text-center">{{ $work->title }}</h3>
                                        </div>
                                    </div>
                                </a>
                                <div class="mt-3">
                                    <h1 class="text-2xl">{{ $work->brand}}</h1>
                                    <p class="text-sm">Project: {{ $work->service->title}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </section>
</section>









    <!-- Pagination -->
    <div class="mt-10">
        {{ $works->links() }}
    </div>
</div>


{{-- contact card --}}
<section class="mx-2 mt-20 mb-40 px-4 py-20 rounded-lg bg-colorNetral">
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
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

{{-- <section class="mx-2 rounded-xl py-12 px-6 sm:px-8 lg:px-20 bg-colorOne">
    <section data-animate class="container mx-auto p-8">
        <!-- Filter Buttons for Desktop -->
        <div class=" justify-center sm:flex hidden">
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('works') }}" 
                   class="px-4 py-2 {{ !request('service') ? 'bg-colorNetral text-colorOne' : 'border-1 border-colorNetral text-colorNetral' }} rounded-md transition-colors duration-300">
                    All
                </a>
                @foreach($services as $service)
                    <a href="{{ route('works', ['service' => $service->id]) }}" 
                       class="px-4 py-2 {{ request('service') == $service->id ? 'bg-colorNetral text-colorOne' : 'border-1 border-colorNetral text-colorNetral' }} rounded-md transition-colors duration-300">
                        {{ $service->title }}
                    </a>
                @endforeach
            </div>
        </div>
    
        <!-- Filter Buttons for Mobile -->
        <div class="sm:hidden mb-10">
            <div class="relative">
                <select 
                    onchange="window.location.href=this.value"
                    class="block will-change-auto px-4 py-2 bg-colorOne text-colo rounded-md border border-gray-300 focus:ring-2 focus:ring-colroNetral transition-colors duration-300">
                    <option value="{{ route('works') }}" {{ !request('service') ? 'selected' : '' }}>All</option>
                    @foreach($services as $service)
                        <option value="{{ route('works', ['service' => $service->id]) }}" 
                                {{ request('service') == $service->id ? 'selected' : '' }}>
                            {{ $service->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </section>
    
    
    
    <section class="container mx-auto text-colorNetral">
        <!-- Works Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($works as $work)
                <div data-animate class="relative group">
                    <!-- Image Section -->
                    <div class="overflow-hidden rounded-lg">
                        <a href="{{ route('works.show', ['id' => $work->id]) }}">
                            <img 
                                src="{{ asset('storage/' . $work->image) }}" 
                                class="w-full h-72 object-cover transition-transform duration-300 group-hover:scale-105"
                                alt="{{ $work->title }}">
                        </a>
                    </div>
                    <!-- Text Section -->
                    <div class="mt-4">
                        <h3 class="text-xl font-semibold mb-2">
                            <a href="{{ route('works.show', ['id' => $work->id]) }}" class="hover:underline">
                                {{ $work->title }}
                            </a>
                        </h3>
                        
                        <div class="flex justify-between items-center">
                            <div class="px-3 py-1 text-sm text-colorTwo border-1 border-colorTwo rounded-lg">
                                {{ $work->service->title }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    
</section> --}}

<section class="mx-2 py-12 px-6 sm:px-8 lg:px-20 bg-colorOne">
    <section data-animate class="container mx-auto flex flex-col gap-20">
        @foreach($services as $service)
            <!-- Service section wrapper -->
            <div class="flex flex-col lg:flex-row gap-10">
                <!-- Left sidebar for each service -->
                <div class="lg:w-1/4 flex-shrink-0">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-500">{{ $loop->iteration }}.</h2>
                        <h1 class="text-3xl font-bold leading-tight text-black">{{ $service->title }}</h1>
                        <p class="text-gray-600 mt-4">
                            {{ $service->description }}
                        </p>
                        <a href="{{ route('works') }}" class="inline-block mt-6 px-6 py-2 border border-black rounded-full text-black font-medium hover:bg-black hover:text-white transition-colors">
                            ALL PORTFOLIO
                        </a>
                    </div>
                </div>

                <!-- Right side works horizontal scroll -->
                <div class="lg:w-3/4 overflow-x-auto">
                    <div class="flex gap-6 min-w-max pb-4">
                        @foreach($service->works as $work)
                            <div class="group relative w-80">
                                <a href="{{ route('works.show', ['id' => $work->id]) }}" class="block">
                                    <div class="relative overflow-hidden">
                                        <img 
                                            src="{{ asset('storage/' . $work->image) }}" 
                                            class="w-full aspect-[4/3] object-cover transition-transform duration-300 group-hover:scale-105" 
                                            alt="{{ $work->title }}">
                                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                            <h3 class="text-white text-lg font-semibold text-center">{{ $work->title }}</h3>
                                        </div>
                                    </div>
                                </a>
                                <div class="mt-3">
                                    <p class="text-gray-500 text-sm">Project: {{ $work->title }}</p>
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
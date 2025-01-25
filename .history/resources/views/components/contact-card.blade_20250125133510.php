<div class="card-contact button text-colorNetral p-10 rounded-lg flex flex-col gap-4 max-w-2xl mx-auto space-y-4 my-20">
    <!-- Logo -->
    <div class="flex-shrink-0 pb-16">
        <img src="{{ $logo ?? asset('/images/Logo.png') }}" alt="Logo" class="h-10">
    </div>
    <!-- Text and Button Container -->
    <div class="flex items-center justify-between w-full">
        <!-- Text -->
        <div>
            <p class="text-sm uppercase text-gray-500 mb-2">{{ $subtitle ?? 'Contact' }}</p>
            <h2 class="text-2xl font-bold leading-tight">
                {{ $title ?? 'Let’s create your next big project together.' }}
            </h2>
        </div>
        <!-- Button -->
        <a href="#" 
                   class="border-2 rounded-lg border-colorThree border-b-colorThree px-6 py-2 mt-4 inline-flex items-center gap-2 hover:bg-colorThree hover:text-colorNetral transition-colors ">
                    Contact
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
    </div>
</div>

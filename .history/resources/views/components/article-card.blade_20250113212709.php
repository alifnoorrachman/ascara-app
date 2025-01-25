<div class="w-full md:w-80 flex flex-col items-center text-center group">
    <!-- Image Section -->
    <div class="relative w-full overflow-hidden rounded-lg sm:rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
        @if($image)
            <a href="{{ $link }}" class="block aspect-[3/4] sm:aspect-[4/5]">
                <img 
                    src="{{ $image }}" 
                    class="w-full h-full object-cover transform transition-transform duration-500 ease-in-out group-hover:scale-110" 
                    alt="{{ $title }}"
                >
                <!-- Hover Overlay with Icon -->
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-500 ease-in-out">
                    <span class="text-white text-2xl sm:text-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 transform translate-y-2 group-hover:translate-y-0">↗</span>
                </div>
            </a>
        @else
            <div class="w-full aspect-[3/4] sm:aspect-[4/5] bg-gray-200 rounded-lg sm:rounded-xl animate-pulse"></div>
        @endif
    </div>
    
    <!-- Content Section -->
    <div class="w-full p-2 sm:p-3 mt-2 sm:mt-3 text-left">
        <span class="block text-sm sm:text-base italic text-gray-600 mb-1 sm:mb-2">
            {{ $date }}
        </span>
        <h3 class="text-lg sm:text-xl font-bold line-clamp-2 hover:line-clamp-none transition-all duration-300">
            <a href="{{ $link }}" class="hover:underline transition duration-300">
                {{ $title }}
            </a>
        </h3>
    </div>
</div>
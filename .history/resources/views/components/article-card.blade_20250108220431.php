<div class="w-full sm:w-80 flex flex-col items-center text-center group">
    <!-- Image Section -->
    <div class="relative w-full overflow-hidden rounded-xl shadow-lg">
        @if($image)
            <a href="{{ $link }}" class="block">
                <img 
                    src="{{ $image }}" 
                    class="w-full h-[325px] object-cover rounded-xl transform transition-transform duration-500 ease-in-out group-hover:scale-110" 
                    alt="{{ $title }}"
                >
                <!-- Hover Overlay with Icon -->
                <div class="absolute inset-0 flex items-center justify-center bg-opacity-0 group-hover:bg-opacity-30 transition-opacity duration-500 ease-in-out">
                    <span class="text-white text-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">↗</span>
                </div>
            </a>
        @else
            <div class="absolute inset-0 bg-gray-200 rounded-xl"></div>
        @endif
    </div>
    
    <!-- Content Section -->
    <div class="p-1 mt-2 text-left">
        <span class="italic text-gray-600">
            {{ $date }}
        </span>
        <h3 class="text-xl font-bold">
            <a href="{{ $link }}" class="hover:underline transition duration-300">
                {{ $title }}
            </a>
        </h3>
    </div>
</div>

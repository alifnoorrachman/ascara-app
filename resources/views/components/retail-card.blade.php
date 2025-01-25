<div class="flex items-center space-x-6">
  <div>
    <h2 class="text-2xl font-bold text-blue-500 mb-4">{{ $title }}</h2>
    <p class="text-gray-700">{{ $description }}</p>
  </div>
  <div class="flex justify-center items-center">
    <div class="w-48 h-48 rounded-lg">
      @if($image)
      <img src="{{ asset('storage/' .$image) }}" alt="{{ $title }}" class="w-full h-full object-contain">
      @else
      <img src="https://via.placeholder.com/150" alt="Placeholder" class="w-full h-full object-contain">
      @endif
    </div>
  </div>
</div>
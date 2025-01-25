{{-- resources/views/components/public-layout.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-public-header />
    
    {{ $slot }}
    
    <x-public-footer />
</body>
</html>

{{-- resources/views/components/public-header.blade.php --}}
<header class="bg-white shadow">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold">{{ config('app.name') }}</a>
            <div class="space-x-6">
                <a href="{{ route('services') }}" class="text-gray-600 hover:text-gray-900">Services</a>
                <a href="{{ route('works') }}" class="text-gray-600 hover:text-gray-900">Works</a>
                <a href="{{ route('articles') }}" class="text-gray-600 hover:text-gray-900">Articles</a>
                <a href="{{ route('faqs') }}" class="text-gray-600 hover:text-gray-900">FAQs</a>
            </div>
        </div>
    </nav>
</header>

{{-- resources/views/components/public-footer.blade.php --}}
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-lg font-semibold mb-4">About Us</h3>
                <p class="text-gray-400">Your trusted partner in business solutions</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-white">Services</a></li>
                    <li><a href="{{ route('works') }}" class="text-gray-400 hover:text-white">Works</a></li>
                    <li><a href="{{ route('articles') }}" class="text-gray-400 hover:text-white">Articles</a></li>
                    <li><a href="{{ route('faqs') }}" class="text-gray-400 hover:text-white">FAQs</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact</h3>
                <ul class="space-y-2 text-gray-400">
                    <li>Email: info@company.com</li>
                    <li>Phone: (123) 456-7890</li>
                    <li>Address: 123 Business St</li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white">Facebook</a>
                    <a href="#" class="text-gray-400 hover:text-white">Twitter</a>
                    <a href="#" class="text-gray-400 hover:text-white">LinkedIn</a>
                </div>
            </div>
        </div>
        <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400">
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</footer>
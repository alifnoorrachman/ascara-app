<!DOCTYPE html>
<html lang="en" data-theme="{{ app(App\Services\ThemeService::class)->getCurrentTheme() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(isset($seoMeta))
    <title>{{ $seoMeta->title }}</title>
    <meta name="description" content="{{ $seoMeta->description }}">
    <meta name="keywords" content="{{ $seoMeta->keywords }}">
    @else
    <title>Asa Cahaya Dhikara</title>
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @viteReactRefresh
    @vite(['resources/css/app.css','resources/css/card.css','resources/js/app.js','resources/js/dropdown.js','resources/js/navbar.js','resources/js/app.jsx'])
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/rellax@1.12.0/rellax.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Playfair+Display:wght@400;600&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

</head>
<body class=" mt-2">
    <!-- Navbar with scroll animation -->
    <nav class=" fixed w-full mx-2 py-2 rounded-lg px-6 shadow-sm transition-transform duration-300" id="navbar">
        <div class="mx-4 sm:mx-6 lg:mx-8 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo and Dropdown -->
                <div class="flex-shrink-0 flex items-center">
                    <div class="relative flex items-center logo-container">
                        <img src="../images/LogoAscara.png" alt="Logo" class="h-12 w-12 object-cover logo-image" id="themeLogo">
                        <button id="dropdownButton" class="ml-2 text-xl font-semibold flex items-center gap-1">
                            ascara
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-1 transition-transform duration-200" id="dropdownArrow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div id="dropdownMenu" class="absolute hidden mt-2 w-48 bg-white text-colorOne rounded-lg shadow-lg py-2 z-80">
                            <a href="#" class="block px-4 py-2 text-sm">Ascara</a>
                            <a href="#" class="block px-4 py-2 text-sm">Le Menegement</a>
                            <a href="#" class="block px-4 py-2 text-sm">teMilan</a>
                        </div>
                    </div>
                </div>
    
                <!-- Desktop Navigation -->
                <div class="hidden sm:flex sm:space-x-8">
                    <a href="{{ route('home') }}" 
                       class="px-3 py-2 text-sm transition-all duration-200 hover:font-bold {{ request()->routeIs('home') ? 'font-bold' : 'font-medium' }}">
                        Home
                    </a>
                    <a href="{{ route('services') }}" 
                       class="px-3 py-2 text-sm transition-all duration-200 hover:font-bold {{ request()->routeIs('services') ? 'font-bold' : 'font-medium' }}">
                        Services
                    </a>
                    <a href="{{ route('works') }}" 
                       class="px-3 py-2 text-sm transition-all duration-200 hover:font-bold {{ request()->routeIs('works') ? 'font-bold' : 'font-medium' }}">
                        Works
                    </a>
                    <a href="{{ route('articles') }}" 
                       class="px-3 py-2 text-sm transition-all duration-200 hover:font-bold {{ request()->routeIs('articles') ? 'font-bold' : 'font-medium' }}">
                        Articles
                    </a>
                </div>
    
                <!-- Get Template Button -->
                <div class="hidden sm:flex">
                    <a href="#"
                       class="button text-sm border px-3 py-2 mt-2 inline-flex items-center gap-2 transition-colors rounded-lg">
                        Let's Talk
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
    
                <!-- Mobile menu button -->
                <div class="sm:hidden">
                    <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    
        <!-- Mobile menu -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" 
                   class="block px-3 py-2 rounded-md text-base transition-all duration-200 hover:font-bold {{ request()->routeIs('home') ? 'font-bold' : 'font-medium' }}">
                    Home
                </a>
                <a href="{{ route('services') }}" 
                   class="block px-3 py-2 rounded-md text-base transition-all duration-200 hover:font-bold {{ request()->routeIs('services') ? 'font-bold' : 'font-medium' }}">
                    Services
                </a>
                <a href="{{ route('works') }}" 
                   class="block px-3 py-2 rounded-md text-base transition-all duration-200 hover:font-bold {{ request()->routeIs('works') ? 'font-bold' : 'font-medium' }}">
                    Works
                </a>
                <a href="{{ route('articles') }}" 
                   class="block px-3 py-2 rounded-md text-base transition-all duration-200 hover:font-bold {{ request()->routeIs('articles') ? 'font-bold' : 'font-medium' }}">
                    Articles
                </a>
                <a href="#"
                   class="text-[8px] border px-3 py-1 mt-2 inline-flex items-center gap-2 transition-colors">
                    Let's Talk
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>

<!-- Add padding to body to account for fixed navbar -->
<div class="pt-16">
    @yield('content')
</div>

    
<!-- Footer Links - Right Side -->
<footer class=" mt-auto">
    <div class="mx-2 sm:mx-8 md:mx-16 lg:mx-20 px-6 pt-12 pb-1">
        <!-- Main Footer Content -->
        <div data-animate class="flex-shrink-0 pb-10 ">
            <img src="{{ $logo ?? asset('/images/Logo.png') }}" alt="Logo" class="h-10">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
            <!-- Newsletter Section - Left Side -->
            <div data-animate>
                <h2 class="text-2xl font-bold  mb-4">Join Our Newsletter</h2>
                <p class="mb-6 max-w-md">
                    Get weekly doses of digital inspiration, expert tips, and industry insights delivered straight to your inbox.
                </p>
                <form class="flex gap-4 max-w-md">
                    <input
                        type="email"
                        placeholder="enter your email"
                        class="flex-1 px-4 py-2 border-2 focus:outline-none focus:ring-2 rounded-lg"
                    />
                    <button
                        type="submit"
                        class="button px-6 py-2 border-2 font-semibold rounded-lg transition duration-300"
                    >
                        Subscribe
                    </button>
                </form>
            </div>

            <!-- Footer Links - Right Side -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-0">
                <div data-animate>
                    <h3 class="text-lg font-bold mb-4">Home</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('works') }}" class="transition">Our Work</a></li>
                        <li><a href="{{ route('services') }}" class=" transition">Service</a></li>
                        <li><a href="{{ route('articles') }}" class=" transition">Article</a></li>
                    </ul>
                </div>
                <div data-animate>
                    <h3 class="text-lg font-bold mb-4">Services</h3>
                    <ul class="space-y-2">
                        @foreach($services as $servicefooter) 
                        <li><a href="{{ route('services.show', $servicefooter->id) }}" class="transition">
                            {{ $servicefooter->title }}
                        </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div data-animate class="lg:pl-14">
                    <h3 class="text-lg font-bold mb-4">Social Media</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="transition">Instagram</a></li>
                        <li><a href="#" class="transition">TikTok</a></li>
                        <li><a href="#" class="transition">X</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom py-4 text-sm rounded-xl mb-2">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mx-2 md:mb-0">
                    <ul class="flex space-x-6">
                        <li><a href="{{route('faqs')}}">FAQ's</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
                <p class="text-center md:text-left">&copy; 2024 ASCARA. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Get the mobile menu button and mobile menu container
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
    
        // Add a click event listener to the mobile menu button
        mobileMenuButton.addEventListener('click', () => {
            // Toggle the visibility of the mobile menu
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    <!-- Sebelum closing body tag -->
    
</body>
</html>
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
    <title>Company Name - @yield('title')</title>
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @viteReactRefresh
    @vite(['resources/css/app.css','resources/css/card.css','resources/js/app.js','resources/js/navbar.js','resources/js/app.jsx'])
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/rellax@1.12.0/rellax.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Open+Sans:wght@400;700&family=Montserrat:wght@400;700&family=Lato:wght@400;700&family=Poppins:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/themes.css') }}" rel="stylesheet">


</head>
<body class="text-colorNetral bg-colorOne">
    <!-- Navbar with scroll animation -->
    {{-- <nav class="fixed w-full mx-2 rounded-lg px-6 bg-colorOne text-colorNetral shadow-sm transition-transform duration-300" id="navbar">
        <div class="mx-4 sm:mx-6 lg:mx-8 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <svg class="h-8 w-8 text-colorOne" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <a href="{{ route('home') }}" class="ml-2 text-xl font-semibold">ASCARA</a>
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
                       class="text-sm border border-colorNetral px-3 py-1 mt-2 inline-flex items-center gap-2 hover:bg-colorOne hover:text-white transition-colors rounded-lg">
                        Let's Talk
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
    
                <!-- Mobile menu button -->
                <div class="sm:hidden">
                    <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-500" aria-controls="mobile-menu" aria-expanded="false">
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
                   class="text-[8px] border border-colorNetral px-3 py-1 mt-2 inline-flex items-center gap-2 hover:bg-colorNetral hover:text-colorOne transition-colors">
                    Let's Talk
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </nav> --}}

    <nav class="fixed w-full mx-2 rounded-lg px-6 bg-colorOne text-colorNetral shadow-sm transition-transform duration-300" id="navbar">
        <div class="mx-4 sm:mx-6 lg:mx-8 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo and Dropdown -->
                <div class="flex-shrink-0 flex items-center">
                    <svg class="h-8 w-8 text-colorOne" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <div class="relative group">
                        <button class="ml-2 text-xl font-semibold flex items-center gap-1">
                            ASCARA
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-1 transition-transform duration-200 group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute hidden group-hover:block mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 1</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 2</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 3</a>
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
                       class="text-sm border border-colorNetral px-3 py-1 mt-2 inline-flex items-center gap-2 hover:bg-colorOne hover:text-white transition-colors rounded-lg">
                        Let's Talk
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
    
                <!-- Mobile menu button -->
                <div class="sm:hidden">
                    <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-500" aria-controls="mobile-menu" aria-expanded="false">
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
                   class="text-[8px] border border-colorNetral px-3 py-1 mt-2 inline-flex items-center gap-2 hover:bg-colorNetral hover:text-colorOne transition-colors">
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
<footer class="bg-colorOne text-colorNetral mt-auto">
    <div class="mx-2 sm:mx-8 md:mx-16 lg:mx-20 px-6 pt-12 pb-1">
        <!-- Main Footer Content -->
        <div data-animate class="flex-shrink-0 pb-10 ">
            <img src="{{ $logo ?? asset('/images/Logo.png') }}" alt="Logo" class="h-10">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
            <!-- Newsletter Section - Left Side -->
            <div data-animate>
                <h2 class="text-2xl font-bold  mb-4">Join Our Newsletter</h2>
                <p class="text-colorTwo mb-6 max-w-md">
                    Get weekly doses of digital inspiration, expert tips, and industry insights delivered straight to your inbox.
                </p>
                <form class="flex gap-4 max-w-md">
                    <input
                        type="email"
                        placeholder="enter your email"
                        class="flex-1 px-4 py-2 border-2 border-colorNetral focus:outline-none focus:ring-2 focus:ring-colorThree bg-colorOne text-colorNetral rounded-lg"
                    />
                    <button
                        type="submit"
                        class="px-6 py-2 text-colorNetral border-colorNetral border-2 font-semibold rounded-lg hover:bg-colorNetral hover:text-colorOne transition duration-300"
                    >
                        Subscribe
                    </button>
                </form>
            </div>

            <!-- Footer Links - Right Side -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-0">
                <div data-animate>
                    <h3 class="text-lg font-bold text-colorNetral mb-4">Home</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('works') }}" class="text-colorTwo hover:text-colorNetral transition">Our Work</a></li>
                        <li><a href="{{ route('services') }}" class="text-colorTwo hover:text-colorNetral transition">Service</a></li>
                        <li><a href="{{ route('articles') }}" class="text-colorTwo hover:text-colorNetral transition">Article</a></li>
                    </ul>
                </div>
                <div data-animate>
                    <h3 class="text-lg font-bold text-colorNetral mb-4">Services</h3>
                    <ul class="space-y-2">
                        @foreach($services as $servicefooter) 
                        <li><a href="{{ route('services.show', $servicefooter->id) }}" class="text-colorTwo hover:text-colorNetral transition">
                            {{ $servicefooter->title }}
                        </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div data-animate class="lg:pl-14">
                    <h3 class="text-lg font-bold text-colorNetral mb-4">Social Media</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-colorTwo hover:text-colorNetral transition">Instagram</a></li>
                        <li><a href="#" class="text-colorTwo hover:text-colorNetral transition">TikTok</a></li>
                        <li><a href="#" class="text-colorTwo hover:text-colorNetral transition">X</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="py-4 text-colorTwo text-sm bg-colorNetral rounded-xl mb-2">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mx-2 md:mb-0">
                    <ul class="flex space-x-6">
                        <li><a href="{{route('faqs')}}" class="hover:text-colorOne">FAQ's</a></li>
                        <li><a href="#" class="hover:text-colorOne">Terms & Conditions</a></li>
                        <li><a href="#" class="hover:text-colorOne">Privacy</a></li>
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
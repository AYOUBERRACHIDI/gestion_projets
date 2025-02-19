<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>AYBER</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('AYBER.ico') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Poppins:wght@300;400;600" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Styles -->
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 antialiased">
    <div id="app">
        <!-- Navbar -->
        <nav class="bg-gradient-to-r from-blue-700 to-indigo-500 shadow-lg fixed w-full z-50">
            <div class="container mx-auto px-6 py-3 flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ url('/home') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('AYBER.png') }}" alt="AYBER Logo" class="h-10 w-10 rounded-full border-2 border-white shadow-md hover:shadow-lg transition duration-300">
                    <span class="text-white text-2xl font-semibold tracking-wide">AYBER</span>
                </a>

                <!-- Menu Mobile -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-white focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>

                <!-- Liens Navbar -->
                <div class="hidden md:flex space-x-6">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="text-white hover:text-gray-300 transition duration-300">Connexion</a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white hover:text-gray-300 transition duration-300">Inscription</a>
                        @endif
                    @else
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center text-white hover:text-gray-300 transition duration-300">
                                {{ Auth::user()->name }}
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Dropdown -->
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50 transition duration-200 ease-out">
                                <a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block px-4 py-2 text-gray-700 hover:bg-blue-500 hover:text-white transition duration-300">
                                    Déconnexion
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        <!-- Menu Mobile (caché par défaut) -->
        <div id="mobile-menu" class="hidden fixed top-16 left-0 w-full bg-white shadow-lg md:hidden">
            <div class="px-6 py-4">
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="block py-2 text-gray-700 hover:bg-gray-100 rounded-lg">Connexion</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block py-2 text-gray-700 hover:bg-gray-100 rounded-lg">Inscription</a>
                    @endif
                @else
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                       class="block py-2 text-gray-700 hover:bg-gray-100 rounded-lg">Déconnexion</a>

                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>

        <!-- Contenu Principal -->
        <main class="pt-20 pb-8">
            <div class="container mx-auto px-6">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Script pour le menu mobile -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>

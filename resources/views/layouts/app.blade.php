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
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div id="app">
        <!-- Navbar -->
        <nav class="bg-gradient-to-r from-blue-600 to-blue-400 shadow-lg">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <a class="flex items-center" href="{{ url('/home') }}">
                        <img src="{{ asset('AYBER.png') }}" alt="AYBER Logo" class="h-10 w-10 rounded-full border-2 border-white shadow-md hover:shadow-lg transition-shadow duration-300">
                        <span class="ml-3 text-white text-xl font-bold">AYBER</span>
                    </a>

                    <!-- Menu Mobile -->
                    <button class="md:hidden flex items-center px-3 py-2 border rounded text-white border-white hover:text-blue-200 hover:border-blue-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>

                    <!-- Liens de la Navbar -->
                    <div class="hidden md:flex items-center space-x-6">
                        @guest
                            @if (Route::has('login'))
                                <a class="text-white hover:text-blue-200 transition-colors duration-300" href="{{ route('login') }}">Connexion</a>
                            @endif

                            @if (Route::has('register'))
                                <a class="text-white hover:text-blue-200 transition-colors duration-300" href="{{ route('register') }}">Inscription</a>
                            @endif
                        @else
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center text-white hover:text-blue-200 transition-colors duration-300">
                                    {{ Auth::user()->name }}
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <!-- Dropdown Menu -->
                                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50">
                                    <a class="block px-4 py-2 text-gray-800 hover:bg-blue-500 hover:text-white transition-colors duration-300" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
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
            </div>
        </nav>

        <!-- Contenu Principal -->
        <main class="py-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
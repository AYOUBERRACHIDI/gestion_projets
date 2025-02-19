<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AYBER - Project Management Tool</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Styles pour la navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.9); /* Fond semi-transparent */
            backdrop-filter: blur(10px); /* Effet de flou */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre douce */
        }

        /* Styles pour la section hero avec vidéo en arrière-plan */
        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .hero-content {
            text-align: center;
            color: white;
            z-index: 1;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
            animation: fadeInDown 1s ease-out;
        }

        .hero p {
            font-size: 1.5rem;
            margin-top: 1rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero a {
            margin-top: 2rem;
            animation: fadeIn 1.5s ease-out;
        }

        /* Animations */
        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
<div class="relative w-full h-screen overflow-hidden">
    <video autoplay muted loop class="absolute top-0 left-0 w-full h-full object-cover">
        <source src="/video2.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    

    <nav class="absolute top-0 left-0 w-full z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                
                <div class="text-2xl font-bold text-white">
                    <a href="#" class="flex items-center">
                        <img src="AYBER.ico" alt="Logo" class="h-11 w-11 mr-2">
                        <span class="text-white">AYBER</span>
                    </a>
                </div>
                
                
        <div class="hidden md:flex space-x-6">
            <a href="#home" class="nav-link">Home</a>
            <a href="#about" class="nav-link">About</a>
            <a href="#contact" class="nav-link">Contact</a>
            <a href="{{ route('login') }}" class="nav-link">Login</a>
            <a href="{{ route('register') }}" class="nav-link">Register</a>
        </div>
    

<style>
    .nav-link {
        position: relative;
        color: white;
        transition: color 0.3s ease-in-out;
    }

    .nav-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 100%;
        height: 2px;
        background-color: #3b82f6;
        transform: scaleX(0);
        transition: transform 0.3s ease-in-out;
    }

    .nav-link:hover {
        color: #3b82f6;
    }

    .nav-link:hover::after {
        transform: scaleX(1);
    }

    .register-btn {
        background-color: #3b82f6;
        color: white;
        padding: 10px 16px;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .register-btn:hover {
        background-color: #2563eb;
        transform: translateY(-2px);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
    }
</style>

                <div class="md:hidden">
                    <button id="menu-toggle" class="text-white focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-black bg-opacity-80 p-4 mt-4 rounded-lg">
            <a href="#home" class="block text-white hover:text-blue-400 py-2">Home</a>
            <a href="#about" class="block text-white hover:text-blue-400 py-2">About</a>
            <a href="#contact" class="block text-white hover:text-blue-400 py-2">Contact</a>
            <a href="{{ route('login') }}" class="block text-white hover:text-blue-400 py-2">Login</a>
            <a href="{{ route('register') }}" class="block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Register</a>
        </div>
    </nav>

    <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white px-4">
        <h1 class="text-5xl md:text-6xl font-bold">Welcome to AYBER</h1>
        <p class="mt-4 text-xl md:text-2xl">Your Ultimate Project Management Solution</p>
        <div class="mt-8">
            <a href="{{ route('register') }}" class="bg-blue-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">Get Started</a>
        </div>
    </div>
</div>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>


    <section id="about" class="container mx-auto px-4 py-16">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800">About Us</h2>
        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-700">Who We Are</h3>
                <p class="mt-4 text-gray-600">I'm Ayoub ERRACHIDI, a Full-Stack developer dedicated to streamlining workflows and helping you achieve your goals through the AYBER application.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-700">Our Mission</h3>
                <p class="mt-4 text-gray-600">Our mission is to provide you with the best tools to manage your projects efficiently.</p>
            </div>
        </div>
    </section>


    <section id="contact" class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800">Contact Us</h2>
            <div class="mt-12 max-w-2xl mx-auto">
                <form class="bg-white p-8 rounded-lg shadow-lg">
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700">Name</label>
                        <input type="text" id="name" class="w-full px-4 py-2 mt-2 rounded-lg border focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" class="w-full px-4 py-2 mt-2 rounded-lg border focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block text-gray-700">Message</label>
                        <textarea id="message" rows="5" class="w-full px-4 py-2 mt-2 rounded-lg border focus:outline-none focus:border-blue-500"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Send Message</button>
                </form>
            </div>
        </div>
    </section>


    <footer class="bg-gray-800 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold text-white">About AYBER</h3>
                    <p class="mt-4 text-gray-400">AYBER is a powerful project management tool designed to help teams collaborate and manage tasks efficiently.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Quick Links</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-blue-500">Home</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-blue-500">About</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-blue-500">Contact</a></li>
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-blue-500">Login</a></li>
                    </ul>
                </div>
                <!-- Newsletter -->
                <div>
                    <h3 class="text-xl font-bold text-white">Newsletter</h3>
                    <p class="mt-4 text-gray-400">Subscribe to our newsletter to get the latest updates.</p>
                    <form action="{{ route('newsletter.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="email" name="email" placeholder="Your email" class="w-full px-4 py-2 rounded-lg focus:outline-none" required>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-2 hover:bg-blue-600">Subscribe</button>
                    </form>
                </div>
                <!-- Social Media -->
                <div>
                    <h3 class="text-xl font-bold text-white">Follow Us</h3>
                    <div class="mt-4 flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-blue-500"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-500"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-500"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-500"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 text-center text-gray-400">
                <p>&copy; 2025 AYBER. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Script pour le menu mobile -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
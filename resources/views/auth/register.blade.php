<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .signup-background {
            background-image: url('https://img.freepik.com/free-vector/geometric-gradient-futuristic-background_23-2149116406.jpg'); /* Remplacez par votre image */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="signup-background">
    <div class="min-h-screen flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-10 rounded-lg shadow-2xl w-full max-w-md">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Create Your Account</h2>
                <p class="text-gray-600 mb-8">Join us to get started</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <input id="name" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="text-sm text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input id="email" type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="text-sm text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input id="password" type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="text-sm text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input id="password-confirm" type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" name="password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Sign Up
                </button>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Log In</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
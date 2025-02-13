<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .login-background {
            background-image: url('https://img.freepik.com/free-vector/geometric-gradient-futuristic-background_23-2149116406.jpg'); /* Remplacez par votre image */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="login-background">
    <div class="min-h-screen flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-10 rounded-lg shadow-2xl w-full max-w-md">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back</h2>
                <p class="text-gray-600 mb-8">Please log in to your account</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input id="email" type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="text-sm text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input id="password" type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="text-sm text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6 flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-600">Remember Me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:text-blue-700">
                            Forgot Password?
                        </a>
                    @endif
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Login
                </button>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hanoman App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Background image with filter */
        .bg-login {
            background-image: url('{{ asset('img/bg_pn.png') }}'); /* Ganti dengan path gambar latar belakang */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            filter: brightness(50%); /* Efek gelap pada gambar */
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Background Image with Filter -->
    <div class="bg-login"></div>

    <!-- Centered Login Form -->
    <div class="min-h-screen flex justify-center items-center relative z-10">
        <div class="max-w-sm w-full bg-white p-8 rounded-lg shadow-lg">
            <!-- Logo Section -->
            <div class="flex justify-center mb-8">
                <img src="{{ asset('img/hanoman_logo.png') }}" alt="Hanoman Logo" class="h-40 w-auto">
            </div>

            <!-- Session Status (Optional) -->
            @if(session('status'))
                <div class="mb-4 text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">{{ __('Username') }}</label>
                    <input id="username" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" type="text" name="username" :value="old('username')" required autofocus autocomplete="username">
                    @error('username')
                        <div class="mt-2 text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input id="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="mt-2 text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Forgot Password Link -->
                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 focus:outline-none" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <!-- Login Button -->
                    <button type="submit" class="w-full mt-3 py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

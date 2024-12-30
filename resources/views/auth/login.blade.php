<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css') {{-- Integrasi Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
</head>

<body class="flex items-center justify-center min-h-screen bg-cover" style="background-image: url('img/1-1.jpg')">

    <div class="w-full max-w-lg sm:max-w-xl bg-white/40 backdrop-blur-md rounded-lg shadow-md p-6 login-form"
        style="box-shadow: 0px 0px 30px rgba(227, 228, 237, 0.37);">
        <!-- Logo -->
        <a href="{{ route('beranda') }}" class="text-center mb-6">
            <img src="{{ asset('img/bps.png') }}" alt="Logo" class="mx-auto w-24 h-auto">
        </a>

        <h1 class="text-2xl font-bold text-gray-800 text-center break-words mb-6">BPS Kabupaten Jember - Secure Link
            Locker</h1>

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Login Form --}}
        <form action="{{ route('login.post') }}" method="POST" class="mt-6 space-y-4">
            @csrf

            {{-- Username --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="Input Email Anda" required>
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pr-10"
                        placeholder="••••••••" required>
                    <button type="button" id="togglePassword"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 focus:outline-none">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 transition-all duration-300 ease-in-out transform" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M3 12s3-6 9-6 9 6 9 6-3 6-9 6-9-6-9-6z" />
                            <circle cx="12" cy="12" r="3" class="eye-pupil" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Submit Button --}}
            <button type="submit"
                class="w-full bg-indigo-600 text-white font-medium rounded-lg py-2 hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 hover:shadow-xl">
                Login
            </button>
        </form>
    </div>

    {{-- Script --}}
    <script src="{{ asset('js/login.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>

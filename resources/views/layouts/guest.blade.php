<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        @php
            $setting = \App\Models\Setting::first();
        @endphp
        <!-- Top Navigation Bar -->
        <nav class="w-full border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm">
            <div class="flex items-center justify-between px-6 py-3">

                {{-- Nombre de la institución --}}
                <div class="flex items-center gap-3">
                    @if ($setting)
                        <h1 class="text-lg font-semibold text-gray-700 dark:text-gray-200 truncate">
                            {{ $setting->company_name }}
                        </h1>
                    @endif
                </div>

                {{-- Botones --}}
                <div class="flex items-center gap-2">

                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-sm font-medium rounded-md
                        {{ request()->routeIs('login')
                            ? 'bg-indigo-600 text-white'
                            : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700' }}
                        transition duration-150 ease-in-out">

                        Iniciar Sesión

                    </a>

                    @if (Route::has('register'))

                        <a href="{{ route('students.register') }}"
                            class="px-4 py-2 text-sm font-medium rounded-md
                            {{ request()->routeIs('students.register')
                                ? 'bg-indigo-600 text-white'
                                : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700' }}
                            transition duration-150 ease-in-out">

                            Registrarse

                        </a>

                    @endif

                </div>

            </div>

        </nav>
        
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="text-center">
            <a href="/">
                @if($setting && $setting->image)
                    <img
                        src="{{ asset($setting->image) }}"
                        alt="{{ $setting->company_name }}"
                        class="w-36 h-36 rounded-full object-cover mx-auto shadow-lg">
                @else
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                        Bienvenido
                    </h1>
                @endif
            </a>
        </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

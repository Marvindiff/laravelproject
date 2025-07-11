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

    <!-- Vite (JS + CSS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

    <x-banner />

    <div class="min-h-screen">
        @livewire('navigation-menu')

        <!-- Optional Page Header -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="p-4">
            {{ $slot }}
        </main>

        <!-- ✅ Logout Button -->
        <div class="px-4 py-4">
           <form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="text-red-600 hover:underline">Logout</button>
</form>

</form>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>
</html>

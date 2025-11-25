<!DOCTYPE html>
<html>

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

    <!-- Alpine.js (Somente se não tiver ainda) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased">

    {{-- TOAST GLOBAL --}}
    <div x-data="{ show: false, message: '' }"
        x-init="
            @if(session('success'))
                message = '{{ session('success') }}';
                show = true;
                setTimeout(() => show = false, 3000);
            @endif

            @if(session('error'))
                message = '{{ session('error') }}';
                show = true;
                setTimeout(() => show = false, 3000);
            @endif
         "
        x-show="show"
        x-transition
        class="fixed top-4 right-4 z-50 bg-green-600 text-white px-4 py-3 rounded-lg shadow-lg">
        <span x-text="message"></span>
    </div>
    {{-- FIM TOAST --}}

    <div class="min-h-screen flex">

        {{-- SIDEBAR --}}
        @include('layouts.sidebar')

        {{-- ÁREA PRINCIPAL --}}
        <div class="flex-1 min-h-screen bg-gray-100">

            {{-- NAV SUPERIOR --}}
            @include('layouts.navigation')

            {{-- HEADER --}}
            @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endisset

            {{-- CONTEÚDO --}}
            <main class="p-6">
                {{ $slot }}
            </main>
        </div>

    </div>

</body>

</html>
<!DOCTYPE html>
<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta description="Techcomfest adalah event nasional yang diselenggarakan oleh UKM Polytechnic Computer Club, Politeknik Negeri Semarang.">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('img/tcfest2025.webp') }}" type="image/png">

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="text-slate-800 flex flex-col gap-y-32">

    @include('components.header')

    <main class='container mx-auto flex flex-col gap-y-32'>
        @yield('content')
    </main>

    {{-- @include('components.footer') --}}

    <script  src='https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js'></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script>
    AOS.init();
    </script>
    @stack('scripts')

</body>

</html>
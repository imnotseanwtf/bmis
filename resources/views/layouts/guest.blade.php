<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-search/dist/leaflet-search.min.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-search/dist/leaflet-search.min.js"></script>
    <!-- Styles -->
    @vite('resources/sass/app.scss')
</head>

<body>
    @include('sweetalert::alert')
    <main>
        <section class="mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            @yield('content')
        </section>
    </main>
</body>

</html>

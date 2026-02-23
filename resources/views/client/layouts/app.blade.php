<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IT & Photography Portfolio')</title>
    <meta name="description" content="@yield('description', 'Portfolio của Nguyễn Duy Thanh - Developer và Photographer')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ $settings['site_favicon'] ?? asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
</head>

<body>
    @include('client.partials.navbar')

    <main id="mainContent">
        @yield('content')
    </main>

    @include('client.partials.footer')
    @include('client.partials.lightbox')

    @stack('scripts')
    <script src="{{ asset('assets/client/js/app.js') }}"></script>
</body>

</html>

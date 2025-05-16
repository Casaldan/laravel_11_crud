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

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        
        <!-- Custom CSS -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>
    <body class="bg-dark text-light">
        <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center py-4">
            <div class="mb-4">
                <a href="/">
                    <x-application-logo class="d-inline-block" style="width: 5rem; height: 5rem; filter: brightness(0) invert(1);" />
                </a>
            </div>

            <div class="w-100" style="max-width: 28rem;">
                <div class="card shadow">
                    <div class="card-body p-4">
                        {{ $slot }}
                    </div>
                </div>
            </div>
            
            <footer class="mt-4 text-center text-muted">
                <small>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</small>
            </footer>
        </div>

        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

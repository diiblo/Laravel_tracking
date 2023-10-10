<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'Delotrans-App' }}</title>
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
    </head>
    
    <body id="page-top">
        
        <div id="wrapper">
            @include('layouts.navigation')
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    {{-- Nav --}}
                    <livewire:components.nav-bar>
                    <x-livewire-alert::scripts />
                    {{-- Contenu --}}
                    {{ $slot }}
                </div>
                @include('layouts.footer')
            </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
        <script src="{{ asset('js/bs-init.js') }}"></script>
        <script src="{{ asset('js/theme.js') }}"></script>
    </body>
</html>

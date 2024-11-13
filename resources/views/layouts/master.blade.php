<!-- resources/views/layouts/adminlte.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Roboto', sans-serif;
        }
    </style>

    <!-- FontAwesome para íconos de AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMIezMIq9ZZgWRfZZRRk6tNOnE/YjN9f5ZaIJO4" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar, Sidebar y Contenido -->
    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            @yield('content_header')
        </section>

        <section class="content">
            @yield('content')
        </section>
    </div>
</div>

<!-- jQuery y AdminLTE JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRvQ3hbLx6DF7CrZ3N3q6Az8s5fbxyWkv1QhKdgyM" crossorigin="anonymous"></script>
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

@livewireScripts
@stack('js')
</body>
</html>

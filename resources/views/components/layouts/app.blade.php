@props(['title' => config('app.name')])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <link rel="icon" href="https://flowbite.s3.amazonaws.com/logo.svg" type="image/svg+xml">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

        @livewireStyles
    </head>
    <body class="">
        @include('components.layouts.header')
        
        <div class="mx-auto max-w-7xl h-[840px] ">
            {{ $slot }}
        </div>

        @include('components.layouts.footer')
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
        

    </body>
</html>

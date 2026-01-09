@props(['title' => config('app.name')])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <link rel="icon" href="https://flowbite.s3.amazonaws.com/logo.svg" type="image/svg+xml">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

        @livewireStyles
    </head>
    <body class="">
        @include('components.layouts.header')

        <div class="flex flex-col min-h-screen pt-20">
            <main class="flex-1">
                {{ $slot }}
            </main>

            @include('components.layouts.footer')
        </div>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
        <!-- Tambahkan CDN Masonry & imagesLoaded -->
        {{-- <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
        <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const grid = document.querySelector('#gallery-grid');

                // Inisialisasi Masonry
                const msnry = new Masonry(grid, {
                    itemSelector: '.gallery-card',
                    columnWidth: '.gallery-card',
                    gutter: 20,
                    fitWidth: true,
                    horizontalOrder: true
                });

                // Pastikan Masonry layout refresh setelah semua gambar loaded
                imagesLoaded(grid).on('progress', () => {
                    msnry.layout();
                });

                // Intersection Observer untuk efek reveal
                const reveals = document.querySelectorAll(".reveal");
                const observer = new IntersectionObserver(
                    (entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add("show");
                            } else {
                                entry.target.classList.remove("show");
                            }
                        });
                    },
                    { threshold: 0.2 }
                );
                reveals.forEach(el => observer.observe(el));
            });
        </script> --}}

                

    </body>
</html>

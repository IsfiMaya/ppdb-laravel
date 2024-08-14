<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>PPDB AL-ITTIHAD Pekanbaru</title>
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- lightgallery css cdn linnk -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css" />
    {{-- font family --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- toast --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- custom css file link -->
    {{--
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css" /> --}}
    {{-- <style>
        html {
            scroll-behavior: smooth;
        }
    </style> --}}
</head>

<body class="font-[Poppins] bg-[#fcf6f2] flex flex-col min-h-screen">
    <header class="bg-[#fcf6f2] sticky top-0 shadow-lg z-50">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center"> 
                <div class="flex items-center">
                    <img class="w-16" src="{{ asset('images/download_removebg_preview_1.webp') }}" alt="Logo">
                </div>
                <div class="hidden md:flex items-center space-x-4 lg:space-x-8">
                    <a class="text-[#37954b] font-bold hover:text-[#1d1c1c] transition-colors duration-300"
                        href="/">Home</a>
                    <a class="text-[#37954b] font-bold hover:text-[#1d1c1c] transition-colors duration-300"
                        href="#ppdb">Alur Pendaftaran</a>
                    <a class="text-[#37954b] font-bold hover:text-[#1d1c1c] transition-colors duration-300"
                        href="#biaya">Biaya Sekolah</a>
                    <a class="text-[#37954b] font-bold hover:text-[#1d1c1c] transition-colors duration-300"
                        href="#biaya">Syarat Pendaft ran</a>
                </div>
                <div class="flex items-center space-x-4">
                    @if (!Auth::check())
                        <a href="/masuk"
                            class="bg-[#37954b] px-6 py-2 text-white font-bold rounded-full shadow-lg hover:bg-[#2c7a3d] transition-colors duration-300">Login</a>
                    @else
                        <a href="/dashboard"
                            class="bg-[#37954b] px-6 py-2 text-white font-bold rounded-full shadow-lg hover:bg-[#2c7a3d] transition-colors duration-300">Dashboard</a>
                    @endif
                    <button id="toggleNavbar" class="md:hidden text-[#37954b]">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
            <!-- Mobile menu, show/hide based on menu state -->
            <div id="mobileMenu" class="md:hidden hidden mt-4">
                <a class="block py-2 text-[#37954b] font-bold hover:text-[#1d1c1c]" href="/">Home</a>
                <a class="block py-2 text-[#37954b] font-bold hover:text-[#1d1c1c]" href="#ppdb">Alur Pendaftaran</a>
                <a class="block py-2 text-[#37954b] font-bold hover:text-[#1d1c1c]" href="#biaya">Biaya Sekolah</a>
                <a class="block py-2 text-[#37954b] font-bold hover:text-[#1d1c1c]" href="#syarat">Syarat
                    Pendaftaran</a>
            </div>
        </nav>
    </header>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body>
    @php
        use Illuminate\Support\Facades\Auth;
    @endphp
    <div class="flex flex-col min-h-screen md:flex-row">
        <div class="bg-green-600 md:w-1/5">
            <img class="w-auto md:w-32 mx-auto mt-8" src="{{ asset('images/download_removebg_preview_1.webp') }}"
                alt="">
            <button id="toggleSidebar" class="md:hidden px-4 py-2 text-white bg-green-950 rounded-md">Buka</button>
            <div class="mx-5 text-justify text-white sidebar md:block hidden">
                @if (Auth::user()->role === 'admin')
                    <a class="block my-8 text-xl font-bold hover:text-black" href="/dashboard">Dashboard</a>
                    <a class="block my-8 text-xl font-bold hover:text-black uppercase" href="/ppdb">
                        ppdb</a>
                    <a class="block my-8 text-xl font-bold hover:text-black capitalize"
                        href="/profil_user/{{ Auth::user()->id }}">
                        profil</a>
                    <a class="block my-8 text-xl font-bold hover:text-black capitalize" href="/articles">
                        artikel</a>
                @elseif(Auth::user()->role === 'stafftu')
                    <a class="block my-8 text-xl font-bold hover:text-black" href="/dashboard">Dashboard</a>
                    <a class="block my-8 text-xl font-bold hover:text-black" href="/data_admin">Data Admin</a>
                    <a class="block my-8 text-xl font-bold hover:text-black" href="/prestasi">Prestasi</a>
                    <a class="block my-8 text-xl font-bold hover:text-black" href="/siswa">Siswa</a>
                    <a class="block my-8 text-xl font-bold hover:text-black capitalize" href="/profil">
                        profil sekolah</a>
                @else
                    <a class="block my-8 text-xl font-bold hover:text-black" href="/dashboard">Dashboard</a>
                    <a class="block my-8 text-xl font-bold hover:text-black" href="/data_diri">Data Diri</a>
                    <a class="block my-8 text-xl font-bold hover:text-black" href="/pendaftaran">Unggah Berkas</a>
                    <!-- <a class="block my-8 text-xl font-bold hover:text-black" href="/pengumuman">Pengumuman</a> -->
                @endif
            </div>
        </div>
        <div class="flex-1 bg-orange-100 md:w-4/5 w-full">
            <div class="mx-8 my-8">
                <h1 class="text-2xl font-bold text-black">Selamat datang di SMP-IT Al-Ittihad <br> Tahun Ajaran
                    2023/2024</h1>
                <div class="flex flex-col mt-5 md:flex-row md:justify-between">
                    <div class="mb-4 md:mb-0">
                        @if (Route::currentRouteName() == 'dashboard')
                            <p>Selamat datang, <span class="capitalize">{{ Auth::user()->username }}</span></p>
                        @endif
                    </div>
                    <div class="relative">
                        <div class="px-4 py-2 text-white bg-green-600 rounded-full cursor-pointer hover:bg-green-300 hover:text-black hover:font-semibold"
                            onclick="toggleDropdown()">
                            <p class="text-center capitalize">{{ mb_substr(Auth::user()->username, 0, 1) }}</p>
                        </div>
                        <div id="dropdown" class="absolute right-0 z-10 hidden mt-2 bg-white rounded-md shadow-lg">
                            <h3 class="font-semibold px-2 py-1 capitalize text-nowrap">Hai, {{ Auth::user()->username }}
                            </h3>
                            <form action="{{ route('logout') }}" class="bg-red-500" method="POST">
                                @csrf
                                <button type="submit"
                                    class="block px-5 py-2 text-sm text-white hover:font-semibold ">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/script.js') }}"></script>
<script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
        document.querySelector('.sidebar').classList.toggle('hidden');
    });
</script>

</html>
@extends('layouts.layout')

@section('content')
<!-- home section start -->
<section class="min-h-screen flex items-center bg-[#fcf6f2]" id="home">
    <div class="container mx-auto px-4 py-12">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    Selamat Datang<br />Di PPDB Online
                </h1>
                <h2 class="text-2xl md:text-3xl text-gray-600 mb-6">
                    SMP IT AL-ITTIHAD PEKANBARU
                </h2>
                <p class="text-lg text-gray-600 mb-6">
                    Terwujudnya peserta didik yang Qurani,<br> berakhlak islami dan
                    berprestasi
                </p>
                <a href="#about"
                    class="text-green-600 font-bold text-lg hover:text-green-500 transition duration-300">Lihat
                    Selengkapnya</a>
            </div>
            <div class="md:w-1/2">
                <img class="w-full h-auto rounded-lg shadow-xl" src="images/image_9.png" alt="School Image" />
            </div>
        </div>
    </div>
</section>
<!-- home section ends -->

<!-- profile section start -->
<section class="min-h-screen bg-white py-12" id="about">
    <div class="container mx-auto px-4">
        <div class="bg-green-700 text-white p-8 rounded-lg mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-center uppercase mb-2">
                profil smp it al-ittihad
            </h2>
            <p class="text-xl text-center">Akreditasi {{ $profil->akreditasi }}</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold uppercase mb-6">visi</h3>
                <p class="text-lg mb-6">
                    {{ $profil->visi }}
                </p>
                <img class="w-full max-w-sm mx-auto" src="images/charco_education_1.png" alt="Education illustration" />
            </div>
            <div>
                <h3 class="text-2xl font-bold uppercase mb-6">misi</h3>
                <ul class="list-disc pl-6 space-y-4 text-lg">
                    @foreach (json_decode($profil->misi) ?? [] as $misi)
                        <li>{{ $misi }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- profile section ends -->

<!-- achievement section start -->
<section class="min-h-screen bg-[#fcf6f2] py-12" id="achievement">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-green-700 mb-12">Prestasi</h2>

        @if ($internationalData->isNotEmpty())
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-center text-green-600 mb-6">Prestasi Internasional</h3>
                <div class="carousel-container relative overflow-x-hidden">
                    <div class="carousel flex transition-transform duration-500 ease-in-out">
                        @foreach ($internationalData as $d)
                            <div class="w-full flex-shrink-0">
                                <div class="grid md:grid-cols-2 gap-6 items-center bg-white rounded-lg shadow-lg p-6 mx-4">
                                    <div class="flex justify-center">
                                        <img class="w-full max-w-sm"
                                            src="images/green_chameleon_s_9_cc_2_sky_sjm_unsplash_1.png"
                                            alt="Achievement Illustration" />
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h4 class="text-xl font-bold mb-4">{{ $d->nama_p }}</h4>
                                        <p class="mb-4">{{$d->deskripsi}}</p>
                                        <p class="font-bold">{{$d->nama_m}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="dots flex justify-center mt-4">
                        @foreach ($internationalData as $index => $d)
                            <button class="dot w-3 h-3 bg-gray-300 rounded-full mx-1"
                                onclick="goToSlide(0, {{ $index }})"></button>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if ($nationalData->isNotEmpty())
            <div>
                <h3 class="text-2xl font-bold text-center text-green-600 mb-6">Prestasi Nasional</h3>
                <div class="carousel-container relative overflow-x-hidden">
                    <div class="carousel flex transition-transform duration-500 ease-in-out">
                        @foreach ($nationalData as $d)
                            <div class="w-full flex-shrink-0">
                                <div class="grid md:grid-cols-2 gap-6 items-center bg-white rounded-lg shadow-lg p-6 mx-4">
                                    <div class="flex justify-center">
                                        <img class="w-full max-w-sm"
                                            src="images/green_chameleon_s_9_cc_2_sky_sjm_unsplash_1.png"
                                            alt="Achievement Illustration" />
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h4 class="text-xl font-bold mb-4">{{ $d->nama_p }}</h4>
                                        <p class="mb-4">{{$d->deskripsi}}</p>
                                        <p class="font-bold">{{$d->nama_m}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="dots flex justify-center mt-4">
                        @foreach ($nationalData as $index => $d)
                            <button class="dot w-3 h-3 bg-gray-300 rounded-full mx-1"
                                onclick="goToSlide(1, {{ $index }})"></button>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
<!-- achievement section ends -->

<!-- Article section start -->
<section class="min-h-screen bg-white py-12" id="articles">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-green-700 mb-12">Artikel</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($articles as $article)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 hover:shadow-xl">
                    <img src="{{ asset("storage/{$article->article_img_path}") }}" alt="{{ $article->title }}"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2 text-gray-800">{{ $article->title }}</h3>
                        <p class="text-gray-600 text-base mb-4">{{ Str::limit($article->summary, 100) }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">{{ date('d F Y', strtotime($article->updated_at)) }}</span>
                            <a href="{{ route('article.detail', $article->slug) }}"
                                class="text-green-600 font-bold hover:text-green-500 transition duration-300">Selanjutnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Article section ends -->

<!-- ppdb section start -->
<section class="min-h-screen bg-[#fcf6f2] py-12" id="ppdb">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-yellow-500 mb-12">Informasi PPDB SMPIT AL-Ittihad
            TA.2022/2023</h2>

        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <img class="w-full max-w-md mx-auto" src="images/humaaans_3_characters_1.png" alt="PPDB Illustration">
            </div>
            <div>
                <h3 class="text-2xl font-bold mb-6"><i class="fas fa-volume-up mr-2"></i>Jadwal PPDB SMPIT Al-Ittihad
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-green-700">
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Kegiatan</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Gelombang I</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Gelombang II</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-4 px-6 border-b border-grey-light">Pendaftaran</td>
                                <td class="py-4 px-6 border-b border-grey-light">1 Nov 2021 - 20 Jan 22</td>
                                <td class="py-4 px-6 border-b border-grey-light">1 Nov 2021 - 20 Jan 22</td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 border-b border-grey-light">Psikotes</td>
                                <td class="py-4 px-6 border-b border-grey-light">20 Jan 22</td>
                                <td class="py-4 px-6 border-b border-grey-light">20 Feb 22</td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 border-b border-grey-light">Pengumuman</td>
                                <td class="py-4 px-6 border-b border-grey-light">Testing</td>
                                <td class="py-4 px-6 border-b border-grey-light">Testing</td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6">Daftar Ulang</td>
                                <td class="py-4 px-6">1 Nov 2021 - 20 Jan 22</td>
                                <td class="py-4 px-6">1 Nov 2021 - 20 Jan 22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ppdb section ends -->

<!-- biaya section start -->
<section class="min-h-screen bg-white py-12" id="biaya">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold text-green-600 mb-6">Waktu Sekolah</h3>
                <div class="bg-gray-100 p-6 rounded-lg">
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <h4 class="font-bold mb-2">Hari</h4>
                            <p>Senin - Jum'at</p>
                        </div>
                        <div>
                            <h4 class="font-bold mb-2">Waktu</h4>
                            <p>07.15 - Ba'da Solat Ashar</p>
                        </div>
                    </div>
                    <img class="w-full max-w-sm mx-auto" src="images/humaaans_3_characters_21.png"
                        alt="School Time Illustration">
                </div>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-green-600 mb-6">Biaya Pendidikan</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-green-200">
                                <th
                                    class="py-4 px-6 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Rincian</th>
                                <th
                                    class="py-4 px-6 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-100">
                                <td class="py-4 px-6 border-b border-grey-light">SPP</td>
                                <td class="py-4 px-6 border-b border-grey-light">Rp. 175.000</td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="py-4 px-6 border-b border-grey-light">Seragam Sekolah</td>
                                <td class="py-4 px-6 border-b border-grey-light">Rp. 175.000</td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="py-4 px-6 border-b border-grey-light">Buku Pelajaran</td>
                                <td class="py-4 px-6 border-b border-grey-light">Rp. 175.000</td>
                            </tr>
                            <tr class="bg-red-200">
                                <td class="py-4 px-6 font-bold">Total</td>
                                <td class="py-4 px-6">
                                    <p class="mb-2">Rp. 15.000.000 (Putra/Umum)</p>
                                    <p class="mb-2">Rp. 15.400.000 (Putri/Umum)</p>
                                    <p class="mb-2">Rp. 14.000.000 (Putra/Alumni)</p>
                                    <p>Rp. 14.400.000 (Putra/Alumni)</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-8" id="syarat">
                    <h3 class="text-2xl font-bold text-green-600 mb-4">Syarat Pendaftaran</h3>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Mengisi Formulir <a href="#" class="text-blue-600 hover:underline">Pendaftaran</a>
                        </li>
                        <li>Fotocopy Kartu Keluarga & Akta Lahir</li>
                        <li>Fotocopy Rapor Kelas 4,5,6 (*ganjil)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- biaya section ends -->
<section class="min-h-screen bg-[#fcf6f2] py-12" id="quantity">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-green-700 mb-12">Statistik Pendaftaran</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <h3 class="text-xl font-bold mb-4">Pendaftaran Hari Ini</h3>
                <p class="text-3xl font-bold text-green-600">{{$countToday}}</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <h3 class="text-xl font-bold mb-4">Total Pendaftaran</h3>
                <p class="text-3xl font-bold text-green-600">{{ $totalDaftar }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <h3 class="text-xl font-bold mb-4">Daya Tampung Laki-Laki</h3>
                <p class="text-3xl font-bold text-green-600">{{$dayaTampung->putra}}</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <h3 class="text-xl font-bold mb-4">Daya Tampung Perempuan</h3>
                <p class="text-3xl font-bold text-green-600">{{$dayaTampung->putri}}</p>
            </div>
        </div>
    </div>
</section>
<!-- pendaftar & daya tampung section ends -->
@endsection
<script>
    let carousels = [];
    let currentIndices = [];
    let slideIntervals = [];

    function showSlide(carouselIndex, index) {
        const carousel = carousels[carouselIndex];
        const slides = carousel.querySelectorAll('.carousel > div');
        const totalSlides = slides.length;

        // Adjust index if out of bounds
        if (index >= totalSlides) {
            currentIndices[carouselIndex] = 0;
        } else if (index < 0) {
            currentIndices[carouselIndex] = totalSlides - 1;
        } else {
            currentIndices[carouselIndex] = index;
        }

        // Calculate the width of each slide
        const slideWidth = slides[0].offsetWidth;

        // Move the carousel
        carousel.querySelector('.carousel').style.transform =
            `translateX(-${currentIndices[carouselIndex] * slideWidth}px)`;

        // Update dot navigation
        carousel.querySelectorAll('.dot').forEach((dot, dotIndex) => {
            dot.classList.toggle('bg-gray-800', dotIndex === currentIndices[carouselIndex]);
            dot.classList.toggle('bg-gray-500', dotIndex !== currentIndices[carouselIndex]);
        });
    }

    function nextSlide(carouselIndex) {
        showSlide(carouselIndex, currentIndices[carouselIndex] + 1);
    }

    function prevSlide(carouselIndex) {
        showSlide(carouselIndex, currentIndices[carouselIndex] - 1);
    }

    function goToSlide(carouselIndex, index) {
        showSlide(carouselIndex, index);
        resetInterval(carouselIndex);
    }

    function resetInterval(carouselIndex) {
        clearInterval(slideIntervals[carouselIndex]);
        slideIntervals[carouselIndex] = setInterval(() => nextSlide(carouselIndex),
            5000); // Change slide every 5 seconds
    }

    // Initialize the carousels
    document.addEventListener('DOMContentLoaded', () => {
        carousels = document.querySelectorAll('.carousel-container');
        carousels.forEach((carousel, index) => {
            const slides = carousel.querySelectorAll('.carousel > div');
            if (slides.length > 1) {
                currentIndices[index] = 0;
                showSlide(index, 0);
                slideIntervals[index] = setInterval(() => nextSlide(index),
                    5000); // Change slide every 5 seconds
            }
        });
    });

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
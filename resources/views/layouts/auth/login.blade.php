@extends('layouts.layout')

@section('content')
<section class="flex flex-col items-center justify-center min-h-screen bg-orange-100 px-4">
    <div class="w-full max-w-md">
        <img src="{{ asset('images/download_removebg_preview_1.png') }}" class="w-24 h-24 mx-auto mb-4" alt="Logo">
        <h3 class="text-xl font-bold text-center mb-6">PPDB IT SMP AL-ITTIHAD PEKANBARU</h3>
        <form action="{{ route('login') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input autocomplete="off"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" type="email" name="email" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" type="password" name="password" required>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
                    type="submit">
                    Masuk
                </button>
            </div>
        </form>
        <p class="text-center text-sm">
            Belum punya akun? <a href="/registrasi" class="text-red-500 hover:text-red-800">Klik disini</a>
        </p>
    </div>
</section>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        });
    </script>
@elseif (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: "{{ session('error') }}",
            });
        });
    </script>
@endif
@endsection
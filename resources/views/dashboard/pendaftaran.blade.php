@extends('dashboard.sidebar')
@section('content')
@php
    $dataClass = "block w-full text-sm text-black bg-slate-400 rounded-r-lg
                      file:mr-4 file:py-1 file:px-3
                      file:text-sm file:font-semibold
                      file:bg-slate-400 file:text-black
                      hover:file:bg-slate-100
                      mt-2
                    ";
@endphp
<form enctype="multipart/form-data" method="POST" action="/api/postDataP"
    class="flex flex-col gap-8 md:flex-row md:grid md:grid-cols-2">
    @csrf
    <div class="flex flex-col">
        <h3 class="mb-4 text-3xl text-green-700">Unggah Berkas Pendaftaran</h3>
        <label class="font-bold" for="nama">Nama</label>
        <input class="px-3 py-1 mt-2 text-black rounded-lg bg-slate-400"
            value="{{ isset($newData) && $newData ? $newData['nama'] : '' }}" type="text" name="" id="" disabled>
        <label class="mt-2 font-bold" for="npsn">NPSN</label>
        <input class="px-3 py-1 mt-2 text-black rounded-lg bg-slate-400"
            value="{{$newData && isset($newData['NPSN']) ? $newData['NPSN'] : '' }}" {{ $newData && isset($newData['NPSN']) ? 'disabled' : '' }} type="text" name="NPSN" id="">
        <label class="mt-2 font-bold" for="ijazah">Ijazah/SKL</label>
        <input type="file" class="{{ $dataClass }}" {{ $newData && isset($newData['ijazah']) ? 'disabled' : '' }}
            name="ijazah" id="ijazah" />
        @if ($newData && isset($newData['ijazah']))
            <p class="text-xs font-extrabold text-green-800">*File anda sudah diupload</p>
        @endif
        <label class="mt-2 font-bold" for="kk">KK</label>
        <input type="file" class="{{ $dataClass }}" {{ $newData && isset($newData['kk']) ? 'disabled' : '' }} name="kk"
            id="kk" />
        @if ($newData && isset($newData['kk']))
            <p class="text-xs font-extrabold text-green-800">*File anda sudah diupload </p>
        @endif
        <label class="mt-2 font-bold" for="akta_lahir">Akta Lahir</label>
        <input type="file" class="{{ $dataClass }}" {{ $newData && isset($newData['akta_lahir']) ? 'disabled' : '' }}
            name="akta_lahir" id="akta_lahir" />
        @if ($newData && isset($newData['akta_lahir']))
            <p class="text-xs font-extrabold text-green-800">*File anda sudah diupload</p>
        @endif
        <label class="mt-2 font-bold" for="nilai_raport">Nilai Raport</label>
        <input type="file" class="{{ $dataClass }}" {{ $newData && isset($newData['nilai_raport']) ? 'disabled' : '' }}
            name="nilai_raport" id="nilai_raport" />
        @if ($newData && isset($newData['nilai_raport']))
            <p class="text-xs font-extrabold text-green-800">*File anda sudah diupload</p>
        @endif
    </div>
    <div class="flex flex-col self-center">
        <h3 class="mb-4 text-3xl text-green-700 capitalize">prestasi yang pernah dicapai</h3>
        <label class="mt-2 font-bold" for="prestasi1">Nama Prestasi 1</label>
        <input type="file" class="{{ $dataClass }}" {{ $newData && isset($newData['prestasi1']) ? 'disabled' : '' }}
            name="prestasi1" id="prestasi1" />
        @if ($newData && isset($newData['prestasi1']))
            <p class="text-xs font-extrabold text-green-800">*File anda sudah diupload</p>
        @else
            <label for="validate_upload_medal" class="font-semibold text-red-500">*Upload Sertifikat/Piagam</label>
        @endif
        <label class="mt-2 font-bold" for="prestasi2">Nama Prestasi 2</label>
        <input type="file" class="{{ $dataClass }}" {{ $newData && isset($newData['prestasi2']) ? 'disabled' : '' }}
            name="prestasi2" id="prestasi2" />
        @if ($newData && isset($newData['prestasi2']))
            <p class="text-xs font-extrabold text-green-800">*File anda sudah diupload</p>
        @else
            <label for="validate_upload_medal" class="font-semibold text-red-500">*Upload Sertifikat/Piagam</label>
        @endif
        <label class="mt-2 font-bold" for="prestasi 3">Nama Prestasi 3</label>
        <input type="file" class="{{ $dataClass }}" {{ $newData && isset($newData['prestasi3']) ? 'disabled' : '' }}
            name="prestasi3" id="prestasi3" />
        @if ($newData && isset($newData['prestasi3']))
            <p class="text-xs font-extrabold text-green-800">*File anda sudah diupload</p>
        @else
            <label for="validate_upload_medal" class="font-semibold text-red-500">*Upload Sertifikat/Piagam</label>
        @endif
        <label class="mt-2 font-bold" for="b_pembayaran">Bukti Pembayaran</label>
        <input type="file" class="{{ $dataClass }}" {{ $newData && isset($newData['b_pembayaran']) ? 'disabled' : '' }}
            name="b_pembayaran" id="b_pembayaran" />
        @if ($newData && isset($newData['b_pembayaran']))
            <p class="text-xs font-extrabold text-green-800">*File anda sudah diupload</p>
        @endif
        <p class="mt-2 text-sm font-semibold uppercase text-end">BSI: 1234567</p>
        <p class="text-sm font-semibold uppercase text-end">smp unknown</p>
        <button
            class="px-3 py-1 mt-auto ml-auto bg-green-500 rounded-lg text-end hover:bg-green-700 hover:text-white">Simpan</button>
    </div>
</form>
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
@elseif (session('errors'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: "Validasi gagal. Check kembali isian anda",
            });
        });
    </script>
@elseif (session('data_available'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: "Anda telah mengisi data",
            });
        });
    </script>
@endif
@endsection
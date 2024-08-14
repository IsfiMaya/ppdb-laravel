@extends('dashboard.sidebar')
@section('content')
@php
    $dataClass = 'px-3 py-1 mt-2 text-black rounded-lg bg-slate-400';
    $dataClass2 = "block w-full text-sm text-black bg-slate-400 rounded-r-lg
                          file:mr-4 file:py-1 file:px-3
                          file:text-sm file:font-semibold
                          file:bg-slate-400 file:text-black
                          hover:file:bg-slate-100
                          mt-2
                        ";
@endphp
@if (isset($kelulusan))
    @if ($kelulusan == 1)
        <h3 class="font-bold text-green-700">Selamat anda telah Lolos!</h3>
    @elseif ($kelulusan == 0)
        <h3 class="font-bold text-red-400">Maaf, anda belum Lolos</h3>
    @else
        <span></span>
    @endif
@endif
<form id="dataDiriForm" action="/api/postData" enctype="multipart/form-data" method="POST"
    class="flex flex-col gap-8 md:flex-row md:grid md:grid-cols-2">
    @csrf
    <div class="flex flex-col">
        <label class="font-bold" for="nama">Nama</label>
        <input class="{{ $dataClass }} capitalize rounded-lg bg-slate-400" type="text" {{ $data ? 'disabled' : '' }}
            name="nama" value="{{ $data ? $data['nama'] : '' }}" id="">
        <label class="mt-2 font-bold" for="alamat">Alamat</label>
        <input class="{{ $dataClass }}" type="text" name="alamat" {{ $data ? 'disabled' : '' }}
            value="{{ $data ? $data['alamat'] : '' }}" id="">
        <label class="mt-2 font-bold" for="tanggal_lahir">Tanggal lahir</label>
        <input class="{{ $dataClass }}" type="date" {{ $data ? 'disabled' : '' }}
            value="{{ $data ? $data['tanggal_lahir'] : '' }}" name="tanggal_lahir" id="">
        <label class="mt-2 font-bold" for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jk" class="px-3 py-2 mt-2 text-black rounded-lg bg-slate-400">
            <option value="" class="capitalize">Pilih Jenis Kelamin</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        <label class="mt-2 font-bold" for="agama">Agama</label>
        <input class="{{ $dataClass }}" {{ $data ? 'disabled' : '' }} value="{{ $data ? $data['agama'] : '' }}"
            type="text" name="agama" id="">
        <label class="mt-2 font-bold" for="email">Email</label>
        <input class="{{ $dataClass }}" {{ $data ? 'disabled' : '' }} type="text" name="email" id=""
            value="{{ Auth::user()->email }}">
        <label class="mt-2 font-bold" for="no_handphone">No. Handphone</label>
        <input class="{{ $dataClass }}" {{ $data ? 'disabled' : '' }} value="{{ $data ? $data['no_handphone'] : '' }}"
            type="text" name="no_handphone" id="">
    </div>
    <div class="flex flex-col">
        <label class="mt-2 font-bold" for="nama_ayah">Nama Ayah</label>
        <input class="{{ $dataClass }}" type="text" value="{{ $data ? $data['nama_ayah'] : '' }}" name="nama_ayah" {{ $data ? 'disabled' : '' }} id="">
        <label class="mt-2 font-bold" for="pekerjaan_ayah">Pekerjaan Ayah</label>
        <input class="{{ $dataClass }}" {{ $data ? 'disabled' : '' }} value="{{ $data ? $data['pekerjaan_ayah'] : '' }}"
            type="text" name="pekerjaan_ayah" id="">
        <label class="mt-2 font-bold" for="nama_ibu">Nama Ibu</label>
        <input class="{{ $dataClass }}" {{ $data ? 'disabled' : '' }} value="{{ $data ? $data['nama_ibu'] : '' }}"
            type="text" name="nama_ibu" id="">
        <label class="mt-2 font-bold" for="pekerjaan_ibu">Pekerjaan Ibu</label>
        <input class="{{ $dataClass }}" {{ $data ? 'disabled' : '' }} value="{{ $data ? $data['pekerjaan_ibu'] : '' }}"
            type="text" name="pekerjaan_ibu" id="">
        <label class="mt-2 font-bold" for="totalPendapatan">Total Pendapatan</label>
        <input class="{{ $dataClass }}" {{ $data ? 'disabled' : '' }}
            value="{{ $data ? $data['total_pendapatan'] : '' }}" type="text" name="total_pendapatan" id="">
        <label class="mt-2 font-bold" for="no_handphone_orangtua">No. Handphone</label>
        <input class="{{ $dataClass }}" {{ $data ? 'disabled' : '' }}
            value="{{ $data ? $data['no_handphone_orangtua'] : '' }}" type="text" name="no_handphone_orangtua" id="">
        <label class="mt-2 font-bold" for="pas_photo">Pas Photo</label>
        <p class="text-xs font-semibold text-red-700">*File foto harus <span class="uppercase">jpeg/jpg/png</span>
        </p>
        <input type="file" {{ $data ? 'disabled' : '' }} class="{{ $dataClass2 }}" id="pasPhoto" name="pas_photo"
            accept="image/*" />
        <button
            class="px-3 py-1 mt-5 ml-auto bg-green-500 rounded-lg hover:text-white hover:bg-green-700">Simpan</button>
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
@elseif (isset($kelulusan))
    <!-- <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    let message = {!! $kelulusan == 1 ? "'Selamat, Anda telah Lolos'" : "'Maaf, Anda belum Lolos'" !!};
                                    Swal.fire({
                                        icon: {!! $kelulusan == 1 ? "'success'" : "'error'" !!},
                                        title: {!! $kelulusan == 1 ? "'Selamat, Anda telah Lolos'" : "'Maaf, Anda belum Lolos'" !!},
                                        text: message,
                                    });
                                });
                            </script> -->
@endif
@endsection
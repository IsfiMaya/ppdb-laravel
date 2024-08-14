@extends('layouts.layout')

@section('content')
<div class="rounded-lg mx-8 my-8 bg-white outline outline-1 outline-slate-300 px-8 py-6">
    @if ($pendaftaranDitutup)
        <div class="text-center text-red-600 font-bold text-xl">
            Mohon maaf, pendaftaran telah ditutup untuk putra dan putri karena kuota telah terpenuhi.
        </div>
    @else
        @if ($pendaftaranPutraDitutup || $pendaftaranPutriDitutup)
            <div class="text-center text-yellow-600 font-bold text-xl mb-4">
                @if ($pendaftaranPutraDitutup)
                    Pendaftaran untuk putra telah ditutup karena kuota telah terpenuhi.<br>
                @endif
                @if ($pendaftaranPutriDitutup)
                    Pendaftaran untuk putri telah ditutup karena kuota telah terpenuhi.<br>
                @endif
                @if (!$pendaftaranPutraDitutup || !$pendaftaranPutriDitutup)
                    Pendaftaran masih dibuka untuk
                    @if (!$pendaftaranPutraDitutup)
                        putra
                    @endif
                    @if (!$pendaftaranPutraDitutup && !$pendaftaranPutriDitutup)
                        dan
                    @endif
                    @if (!$pendaftaranPutriDitutup)
                        putri
                    @endif
                    .
                @endif
            </div>
        @endif
        <h3 class="text-sm md:text-lg mb-4">Sudah mendaftar? Silahkan <a href="/masuk"
                class="font-bold text-blue-600 hover:underline">login</a></h3>
        <div class="border border-1 border-black my-4"></div>
        <form action="{{ route('users') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6"
            enctype="multipart/form-data">
            @csrf
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Username <span class="text-red-500">*</span></label>
                <input autocomplete="off" type="text" name="username"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Email <span class="text-red-500">*</span></label>
                <input autocomplete="off" type="email" name="email"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Password <span class="text-red-500">*</span></label>
                <input type="password" name="password"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Nama <span class="text-red-500">*</span></label>
                <input autocomplete="off" type="text" name="nama"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Alamat <span class="text-red-500">*</span></label>
                <input autocomplete="off" type="text" name="alamat"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Asal kota <span class="text-red-500">*</span></label>
                <input type="text" name="asal_kota" id="asal_kota" list="kota_list"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500"
                    placeholder="Pilih Kota">
                <datalist id="kota_list">
                    @foreach ($kota as $id => $name)
                        <option value="{{ $name }}" data-value="{{ $id }}"></option>
                    @endforeach
                </datalist>
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Asal Sekolah <span class="text-red-500">*</span></label>
                <input autocomplete="off" type="text" name="asal_sekolah"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Tanggal Lahir <span class="text-red-500">*</span></label>
                <input autocomplete="off" type="date" name="tanggal_lahir"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                <select name="jenis_kelamin"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Agama <span class="text-red-500">*</span></label>
                <input autocomplete="off" type="text" name="agama"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">No. Handphone</label>
                <input autocomplete="off" type="tel" name="no_handphone"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Nama Ayah <span class="text-red-500">*</span></label>
                <input autocomplete="off" type="text" name="nama_ayah"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Pekerjaan Ayah <span class="text-red-500">*</span></label>
                <input autocomplete="off" type="text" name="pekerjaan_ayah"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Nama Ibu <span class="text-red-500">*</span></label>
                <input autocomplete="off" type="text" name="nama_ibu"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Pekerjaan Ibu <span class="text-red-500">*</span></label>
                <input autocomplete="off" type="text" name="pekerjaan_ibu"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">Total Pendapatan <span class="text-red-500">*</span></label>
                <input id="total_pendapatan" autocomplete="off" type="text" name="total_pendapatan"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2">No. Handphone Orangtua <span class="text-red-500">*</span></label>
                <input autocomplete="off" type="tel" name="no_handphone_orangtua"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2">
                <label class="block mb-2">Pas Foto <span class="text-red-500">*</span></label>
                <input type="file" name="pas_photo" accept="image/*"
                    class="w-full px-3 py-2 rounded-lg outline outline-1 outline-slate-300 focus:outline-blue-500">
            </div>
            <div class="col-span-2">
                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">Daftar</button>
            </div>
        </form>
    @endif
</div>
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: "{{ session('error') }}",
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const totalPendapatanInput = document.getElementById('total_pendapatan');

        totalPendapatanInput.addEventListener('input', function (e) {
            let value = this.value.replace(/\D/g, '');

            if (value != "") {
                value = parseInt(value, 10).toLocaleString('id-ID');
                this.value = "Rp " + value;
            } else {
                this.value = "";
            }
        });

        document.querySelector('form').addEventListener('submit', function (e) {
            let rawValue = totalPendapatanInput.value.replace(/\D/g, '');
            totalPendapatanInput.value = rawValue;
        });
    });
</script>
@endsection
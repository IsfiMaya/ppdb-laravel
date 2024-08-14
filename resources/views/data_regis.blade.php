@extends('layouts.layout')

@section('content')
    @if (session('success'))
        @php
            $data = session('success');
            $user = $data['user'];
            $data_diri = $data['data_diri'];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 justify-between m-4">
            <div class="rounded-lg bg-white w-full p-2 h-fit">
                <div class="flex flex-col lg:items-center mx-auto gap-2">
                    <h3>Terimakasih, <strong>{{ $data_diri->nama }}</strong></h3>
                    <h3>No pendaftaran anda {{ $data_diri->id }}</h3>
                    <p>Simpan dengan baik nomor pendaftaran Anda</p>
                    <p>Untuk melengkapi <strong>profil</strong> saudara, silahkan <strong>login</strong> di situs pbb</p>
                    <p>Silahkan melakukan pembayaran untuk pendaftaran melalui pembayaran <i>virtual account</i> pada ATM,
                        <i>Mbanking</i> Bank Muamalat Indonesia atau juga bisa menggunakan transfer bank lain dengan alamat
                        <i>virtual account</i> berikut
                    </p>
                    <p class="m-4">
                        Sebesar: IDR 250.000,00
                    </p>
                    <p class="mx-4">
                        Bank Muamalat Indonesia (147)
                    </p>
                    <p class="mx-4">
                        No VA: 123456789
                    </p>
                    <p class="mx-4">
                        a.n ISFI MAYA FAUNI
                    </p>
                </div>
            </div>
            <div class="rounded-lg bg-white w-full p-2">
                <div class="flex flex-col">
                    <img src="{{ asset('images/download_removebg_preview_1.webp') }}" class="w-24 h-full ml-5"
                        alt="">
                    <div class="flex self-center">
                        <div class="flex flex-col text-center">
                            <h3 class="font-bold">PENERIMAAN</h3>
                            <h3 class="font-bold">CALON PESERTA DIDIK BARU 2024/2025</h3>
                            <h3 class="font-bold">MTS AL-ITTIHAD PEKANBARU</h3>
                        </div>
                    </div>
                    <div class="flex flex-col ml-5 mt-2 gap-5">
                        <div class="flex">
                            <p class="font-semibold w-1/2">Gelombang</p>
                            <p>Gelombang 2</p>
                        </div>
                        <div class="flex">
                            <p class="font-semibold w-1/2">Tingkat Kelas</p>
                            <p>SMP-IT</p>
                        </div>
                        <div class="flex">
                            <p class="font-semibold w-1/2">Tgl Pendaftaran</p>
                            <p>{{ $data_diri->created_at }}</p>
                        </div>
                        <div class="flex">
                            <p class="font-semibold w-1/2">No. Pendaftaran</p>
                            <p>{{ $data_diri->id }}</p>
                        </div>
                        <div class="flex">
                            <p class="font-semibold w-1/2">Nama</p>
                            <p>{{ $data_diri->nama }}</p>
                        </div>
                        <div class="flex">
                            <p class="font-semibold w-1/2">Jenis Kelamin</p>
                            <p>{{ $data_diri->jenis_kelamin }}</p>
                        </div>
                        <div class="flex">
                            <p class="font-semibold w-1/2">Email</p>
                            <p>{{ $data_diri->email }}</p>
                        </div>
                        <div class="flex">
                            <p class="font-semibold w-1/2">Telepon</p>
                            <p>{{ $data_diri->no_handphone }}</p>
                        </div>
                        <div class="flex">
                            <p class="font-semibold w-1/2">Alamat</p>
                            <p>{{ $data_diri->alamat }}</p>
                        </div>
                        <div class="flex">
                            <p class="font-semibold w-1/2">Besar Biaya</p>
                            <p>Rp. 250.000,00</p>
                        </div>
                        <div class="flex">
                            <p class="font-semibold w-1/2"><i>Virtual Account</i></p>
                            <p>12345678910</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-start-2 place-self-end">
                <a href="{{ route('print.registration', ['userId' => $user->id]) }}" target="_blank"
                    class="rounded-lg border border-1 border-slate-500 px-4 font-bold hover:bg-slate-500">Cetak</a>
            </div>
        </div>
    @endif
@endsection

@extends('dashboard.sidebar')

@section('content')
    <div class="container mx-auto py-8">
        <form action="{{ route('tambah_profil') }}" method="POST" class="max-w-xl mx-auto grid grid-cols-1 gap-5">
            @csrf
            <div>
                <label for="akreditasi" class="block text-gray-700 text-lg font-bold mb-2">
                    Akreditasi Sekolah
                </label>
                <input type="text" id="akreditasi" name="akreditasi" autocomplete="off"
                    value="{{ old('akreditasi', $profile->akreditasi) }}"
                    class="uppercase placeholder:capitalize form-input w-full px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Akreditasi Sekolah">
                @error('akreditasi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="visi" class="block text-gray-700 text-lg font-bold mb-2">
                    Visi Sekolah
                </label>
                <textarea id="visi" name="visi" rows="6"
                    class="form-textarea w-full px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Tuliskan visi sekolah...">{{ old('visi', $profile->visi) }}</textarea>
                @error('visi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div id="mission-list">
                <label for="misi" class="block text-gray-700 text-lg font-bold mb-2">
                    Misi Sekolah
                </label>
                @foreach (json_decode($profile->misi) ?? [] as $misi)
                    <div class="mb-4 mission-item">
                        <input type="text" name="misi[]" value="{{ $misi }}"
                            class="form-input w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            placeholder="Masukkan poin misi">
                        <button type="button"
                            class="btn-remove mt-2 ml-2 px-3 py-1 bg-red-500 text-white rounded-md">Hapus</button>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end">
                <button type="button" id="btn-add"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                    Tambah Poin Misi
                </button>
            </div>

            <div class="flex justify-end">
                <button
                    class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">
                    Simpan
                </button>
            </div>

            <div class="mt-4 text-gray-700 text-lg">
                Terakhir diubah: {{ $profile->updated_at->format('F j, Y') }}
            </div>
        </form>
    </div>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                });
            });
        </script>
    @elseif (session('errors'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: "Validasi gagal. Check kembali isian anda",
                });
            });
        </script>
    @elseif (session('data_available'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: "Anda telah mengisi data",
                });
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnAdd = document.getElementById('btn-add');
            const missionList = document.getElementById('mission-list');

            btnAdd.addEventListener('click', function() {
                const newMissionItem = document.createElement('div');
                newMissionItem.classList.add('mb-4', 'mission-item');

                newMissionItem.innerHTML = `
                    <input type="text" name="misi[]" class="form-input w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Masukkan poin misi">
                    <button type="button" class="btn-remove mt-2 ml-2 px-3 py-1 bg-red-500 text-white rounded-md">Hapus</button>
                `;

                missionList.appendChild(newMissionItem);

                const btnRemove = newMissionItem.querySelector('.btn-remove');
                btnRemove.addEventListener('click', function() {
                    newMissionItem.remove(); // Hapus elemen poin misi dari tampilan
                });
            });

            // Event delegation untuk tombol hapus yang baru ditambahkan
            missionList.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('btn-remove')) {
                    const missionItem = e.target.closest('.mission-item');
                    if (missionItem) {
                        missionItem.remove(); // Hapus elemen poin misi dari tampilan
                    }
                }
            });
        });
    </script>
@endsection

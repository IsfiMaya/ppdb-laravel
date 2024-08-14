<div id="detailModal"
    class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded-lg w-1/2">
        <h2 class="text-xl font-semibold mb-4">Detail Siswa</h2>
        <form id="status" action="" method="POST">
            @csrf
            <!-- Nama Siswa -->
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                <input type="text" id="nama" name="nama"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            {{-- Nilai Siswa --}}
            <div class="mb-4">
                <label for="nilai" class="block text-sm font-medium text-gray-700">Nilai Siswa</label>
                <input type="number" id="nilai" name="nilai"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Dropdown Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <div class="mt-1">
                    <select id="kelulusan" name="status"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="0">Tidak Lulus</option>
                        <option value="1">Lulus</option>
                    </select>
                </div>
            </div>

            <!-- Footer Modal -->
            <div class="flex justify-end">
                <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-2"
                    onclick="closeModal('detailModal')">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>
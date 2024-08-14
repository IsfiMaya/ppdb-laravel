<div id="editPrestasi" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-700">Ubah Data Diri</h3>
                <div class="mt-2">
                    <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-2">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_nama">
                                    Nama Prestasi
                                </label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_nama" name="nama_p" placeholder="Masukkan nama prestasi">
                            </div>
                            <div class="col-span-full">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_jenis_p">
                                    Nama Prestasi
                                </label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="b_prestasi" id="edit_jenis_p">
                                    <option value="nasional">Nasional</option>
                                    <option value="internasional">Internasional</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_nama_siswa">
                                    Nama Siswa
                                </label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_nama_siswa" name="nama_m" placeholder="Masukkan nama siswa">
                            </div>
                            <div class="col-span-full">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_deskripsi">
                                    Deksripsi
                                </label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="deskripsi" id="edit_deskripsi" cols="30" rows="10"></textarea>
                            </div>
                            <div class="mb-4 col-span-full">
                                <button
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:w-auto sm:text-sm">
                                    Simpan
                                </button>
                                <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                    onclick="closeModal('editPrestasi')">
                                    Batal
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

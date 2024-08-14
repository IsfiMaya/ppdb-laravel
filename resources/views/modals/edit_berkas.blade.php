<div id="editBerkasModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-700">Ubah Data Berkas</h3>
                <div class="mt-2">
                    <form id="editBerkasForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="NPSN">
                                NPSN
                            </label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="NPSN" name="NPSN" placeholder="Masukkan NPSN">
                        </div>
                        <div class="mb-4 grid grid-cols-2 gap-5 md:grid-cols-3">
                            <div>
                                <label class="block mt-5 text-gray-700 text-sm font-bold mb-2" for="edit_ijazah">
                                    Ijazah
                                </label>
                                <img class="w-full h-1/2 preview-image hover:cursor-pointer mb-2 rounded-lg" id="ijazah"
                                    src="">
                                <input type="file" accept="image/*"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_ijazah" name="ijazah">
                            </div>
                            <div>
                                <label class="block mt-5
                                    text-gray-700 text-sm font-bold mb-2" for="edit_kk">
                                    Kartu Keluarga
                                </label>
                                <img class="w-full h-1/2 preview-image hover:cursor-pointer mb-2 rounded-lg" id="kk"
                                    src="">
                                <input type="file" accept="image/*"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_kk" name="kk">
                            </div>
                            <div>
                                <label class="block mt-5 text-gray-700 text-sm font-bold mb-2" for="edit_akta_lahir">
                                    Akta Kelahiran
                                </label>
                                <img class="w-full h-1/2 preview-image hover:cursor-pointer mb-2 rounded-lg"
                                    id="akta_lahir" src="">
                                <input type="file" accept="image/*"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_akta_lahir" name="akta_lahir">
                            </div>
                            <div>
                                <label class="block mt-5 text-gray-700 text-sm font-bold mb-2" for="edit_nilai_raport">
                                    Nilai Raport
                                </label>
                                <img class="w-full h-1/2 preview-image hover:cursor-pointer mb-2 rounded-lg"
                                    id="nilai_raport" src="">
                                <input type="file" accept="image/*"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_nilai_raport" name="nilai_raport">
                            </div>
                            <div>
                                <label class="block mt-5 text-gray-700 text-sm font-bold mb-2" for="edit_prestasi1">
                                    Prestasi 1
                                </label>
                                <img class="w-full h-1/2 preview-image hover:cursor-pointer mb-2 rounded-lg"
                                    id="prestasi1" src="">
                                <input type="file" accept="image/*"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_prestasi1" name="prestasi1">
                            </div>
                            <div>
                                <label class="block mt-5 text-gray-700 text-sm font-bold mb-2" for="edit_prestasi2">
                                    Prestasi 2
                                </label>
                                <img class="w-full h-1/2 preview-image hover:cursor-pointer mb-2 rounded-lg"
                                    id="prestasi2" src="">
                                <input type="file" accept="image/*"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_prestasi2" name="prestasi2">
                            </div>
                            <div>
                                <label class="block mt-5 text-gray-700 text-sm font-bold mb-2" for="edit_prestasi3">
                                    Prestasi 3
                                </label>
                                <img class="w-full h-1/2 preview-image hover:cursor-pointer mb-2 rounded-lg"
                                    id="prestasi3" src="">
                                <input type="file" accept="image/*"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_prestasi3" name="prestasi3">
                            </div>
                            <div>
                                <label class="block mt-5 text-gray-700 text-sm font-bold mb-2"
                                    for="edit_bukti_pembayaran">
                                    Bukti Pembayaran
                                </label>
                                <img class="w-full h-1/2 preview-image hover:cursor-pointer mb-2 rounded-lg"
                                    id="b_pembayaran" src="">
                                <input type="file" accept="image/*"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_bukti_pembayaran" name="b_pembayaran">
                            </div>
                        </div>
                        <div class="mb-4">
                            <button
                                class="w-full mt-8 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:w-auto sm:text-sm">
                                Simpan
                            </button>
                            <button type="button"
                                class="mt-8 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                onclick="closeModal('editBerkasModal')">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
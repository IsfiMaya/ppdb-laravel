<div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
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
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_nama">
                                    Nama
                                </label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_nama" name="nama" placeholder="Masukkan nama">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_alamat">
                                    Alamat
                                </label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_alamat" name="alamat" placeholder="Masukkan alamat">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_tanggal_lahir">
                                    Tanggal Lahir
                                </label>
                                <input type="date"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan tanggal lahir">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_jenis_kelamin">
                                    Jenis Kelamin
                                </label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_jenis_kelamin" name="jenis_kelamin">
                                    <option value="">Pilih jenis kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_agama">
                                    Agama
                                </label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_agama" name="agama" placeholder="Masukkan agama">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_email">
                                    Email
                                </label>
                                <input type="email"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_email" name="email" placeholder="Masukkan email">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_no_hp">
                                    No Handphone
                                </label>
                                <input type="number"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_no_hp" name="no_handphone" placeholder="Masukkan No Handphone">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_nama_ayah">
                                    Nama Ayah
                                </label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_pekerjaan_ayah">
                                    Pekerjaan Ayah
                                </label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_pekerjaan_ayah" name="pekerjaan_ayah"
                                    placeholder="Masukkan Pekerjaan Ayah">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_nama_ibu">
                                    Nama Ibu
                                </label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_pekerjaan_ibu">
                                    Pekerjaan Ibu
                                </label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="edit_pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_total_pendapatan">
                                Total Pendapatan
                            </label>
                            <input type="number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="edit_total_pendapatan" name="total_pendapatan"
                                placeholder="Masukkan Total Pendapatan">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_no_hp_orangtua">
                                No Handphone Orangtua
                            </label>
                            <input type="number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="edit_no_hp_orangtua" name="no_handphone_orangtua"
                                placeholder="Masukkan No Handphone Orangtua">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_pas_photo">
                                Pas Photo
                            </label>
                            <img class="w-32 mb-2 rounded-lg" id="imagePrev" src="">
                            <input type="file"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="edit_pas_photo" name="pas_photo">
                        </div>
                        <div class="mb-4">
                            <button
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:w-auto sm:text-sm">
                                Simpan
                            </button>
                            <button type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                onclick="closeModal('editModal')">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
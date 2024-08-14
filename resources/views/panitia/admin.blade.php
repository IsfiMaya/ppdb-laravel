@extends('dashboard.sidebar')
@section('content')
    <div class="mt-5">
        <div class="mt-2">
            <form id="editForm" action="{{ route('edit_admin', $data->id) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_username">
                        Username
                    </label>
                    <input type="text" value="{{ $data->username }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="edit_username" name="username" placeholder="Masukkan username">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_email">
                        Email
                    </label>
                    <input type="email" value="{{ $data->email }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="edit_email" name="email" placeholder="Masukkan email">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_password">
                        Password
                    </label>
                    <input type="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="edit_password" name="password" placeholder="Masukkan password">
                    <p class="text-red-500 font-bold text-sm">*Isi password jika hanya ingin diubah</p>
                </div>
                <div class="mb-4">
                    <button
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:w-auto sm:text-sm">
                        Ubah
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
        function openModal(modalId, data = null) {
            if (data) {
                document.getElementById('edit_username').value = data.username;
                document.getElementById('edit_email').value = data.email;

                document.getElementById('edit_password').value = '';

                document.getElementById('editForm').action = '/edit_admin/' + data.id;
            }
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        function editAdmin(data) {
            openModal('editModal', data);
        }

        function deleteAdmin(data) {
            document.getElementById('deleteForm').action = '/delete_admin/' + data;
            openModal('deleteModal');
        }
    </script>
@endsection

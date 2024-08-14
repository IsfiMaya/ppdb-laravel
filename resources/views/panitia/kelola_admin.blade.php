@extends('dashboard.sidebar')
@section('content')
<div class="mt-5">
    <button
        class="capitalize mb-2 rounded-lg bg-green-600 px-3 py-1 font-bold text-white hover:text-black hover:bg-green-300"
        onclick="openModal('addModal')">Tambah Admin</button>
    <table id="adminTable" class="display w-full">
        <thead>
            <tr>
                <th class="border border-slate-600 w-1/12 py-2 px-4">No</th>
                <th class="border border-slate-600 w-1/5 py-2 px-4">Nama</th>
                <th class="border border-slate-600 w-2/5 py-2 px-4">Email</th>
                <th class="border border-slate-600 w-1/12 py-2 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td class="pl-5 border border-slate-700"></td>
                    <td class="pl-5 border border-slate-700">{{ $d->username }}</td>
                    <td class="pl-5 border border-slate-700">{{ $d->email }}</td>
                    <td class="pl-5 border border-slate-700">
                        <div class="flex justify-center items-center gap-2 my-1">
                            <button onclick="editAdmin({{ json_encode($d) }})"
                                class="text-yellow-500 text-xl rounded-lg px-2 py-1 hover:text-yellow-700"><i
                                    class="fas fa-edit"></i></button>
                            <button class="text-red-500 text-xl rounded-lg px-2 py-1 hover:text-red-700"
                                onclick="deleteAdmin({{ json_encode($d->id) }})"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Ubah Admin</h3>
                <div class="mt-2">
                    <form id="editForm" action="" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_username">
                                Username
                            </label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="edit_username" name="username" placeholder="Masukkan username">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_email">
                                Email
                            </label>
                            <input type="email"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="edit_email" name="email" placeholder="Masukkan email">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit_password">
                                Password
                            </label>
                            <input type="password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="edit_password" name="password" placeholder="Masukkan password">
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

<!-- Add Modal -->
<div id="addModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Tambah Admin</h3>
                <div class="mt-2">
                    <form action="{{ route('tambah_admin') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="add_username">
                                Username
                            </label>
                            <input type="text" autocomplete="off"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="add_username" name="username" placeholder="Masukkan username">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="add_email">
                                Email
                            </label>
                            <input type="email"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="add_email" name="email" placeholder="Masukkan email">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="add_password">
                                Password
                            </label>
                            <input type="password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="add_password" name="password" placeholder="Masukkan password">
                        </div>
                        <div class="mb-4">
                            <button
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:w-auto sm:text-sm">
                                Simpan
                            </button>
                            <button type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                onclick="closeModal('addModal')">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Hapus Admin</h3>
                <div class="mt-2">
                    <h3>Apakah anda yakin ingin menghapus admin ini?</h3>
                    <div class="flex gap-2 mb-4 mt-2 justify-center">
                        <form id="deleteForm" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:w-auto sm:text-sm">
                                Iya
                            </button>
                            <button type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                onclick="closeModal('deleteModal')">
                                Batal
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script>
    $(document).ready(function () {
        $('#adminTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            columnDefs: [{
                targets: 0,
                orderable: false,
                className: 'dt-center',
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            }]
        });
        $('.dataTables_wrapper .dataTables_filter').addClass('mb-5');
    });

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
@extends('dashboard.sidebar')
@section('content')
    <div class="mt-5 overflow-x-auto">
        <button
            class="capitalize mb-2 rounded-lg bg-green-600 px-3 py-1 font-bold text-white hover:text-black hover:bg-green-300"
            onclick="openModal('addModal')">Tambah Prestasi</button>
        <table id="prestasiTable" class="display w-full">
            <thead>
                <tr>
                    <th class="border border-slate-600 w-1/12 py-2 px-4">No</th>
                    <th class="border border-slate-600 w-2/5 py-2 px-4">Nama Prestasi</th>
                    <th class="border border-slate-600 w-2/5 py-2 px-4">Deskripsi</th>
                    <th class="border border-slate-600 w-2/3 py-2 px-4">Nama Siswa</th>
                    <th class="border border-slate-600 w-2/3 py-2 px-4">Jenis Prestasi</th>
                    <th class="border border-slate-600 w-1/12 py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td class="pl-5 border font-semibold border-slate-700 py-2 px-4"></td>
                        <td class="px-2 border border-slate-600">{{ $d->nama_p }}</td>
                        <td class="px-2 border border-slate-600">{{ $d->deskripsi }}</td>
                        <td class="px-2 border border-slate-600">{{ $d->nama_m }}</td>
                        <td class="px-2 border border-slate-600 capitalize">{{ $d->b_prestasi }}</td>
                        <td class="px-2 border border-slate-600">
                            <div class="flex justify-center items-center gap-2">
                                <button onclick="editModal('editPrestasi',{{ json_encode($d) }})"
                                    class="text-black text-xl  rounded-lg px-2 py-1 hover:text-yellow-700">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deleteModal({{ json_encode($d->id) }})"
                                    class="text-red-500 text-xl  rounded-lg px-2 py-1 hover:text-red-700">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('modals.tambah_prestasi')
    @include('modals.edit_prestasi')
    @include('modals.delete_data')

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
        $(document).ready(function() {
            $('#prestasiTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                columnDefs: [{
                    targets: 0,
                    orderable: false,
                    className: 'dt-center',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                }]
            });
            $('.dataTables_wrapper .dataTables_filter').addClass('mb-5');
        });

        function openModal(modalId, data = null) {
            if (data) {
                document.getElementById('edit_nama').value = data.nama_p;
                document.getElementById('edit_deskripsi').value = data.deskripsi;
                document.getElementById('edit_nama_siswa').value = data.nama_m;
                document.getElementById('edit_jenis_p').value = data.b_prestasi;


                document.getElementById('editForm').action = '/edit_prestasi/' + data.id;
            }
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        function editModal(modalId, data) {
            openModal(modalId, data);
        }

        function deleteModal(data) {
            document.getElementById('deleteForm').action = '/delete_prestasi/' + data;
            document.getElementById("deletePrestasi").classList.remove('hidden');
        }
    </script>
@endsection

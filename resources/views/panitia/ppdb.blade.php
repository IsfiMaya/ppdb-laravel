@extends('dashboard.sidebar')
@section('content')
    <div class="mt-5 overflow-x-auto">
        <table id="myTable" class="display w-full">
            <thead>
                <tr>
                    <th class="border border-slate-600 w-1/12 py-2 px-4">No</th>
                    <th class="border border-slate-600 w-2/5 py-2 px-4">Nama</th>
                    <th class="border border-slate-600 w-2/5 py-2 px-4">Email</th>
                    <th class="border border-slate-600 w-2/5 py-2 px-4">Asal Sekolah</th>
                    <th class="border border-slate-600 w-2/5 py-2 px-4">Progres</th>
                    <th class="border border-slate-600 w-fit py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td class="pl-5 border font-semibold border-slate-700 py-2 px-4"></td>
                        <td class="pl-5 border font-semibold border-slate-700 py-2 px-4">{{ $d->nama }}</td>
                        <td class="pl-5 border font-semibold border-slate-700 py-2 px-4">{{ $d->email }}</td>
                        <td class="pl-5 border font-semibold border-slate-700 py-2 px-4">{{ $d->user->asal_sekolah }}</td>
                        <td class="pl-5 border font-semibold border-slate-700 py-2 px-4">
                            {{ ($d->pendaftaran === null ? 'Mengisi kelengkapan berkas' : $d->user->verifikasi == 0) ? 'Belum ter-verifikasi' : 'Terverifikasi' }}
                        </td>
                        <td class="pl-5 border font-semibold border-slate-700 py-2 px-4">
                            @if (in_array($d->id, $kelulusan))
                                <div class="flex justify-between items-center gap-2">
                                    <button class="text-black text-xl rounded-lg px-2 py-1 hover:text-yellow-700"
                                        onclick="openDetailModal({{ json_encode($d) }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-500 text-xl rounded-lg px-2 py-1 hover:text-red-700"
                                        onclick="openDeleteModal({{ json_encode($d) }})">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            @else
                                <div class="flex justify-start items-center gap-2">
                                    <button
                                        class="text-black text-xl rounded-lg px-2 py-1 hover:text-yellow-700
                                {{ $d->user->verifikasi == 0 ? 'hover:cursor-not-allowed' : '' }}"
                                        {{ $d->user->verifikasi == 0 ? 'disabled' : '' }}
                                        onclick="openDetailModal({{ json_encode($d) }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    @include('modals.kelulusan_detail')

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal"
        class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded-lg">
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <form id="deleteData" method="POST" class="flex justify-end mt-4">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-4 py-2 rounded-lg mr-2">Hapus</button>
                <button class="bg-gray-300 px-4 py-2 rounded-lg" onclick="closeModal('deleteModal')">Cancel</button>
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
        $(document).ready(function() {
            $('#myTable').DataTable({
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

        function openDetailModal(data = null) {
            console.log(JSON.stringify(data.kelulusan))
            if (data) {
                document.getElementById('nama').value = data.nama;
                document.getElementById('nilai').value = data.kelulusan && data.kelulusan.nilai ? data.kelulusan.nilai : null;
                document.getElementById('kelulusan').value = data.kelulusan && data.kelulusan.status ? data.kelulusan.status : null;
                document.getElementById('status').action = '/ppdb/' + data.id;
            }
            document.getElementById('detailModal').classList.remove('hidden');
        }

        function openDeleteModal(data = null) {
            document.getElementById('deleteData').action = '/delete_ppdb/' + data.id + '/' + data.user_id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
@endsection
@extends('dashboard.sidebar')
@section('content')
<div class="mt-5 overflow-x-auto">
    <table id="siswaTable" class="display w-full">
        <thead>
            <tr>
                <th class="border border-slate-600 w-1/12 py-2 px-4">No</th>
                <th class="border border-slate-600 w-2/5 py-2 px-4">Nama</th>
                <th class="border border-slate-600 w-2/5 py-2 px-4">Email</th>
                <th class="border border-slate-600 w-2/5 py-2 px-4">Verifikasi</th>
                <th class="border border-slate-600 w-1/12 py-2 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td class="pl-5 border font-semibold border-slate-700 py-2 px-4"></td>
                    <td class="pl-5 border font-semibold border-slate-700 py-2 px-4">{{ $d->nama }}</td>
                    <td class="pl-5 border font-semibold border-slate-700 py-2 px-4">{{ $d->email }}</td>
                    <td class="pl-5 border font-semibold border-slate-700 py-2 px-4">
                        <form action="{{ route('updateVerificationStatus', $d->user_id) }}" class="flex gap-2"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <input type="checkbox" {{ $d->pendaftaran === null ? 'disabled' : '' }} name="is_verified"
                                value="1" {{ $d->user->verifikasi ? 'checked' : '' }} onchange="this.form.submit()">
                            <p>{{ $d->pendaftaran === null ? 'Belum Lengkap' : 'Lengkap' }}</p>
                        </form>
                    </td>
                    <td class="pl-5 border font-semibold border-slate-700 py-2 px-4">
                        <div class="flex justify-center items-center gap-2">

                            <button onclick="editModal('editModal',{{ json_encode($d) }})"
                                class="text-black text-xl rounded-lg px-2 py-1 hover:text-yellow-700">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="editModal('editBerkasffModal',{{ json_encode($d) }})"
                                class="text-blue-500 text-xl rounded-lg px-2 py-1 hover:text-blue-700">
                                <i class="fas fa-file-alt"></i>
                            </button>
                            <!-- <button onclick="deleteAdmin({{ json_encode($d->id) }})"
                                            class="text-red-500 text-xl rounded-lg px-2 py-1 hover:text-red-700">
                                            <i class="fas fa-trash-alt"></i>
                                        </button> -->
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- Edit Pendaftaran Modal -->
@include('modals.edit_data_diri')
{{-- Edit Berkas modal --}}
@include('modals.edit_berkas')
{{-- Delete Modal --}}
@include('modals.delete_data')
{{-- preview image --}}
@include('modals.preview_image')

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
        $('#siswaTable').DataTable({
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
        })
        $('.dataTables_wrapper .dataTables_filter').addClass('mb-5');
    })

    function openPreviewModal(imageUrl) {
        document.getElementById('previewImage').src = imageUrl;
        document.getElementById('imagePreviewModal').classList.remove('hidden');
    }

    document.addEventListener('click', function (event) {
        if (event.target.matches('.preview-image')) {
            openPreviewModal(event.target.src);
        }
    });

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imagePrev').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#edit_pas_photo').on('change', function () {
        previewImage(this);
    });

    function openModal(modalId, data = null) {
        if (modalId === 'editModal') {
            if (data) {
                document.getElementById('edit_nama').value = data.nama;
                document.getElementById('edit_email').value = data.email;
                document.getElementById('edit_alamat').value = data.alamat;
                document.getElementById('edit_tanggal_lahir').value = data.tanggal_lahir;
                document.getElementById('edit_jenis_kelamin').value = data.jenis_kelamin;
                document.getElementById('edit_agama').value = data.agama;
                document.getElementById('edit_no_hp').value = data.no_handphone;
                document.getElementById('edit_nama_ayah').value = data.nama_ayah;
                document.getElementById('edit_pekerjaan_ayah').value = data.pekerjaan_ayah;
                document.getElementById('edit_nama_ibu').value = data.nama_ibu;
                document.getElementById('edit_pekerjaan_ibu').value = data.pekerjaan_ibu;
                document.getElementById('edit_total_pendapatan').value = data.total_pendapatan;
                document.getElementById('edit_no_hp_orangtua').value = data.no_handphone_orangtua;
                let imageUrl = "{{ asset('storage') }}" + data.pas_photo;
                document.getElementById('imagePrev').src = imageUrl;

                document.getElementById('editForm').action = '/edit_data_diri/' + data.id;
            }
        } else {
            if (data.pendaftaran) {
                document.getElementById('NPSN').value = data.pendaftaran.NPSN;
                document.getElementById('ijazah').src = "{{ asset('storage') }}" + data.pendaftaran.ijazah;
                document.getElementById('kk').src = "{{ asset('storage') }}" + data.pendaftaran.kk;
                document.getElementById('akta_lahir').src = "{{ asset('storage') }}" + data.pendaftaran.akta_lahir;
                document.getElementById('nilai_raport').src = "{{ asset('storage') }}" + data.pendaftaran.nilai_raport;
                document.getElementById('prestasi1').src = "{{ asset('storage') }}" + data.pendaftaran.prestasi1;
                document.getElementById('prestasi2').src = "{{ asset('storage') }}" + data.pendaftaran.prestasi2;
                document.getElementById('prestasi3').src = "{{ asset('storage') }}" + data.pendaftaran.prestasi3;
                document.getElementById('b_pembayaran').src = "{{ asset('storage') }}" + data.pendaftaran.b_pembayaran;

            } else {
                document.getElementById('editBerkasForm').action = '/postDataPByAdmin/' + data.user.id;

            }
        }
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        if (modalId === 'editBerkasModal') {
            document.getElementById('NPSN').value = '';
            document.getElementById('ijazah').src = "";
            document.getElementById('kk').src = "";
            document.getElementById('akta_lahir').src = "";
            document.getElementById('nilai_raport').src = "";
            document.getElementById('prestasi1').src = "";
            document.getElementById('prestasi2').src = "";
            document.getElementById('prestasi3').src = '';
            document.getElementById('b_pembayaran').src = '';
        }
        document.getElementById('edit_pas_photo').value = '';
        document.getElementById('imagePrev').src = '';
        document.getElementById(modalId).classList.add('hidden');
    }

    function editModal(modalId, data) {
        openModal(modalId, data);
    }

    function deleteAdmin(data) {
        document.getElementById('deleteForm').action = '/delete_admin/' + data;
        document.getElementById('deletePrestasi').classList.remove('hidden');

        deletePrestasi
    }
</script>
@endsection
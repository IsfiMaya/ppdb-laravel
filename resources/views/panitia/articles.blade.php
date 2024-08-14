@extends('dashboard.sidebar')
@section('content')
<div class="mt-5 overflow-x-auto">
    <button
        class="capitalize mb-2 rounded-lg bg-green-600 px-3 py-1 font-bold text-white hover:text-black hover:bg-green-300"
        onclick="openModal('addModal')">Tambah Artikel</button>
    <table id="articleTable" class="display w-full">
        <thead>
            <tr>
                <th class="border border-slate-600 w-1/12 py-2 px-4">No</th>
                <th class="border border-slate-600 w-1/4 py-2 px-4">Judul</th>
                <th class="border border-slate-600 w-2/5 py-2 px-4">Deskripsi</th>
                <th class="border border-slate-600 w-1/12 py-2 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td class="pl-5 border font-semibold border-slate-700 py-2 px-4"></td>
                    <td class="px-2 border border-slate-600">{{ $d->title }}</td>
                    <td class="px-2 border border-slate-600">{{ Str::limit($d->summary, 100) }}</td>
                    <td class="border border-slate-600 flex justify-center items-center gap-2">
                        <button onclick="editModal('editArtikel',{{ json_encode($d) }})"
                            class="text-blue-500 text-xl rounded-lg px-2 py-1 hover:text-blue-700">
                            <i class="fas fa-file-alt"></i>
                        </button>
                        <button onclick="deleteAdmin({{ json_encode($d->id) }})" type="button"
                            class="text-red-500 text-xl rounded-lg px-2 py-1 hover:text-red-700">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('modals.tambah_artikel')
@include('modals.preview_image')
@include('modals.edit_artikel')
@include('modals.delete')

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
        $('#articleTable').DataTable({
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

    function openPreviewModal(imageUrl) {
        document.getElementById('previewImage').src = imageUrl;
        document.getElementById('imagePreviewModal').classList.remove('hidden');
    }

    document.addEventListener('click', function (event) {
        if (event.target.matches('.preview-image')) {
            openPreviewModal(event.target.src);
        }
    });

    function previewImage(input, type = null) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                if (type === 'edit') {
                    $('#imagePrevEdit').attr('src', e.target.result);
                } else {
                    $('#imagePrev').attr('src', e.target.result);
                }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#add_image_article').on('change', function () {
        previewImage(this);
    });
    $('#edit_gambar_artikel').on('change', function () {
        previewImage(this, 'edit');
    });

    function openModal(modalId, data = null) {
        if (modalId === 'editArtikel') {
            if (data) {
                let imageUrl = "{{ asset('storage') }}" + data.article_img_path;
                document.getElementById('imagePrevEdit').src = imageUrl;
                document.getElementById('edit_judul').value = data.title;
                document.getElementById('edit_deskripsi').value = data.summary;

                document.getElementById('editForm').action = '/edit_artikel/' + data.id;
            }
        }

        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById('imagePrev').src = '';
        document.getElementById('add_image_article').value = '';
        document.getElementById('title').value = '';
        document.getElementById('summary').value = '';
        document.getElementById(modalId).classList.add('hidden');
    }

    function editModal(modalId, data) {
        openModal(modalId, data);
    }

    function deleteAdmin(data) {
        document.getElementById('deleteForm').action = '/delete_article/' + data;
        openModal('deleteModal');
    }
</script>
@endsection
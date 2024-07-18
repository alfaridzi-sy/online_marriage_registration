@extends('layouts.master')

@section('page_title', 'Syarat dan Ketentuan - Online Marriage Registration System')

@section('breadcrumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Syarat dan Ketentuan</li>
                        <li class="breadcrumb-item active">Daftar Syarat dan Ketentuan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5>Syarat dan Ketentuan</h5>
                <span>Manajemen syarat dan ketentuan memastikan informasi yang jelas dan tepat.</span>
            </div>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Syarat dan
                    Ketentuan</button>
            </div>
        </div>
        <div class="card-body row">
            <div id="alertContainer" class="fixed-bottom w-100 mb-4"></div>
            <div class="col-sm-12 col-lg-12 col-xl-12">
                <div class="table-responsive">
                    <table id="tabelTerms" class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Judul</th>
                                <th scope="col" class="text-center">Deskripsi</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($terms->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data tersedia</td>
                                </tr>
                            @else
                                @foreach ($terms as $key => $term)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $term->title }}</td>
                                        <td>{{ $term->description }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-warning btn-block" data-id="{{ $term->id }}"
                                                    onclick="editTerm(event)">Edit</button>
                                                <button class="btn btn-secondary btn-block"
                                                    onclick="konfirmasiHapusTerm({{ $term->id }})">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Term -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Syarat dan Ketentuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formTambah">
                        @csrf
                        <div class="mb-2">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpanTerm()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Term -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Syarat dan Ketentuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEdit">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_id" name="id">
                        <div class="form-group mb-2">
                            <label for="edit_title">Judul</label>
                            <input type="text" class="form-control" id="edit_title" name="title" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="edit_description">Deskripsi</label>
                            <textarea class="form-control" id="edit_description" name="description" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateTerm()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="modalKonfirmasiHapus" tabindex="-1" aria-labelledby="modalKonfirmasiHapusLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKonfirmasiHapusLabel">Konfirmasi Hapus Syarat dan Ketentuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus syarat dan ketentuan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="btnHapusTerm">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function simpanTerm() {
            var formData = $('#formTambah').serialize();

            $.ajax({
                url: '{{ route('terms_and_conditions.store') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#modalTambah').modal('hide');
                    $('#formTambah')[0].reset();
                    $('#tabelTerms').load(location.href + ' #tabelTerms');
                    tampilkanAlert(response.success, 'success');
                },
                error: function(xhr) {
                    $('#modalTambah').modal('hide');
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        tampilkanAlert(value[0], 'danger');
                    });
                }
            });
        }

        function editTerm(event) {
            var id = $(event.target).data('id');
            $.get('/ketua_stasi/terms_and_conditions/' + id + '/edit', function(data) {
                $('#edit_id').val(data.id);
                $('#edit_title').val(data.title);
                $('#edit_description').val(data.description);
                $('#modalEdit').modal('show');
            });
        }

        function updateTerm() {
            var id = $('#edit_id').val();
            var formData = $('#formEdit').serialize();

            $.ajax({
                url: '/ketua_stasi/terms_and_conditions/' + id,
                type: 'PUT',
                data: formData,
                success: function(response) {
                    $('#modalEdit').modal('hide');
                    $('#tabelTerms').load(location.href + ' #tabelTerms');
                    tampilkanAlert(response.success, 'success');
                },
                error: function(xhr) {
                    $('#modalEdit').modal('hide');
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        tampilkanAlert(value[0], 'danger');
                    });
                }
            });
        }

        function konfirmasiHapusTerm(id) {
            $('#modalKonfirmasiHapus').modal('show');
            $('#btnHapusTerm').attr('onclick', 'hapusTerm(' + id + ')');
        }

        function hapusTerm(id) {
            $.ajax({
                url: '/ketua_stasi/terms_and_conditions/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#modalKonfirmasiHapus').modal('hide');
                    $('#tabelTerms').load(location.href + ' #tabelTerms');
                    tampilkanAlert(response.success, 'success');
                },
                error: function(xhr) {
                    $('#modalKonfirmasiHapus').modal('hide');
                    tampilkanAlert('Terjadi kesalahan saat menghapus data', 'danger');
                }
            });
        }

        function tampilkanAlert(message, type) {
            var alertContainer = $('#alertContainer');
            var alert = $('<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' + message +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            alertContainer.append(alert);

            setTimeout(function() {
                alert.alert('close');
            }, 3000);
        }
    </script>

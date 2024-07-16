@extends('layouts.master')

@section('page_title', 'Jemaat - Online Marriage Registration System')

@section('breadcrumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Data Jemaat</li>
                        <li class="breadcrumb-item active">Daftar Data Jemaat</li>
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
                <h5>Data Jemaat</h5>
                <span>Manajemen data jemaat memastikan administrasi pengajuan pernikahan yang efisien.</span>
            </div>
            <div>
                <!-- Tombol Tambah Jemaat -->
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahJemaat">Tambah
                    Jemaat</button>
            </div>
        </div>
        <div class="card-body row">
            <div id="alertContainer" class="fixed-bottom w-100 mb-4"></div>
            <div class="col-sm-12 col-lg-12 col-xl-12">
                <div class="table-responsive">
                    <table id="tabelJemaat" class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Username</th>
                                <th scope="col" class="text-center">Nama Lengkap</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Telepon</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-warning btn-block" data-id="{{ $user->id }}"
                                                onclick="editJemaat(event)">Edit</button>
                                            <button class="btn btn-secondary btn-block"
                                                onclick="konfirmasiHapusJemaat({{ $user->id }})">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Jemaat -->
    <div class="modal fade" id="modalTambahJemaat" tabindex="-1" aria-labelledby="modalTambahJemaatLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahJemaatLabel">Tambah Data Jemaat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formTambahJemaat">
                        @csrf
                        <div class="mb-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-2">
                            <label for="full_name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-2">
                            <label for="phone_number" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                        </div>
                        <input type="hidden" name="role" value="jemaat">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpanJemaat()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Jemaat -->
    <div class="modal fade" id="modalEditJemaat" tabindex="-1" aria-labelledby="modalEditJemaatLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditJemaatLabel">Edit Data Jemaat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditJemaat">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_id" name="id">
                        <div class="form-group mb-2">
                            <label for="edit_username">Username</label>
                            <input type="text" class="form-control" id="edit_username" name="username" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="edit_full_name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="edit_full_name" name="full_name" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="edit_email">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="edit_phone_number">Telepon</label>
                            <input type="text" class="form-control" id="edit_phone_number" name="phone_number"
                                required>
                        </div>
                        <input type="hidden" id="edit_role" name="role" required>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateJemaat()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="modalKonfirmasiHapusJemaat" tabindex="-1"
        aria-labelledby="modalKonfirmasiHapusJemaatLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKonfirmasiHapusJemaatLabel">Konfirmasi Hapus Jemaat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data jemaat ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="btnHapusJemaat">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function simpanJemaat() {
            // Mengambil data dari form
            var formData = $('#formTambahJemaat').serialize();

            // Mengirim data ke server menggunakan AJAX
            $.ajax({
                url: '{{ route('storeDataJemaat') }}', // Ganti route sesuai dengan yang Anda miliki
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Reset form tambah
                    $('#formTambahJemaat')[0].reset();

                    // Menutup modal setelah data berhasil disimpan
                    $('#modalTambahJemaat').modal('hide');

                    // Refresh data pada tabel tanpa perlu reload halaman
                    $('#tabelJemaat').load(location.href + ' #tabelJemaat');

                    // Menampilkan alert sukses
                    showAlert('success', 'Data jemaat berhasil disimpan');
                },
                error: function(xhr, status, error) {
                    // Menampilkan alert error
                    var errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error :
                        'Terjadi kesalahan saat menyimpan data.';
                    // Menutup modal setelah data berhasil disimpan
                    $('#modalTambahJemaat').modal('hide');
                    showAlert('danger', errorMessage);
                }
            });
        }

        function showAlert(type, message) {
            // Hapus alert sebelumnya jika ada
            $('.alert').remove();

            // Buat elemen alert baru
            var alert = $('<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
                message +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                '</div>');

            // Tambahkan alert ke dalam elemen alertContainer
            $('#alertContainer').append(alert);
        }

        function editJemaat(event) {
            var id = $(event.currentTarget).data('id');
            var url = '{{ route('getDataJemaat', ':id') }}';
            url = url.replace(':id', id);

            $.get(url, function(data) {
                $('#edit_id').val(data.id);
                $('#edit_username').val(data.username);
                $('#edit_full_name').val(data.full_name);
                $('#edit_email').val(data.email);
                $('#edit_phone_number').val(data.phone_number);
                $('#edit_role').val(data.role);
                $('#modalEditJemaat').modal('show');
            });
        }

        function updateJemaat() {
            // Mengambil data dari form
            var id = $('#edit_id').val();
            var formData = $('#formEditJemaat').serialize();

            // Mengirim data ke server menggunakan AJAX
            $.ajax({
                url: 'update-jemaat/' + id, // Ganti route sesuai dengan yang Anda miliki untuk update
                type: 'PUT', // Method untuk update
                data: formData,
                success: function(response) {
                    // Reset form edit
                    $('#formEditJemaat')[0].reset();

                    // Menutup modal setelah data berhasil diupdate
                    $('#modalEditJemaat').modal('hide');

                    // Refresh data pada tabel tanpa perlu reload halaman
                    $('#tabelJemaat').load(location.href + ' #tabelJemaat');

                    // Menampilkan alert sukses
                    showAlert('success', 'Data jemaat berhasil diupdate');
                },
                error: function(xhr, status, error) {
                    // Menampilkan alert error
                    var errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error :
                        'Terjadi kesalahan saat menyimpan perubahan data.';
                    $('#modalEditJemaat').modal('hide');
                    showAlert('danger', errorMessage);
                }
            });
        }

        function konfirmasiHapusJemaat(id) {
            $('#modalKonfirmasiHapusJemaat').modal('show');

            // Fungsi hapus jika tombol "Hapus" pada modal konfirmasi diklik
            $('#btnHapusJemaat').on('click', function() {
                hapusJemaat(id);
            });
        }

        function hapusJemaat(id) {
            $.ajax({
                url: 'hapus-jemaat/' + id, // Ganti dengan URL yang sesuai untuk penghapusan jemaat
                type: 'DELETE', // Metode DELETE untuk menghapus data
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Tutup modal setelah penghapusan berhasil
                    $('#modalKonfirmasiHapusJemaat').modal('hide');

                    // Refresh data pada tabel tanpa perlu reload halaman
                    $('#tabelJemaat').load(location.href + ' #tabelJemaat');

                    // Tampilkan alert sukses
                    showAlert('success', 'Data jemaat berhasil dihapus');
                },
                error: function(xhr, status, error) {
                    // Tampilkan alert error
                    var errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error :
                        'Terjadi kesalahan saat menghapus data.';
                    $('#modalKonfirmasiHapusJemaat').modal('hide');
                    showAlert('danger', errorMessage);
                }
            });
        }
    </script>
@endpush

@extends('layouts.master')

@section('page_title', 'Persyaratan Pernikahan - Online Marriage Registration System')

@section('breadcrumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Persyaratan Pernikahan</li>
                        <li class="breadcrumb-item active">Daftar Persyaratan Pernikahan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-sm-12 col-lg-12 col-xl-12">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($terms->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                Tidak ada persyaratan yang tersedia.
            </div>
        @else
            @foreach ($terms as $key => $term)
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>{{ $term->title }}</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ $term->description }}</p>
                    </div>
                </div>
            @endforeach
            <!-- Modal -->
            <div class="modal fade" id="confirmTermsModal" tabindex="-1" aria-labelledby="confirmTermsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmTermsModalLabel">Konfirmasi Persyaratan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Anda telah membaca dan memahami persyaratan pernikahan. Apakah Anda yakin ingin melanjutkan?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" onclick="proceedToRegistration()">Ya,
                                Lanjutkan</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4 mb-4">
                <button class="btn btn-lg btn-primary form-control" data-bs-toggle="modal"
                    data-bs-target="#confirmTermsModal">Saya Telah Membaca dan Memahami Persyaratan</button>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        function proceedToRegistration() {
            // Redirect to registration page or any other action
            window.location.href = '/jemaat/pengajuan-pernikahan';
        }
    </script>
@endpush

@extends('layouts.master')

@section('page_title', 'Status Pengajuan Pernikahan - Online Marriage Registration System')

@section('breadcrumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Pernikahan</li>
                        <li class="breadcrumb-item active">Status Pengajuan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Status Pengajuan Pernikahan</h5>
                    </div>
                    <div class="card-body">
                        @if ($marriageApplication)
                            <form>
                                <div class="mb-3 row">
                                    <label for="spouse_name" class="col-sm-4 col-form-label"><strong>Nama Pasangan:</strong></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="spouse_name" value="{{ $marriageApplication->spouse_name }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="spouse_birth_date" class="col-sm-4 col-form-label"><strong>Tanggal Lahir Pasangan:</strong></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="spouse_birth_date" value="{{ $marriageApplication->spouse_birth_date }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="spouse_religion" class="col-sm-4 col-form-label"><strong>Agama Pasangan:</strong></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="spouse_religion" value="{{ $marriageApplication->spouse_religion }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="marriage_date" class="col-sm-4 col-form-label"><strong>Tanggal Pernikahan:</strong></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="marriage_date" value="{{ $marriageApplication->marriage_date }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="venue" class="col-sm-4 col-form-label"><strong>Tempat Pernikahan:</strong></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="venue" value="{{ $marriageApplication->venue }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="status" class="col-sm-4 col-form-label"><strong>Status:</strong></label>
                                    <div class="col-sm-8">
                                        <span class="btn btn-md bg-{{ $marriageApplication->status === 'pending' ? 'warning' : ($marriageApplication->status === 'approved' ? 'success' : 'danger') }} form-control">
                                            <strong>{{ ucfirst($marriageApplication->status) }}</strong>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Belum ada pengajuan pernikahan yang tersedia.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

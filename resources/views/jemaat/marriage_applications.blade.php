@extends('layouts.master')

@section('page_title', 'Pengajuan Pernikahan - Online Marriage Registration System')

@section('breadcrumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Pengajuan Pernikahan</li>
                        <li class="breadcrumb-item active">Form Pengajuan Pernikahan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Form Pengajuan Pernikahan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('storeMarriageApplicationsForm') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="spouse_name" class="form-label">Nama Calon Pasangan</label>
                    <input type="text" class="form-control" id="spouse_name" name="spouse_name" required>
                </div>
                <div class="mb-3">
                    <label for="spouse_birth_date" class="form-label">Tanggal Lahir Calon Pasangan</label>
                    <input type="date" class="form-control" id="spouse_birth_date" name="spouse_birth_date" required>
                </div>
                <div class="mb-3">
                    <label for="spouse_religion" class="form-label">Agama Calon Pasangan</label>
                    <select class="form-select" id="spouse_religion" name="spouse_religion" required>
                        <option value="">Pilih Agama</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="marriage_date" class="form-label">Tanggal Pernikahan</label>
                    <input type="date" class="form-control" id="marriage_date" name="marriage_date" required>
                </div>
                <div class="mb-3">
                    <label for="venue" class="form-label">Tempat Pernikahan</label>
                    <input type="text" class="form-control" id="venue" name="venue" required>
                </div>
                <button type="submit" class="btn btn-primary">Ajukan Pernikahan</button>
            </form>
        </div>
    </div>
@endsection

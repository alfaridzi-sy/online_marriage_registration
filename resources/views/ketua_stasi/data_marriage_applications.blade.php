@extends('layouts.master')

@section('page_title', 'Daftar Pengajuan Pernikahan - Admin Panel')

@section('breadcrumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Pernikahan</li>
                        <li class="breadcrumb-item active">Daftar Pengajuan Pernikahan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-sm-12 col-lg-12 col-xl-12">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h5>Daftar Pengajuan Pernikahan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pasangan</th>
                                <th>Tanggal Pernikahan</th>
                                <th>Tempat Pernikahan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($marriageApplications as $marriageApplication)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $marriageApplication->spouse_name }}</td>
                                    <td>{{ $marriageApplication->marriage_date }}</td>
                                    <td>{{ $marriageApplication->venue }}</td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $marriageApplication->status === 'pending' ? 'warning' : ($marriageApplication->status === 'approved' ? 'success' : 'danger') }}">
                                            {{ ucfirst($marriageApplication->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($marriageApplication->status === 'pending')
                                            <form
                                                action="{{ route('approveMarriageApplications', $marriageApplication->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                            </form>
                                        @else
                                            <span class="text-muted">Tidak tersedia</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada pengajuan pernikahan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

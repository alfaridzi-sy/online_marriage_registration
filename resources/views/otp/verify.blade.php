<!-- resources/views/otp/verify.blade.php -->
@extends('layouts.master')

@section('page_title', 'Verifikasi OTP')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifikasi OTP</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('otp.verify') }}">
                        @csrf
                        <div class="form-group">
                            <label for="otp_code">Kode OTP</label>
                            <input type="text" name="otp_code" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Verifikasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

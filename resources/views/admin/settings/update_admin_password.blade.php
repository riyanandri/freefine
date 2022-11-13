@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Update Password Admin</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Pengaturan</li>
                <li class="breadcrumb-item active">Update Password Admin</li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error :</strong> {{ Session::get('error_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success :</strong> {{ Session::get('success_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="{{ url('admin/update-admin-password') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Email</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{ $adminDetails['email'] }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Tipe Akun</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{ $adminDetails['tipe'] }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Password Lama</label>
                        <div class="col-lg-9">
                            <input type="password" class="form-control" id="current_password" placeholder="masukkan password lama" name="current_password" required>
                            <span id="check_password"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Password Baru</label>
                        <div class="col-lg-9">
                            <input type="password" class="form-control" id="new_password" placeholder="masukkan password baru" name="new_password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Konfirmasi Password</label>
                        <div class="col-lg-9">
                            <input type="password" class="form-control" id="confirm_password" placeholder="ulangi password" name="confirm_password" required>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

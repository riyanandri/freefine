@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Update Profil</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Pengaturan</li>
                <li class="breadcrumb-item active">Update Profil</li>
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
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ url('admin/update-admin-profile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Email</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Tipe Akun</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->tipe }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Nama Lengkap</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="admin_name" placeholder="masukkan nama lengkap" name="admin_name" value="{{ Auth::guard('admin')->user()->nama }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">No Telefon</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="admin_phone" placeholder="masukkan no telefon" name="admin_phone" value="{{ Auth::guard('admin')->user()->no_telp }}" minlength="10" maxlength="12">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Photo</label>
                        <div class="col-lg-9">
                            <input type="file" class="form-control" id="admin_photo" name="admin_photo">
                            {{-- @if (!empty(Auth::guard('admin')->user()->photo))
                            <a target="_blank" href="{{ url('admin/images/photos/'.Auth::guard('admin')->user()->photo) }}">Lihat photo</a>
                            <input type="hidden" name="current_admin_photo" value="{{ Auth::guard('admin')->user()->photo }}" @endif </div> --}}
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

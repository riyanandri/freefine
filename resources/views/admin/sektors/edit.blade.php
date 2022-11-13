@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Edit Data Sektor</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Sektor</li>
                <li class="breadcrumb-item active">Edit Sektor</li>
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
                <form action="{{ url('admin/update-sektor') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <input class="form-control" name="id" id="id" value="{{ $sektor->id }}" type="hidden">
                        <label class="col-lg-3 col-form-label">Nama Sektor</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="nama_sektor" placeholder="masukkan nama sektor" name="nama_sektor" value="{{ $sektor->nama }}">
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

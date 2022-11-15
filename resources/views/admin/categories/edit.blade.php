@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Edit Data Kategori</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Kategori</li>
                <li class="breadcrumb-item active">Edit Kategori</li>
            </ul>
        </div>
    </div>
</div>
<div class="card">
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
        <form action="{{ url('admin/update-category') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input class="form-control" name="id" id="id" value="{{ $category['id'] }}" type="hidden">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" placeholder="masukkan nama kategori" name="nama_kategori" value="{{ $category['nama_kategori'] }}">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="sektor_id">Pilih Sektor</label>
                        <select name="sektor_id" id="sektor_id" class="form-control select">
                            <option value="">Sektor</option>
                            @foreach ($getSektors as $item)
                            <option value="{{ $item['id'] }}" selected>{{ $item['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-sm-6 col-12" id="appendCategoriesLevel">
                    <div class="form-group">
                        <label for="parent_id">Kategori Level</label>
                        <select name="parent_id" id="parent_id" class="form-control select">
                            <option value="0" @if(isset($category['parent_id']) && $category['parent_id']==0) selected @endif>Kategori Utama</option>
                            @if (!empty($getCategories))
                            @foreach ($getCategories as $parentcategory)
                            <option value="{{ $parentcategory['id'] }}" @if(isset($category['parent_id']) && $category['parent_id']==$parentcategory['id']) selected @endif>{{ $parentcategory['nama_kategori'] }}</option>
                @if (!empty($parentcategory['subcategories']))
                @foreach ($parentcategory['subcategories'] as $subcategory)
                <option value="{{ $subcategory['id'] }}" @if(isset($category['parent_id']) && $category['parent_id']==$subcategory['id']) selected @endif>&nbsp;&raquo;&nbsp;{{ $subcategory['nama_kategori'] }}</option>
                @endforeach
                @endif
                @endforeach
                @endif
                </select>
            </div>
    </div> --}}
    <div class="col-lg-12">
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $category['deskripsi'] }}</textarea>
        </div>
    </div>
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>

@endsection

@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Kategori Saham</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Master</li>
            <li class="breadcrumb-item active">Kategori</li>
        </ul>
    </div>
    <div class="page-btn">
        <a href="{{ url('admin/add-category') }}" class="btn btn-added">
            <img src="{{ asset('admin/assets/img/icons/plus.svg') }}" href="" class="me-1" alt="img">Tambah Kategori
        </a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-top">
            <div class="search-set">
                <div class="search-input">
                    <a class="btn btn-searchset"><img src="{{ asset('admin/assets/img/icons/search-white.svg') }}" alt="img"></a>
                </div>
            </div>
            <div class="wordset">
                <ul>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
                    </li>
                </ul>
            </div>
        </div>
        @if (Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success :</strong> {{ Session::get('success_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table datanew">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="20%">Kategori</th>
                        <th width="25%">Sektor</th>
                        <th width="30%">Deskripsi</th>
                        <th width="10%">Status</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                    {{-- @if (isset($item['parentcategory']['nama_kategori']) && !empty($item['parentcategory']['nama_kategori']))
                    @php
                    $parent_category = $item['parentcategory']['nama_kategori'];
                    @endphp
                    @else
                    @php
                    $parent_category = "root";
                    @endphp
                    @endif --}}
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['nama_kategori'] }}</td>
                        {{-- <td>{{ $parent_category }}</td> --}}
                        <td>{{ $item['sektor']['nama'] }}</td>
                        <td>{{ $item['deskripsi'] }}</td>
                        <td>
                            @if ($item['status'] == 1)
                            <a class="updateCategoryStatus" id="category-{{ $item['id'] }}" category_id="{{ $item['id'] }}" href="javascript:void(0)">
                                <i style="font-size: 20px;" class="fa fa-eye" status="Active"></i>
                            </a>
                            @else
                            <a class="updateCategoryStatus" id="category-{{ $item['id'] }}" category_id="{{ $item['id'] }}" href="javascript:void(0)">
                                <i style="font-size: 20px;" class="fa fa-eye-slash" status="Inactive"></i>
                            </a>
                            @endif
                        </td>
                        <td>
                            <a class="me-3" href="{{ url('admin/edit-category/'.$item['id']) }}">
                                <img src="assets/img/icons/edit.svg" alt="img">
                            </a>
                            <a href="javascript:void(0)" class="confirmDelete" module="category" moduleid="{{ $item['id'] }}">
                                <img src="assets/img/icons/delete.svg" alt="img">
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

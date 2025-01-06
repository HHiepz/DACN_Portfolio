@extends('layout.admin')

@section('title', 'Admin - Thêm mới ngôn ngữ')

@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Danh mục mạng xã hội</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.social-categories') }}">Danh mục mạng xã
                                    hội</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <form action="{{ route('admin.social-category.update', $socialCategory->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!--begin::Row-->
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-warning">Lưu chỉnh sửa</button>
                            </div>
                        </div>
                        <!--begin::Col-->
                        <div class="col-md-8">
                            <div class="card card-primary card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Chỉnh sửa danh mục</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="socialCategory_name" class="form-label fw-bold">Tên danh
                                                mục</label>
                                            <input type="text" name="socialCategory_name" id="socialCategory_name"
                                                class="form-control" placeholder="Tên danh mục"
                                                value="{{ $socialCategory->name }}" />
                                        </div>
                                        @error('socialCategory_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-primary card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Hình ảnh</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="mb-3">
                                        @if ($socialCategory->image_url)
                                            <img src="{{ asset('storage/' . $socialCategory->image_url) }}"
                                                class="img-fluid" alt="{{ $socialCategory->name }}" />
                                        @else
                                            <span class="badge bg-danger">Chưa có hình ảnh</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" class="activeFilePond" name="socialCategory_image"
                                            accept="image/*" />
                                        @error('socialCategory_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection

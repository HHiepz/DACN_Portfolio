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
                        <h3 class="mb-0">Danh sách dự án</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">Danh sách dự
                                    án</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm</li>
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
                <!--begin::Row-->
                <div class="row g-4">
                    <!--begin::Col-->
                    <div class="col-md-12">
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-primary card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Thêm mới dự án</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">Dự án</span>
                                                    <input type="text" class="form-control" name="product_name"
                                                        placeholder="Tên dự án" value="{{ old('product_name') }}" />
                                                </div>
                                                @error('product_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">Loại</span>
                                                    <input type="text" class="form-control" name="product_type"
                                                        placeholder="Dự án cá nhân, nhóm,..."
                                                        value="{{ old('product_type') }}" />
                                                </div>
                                                @error('product_type')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <input type="file" class="form-control" name="product_image" />
                                                @error('product_image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <select class="form-select js-active-select2" name="product_category_id">
                                                    <option disabled selected>Chọn danh mục</option>
                                                    @foreach ($productCategories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('product_category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <select class="form-select js-active-select2"
                                                    name="product_technologies_id[]" multiple="multiple">
                                                    @foreach ($technologies as $technology)
                                                        <option value="{{ $technology->id }}">
                                                            {{ $technology->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('product_technologies_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Mô tả ngắn (tối đa 255 ký
                                                    tự)</label>
                                                <textarea class="form-control" name="product_short_description" id="" rows="3">{{ old('product_short_description') }}</textarea>
                                                @error('product_short_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Mô tả chi tiết</label>
                                                <textarea class="form-control activeTinyeditor" name="product_description" id="" rows="3">{{ old('product_description') }}</textarea>
                                                @error('product_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">Ngày bắt đầu (có thể
                                                        bỏ trống)</span>
                                                    <input type="date" class="form-control" name="product_started_at"
                                                        value="{{ old('product_started_at') }}" />
                                                </div>
                                                @error('product_started_at')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">Ngày kết thúc (có thể
                                                        bỏ trống)</span>
                                                    <input type="date" class="form-control" name="product_ended_at"
                                                        value="{{ old('product_ended_at') }}" />
                                                </div>
                                                @error('product_ended_at')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tạo</button>
                                </div>
                                <!--end::Footer-->
                            </div>
                        </form>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection

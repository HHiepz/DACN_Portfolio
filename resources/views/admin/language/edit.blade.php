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
                        <h3 class="mb-0">Kỹ năng ngôn ngữ</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.languages') }}">Kỹ năng ngôn ngữ</a></li>
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
                <!--begin::Row-->
                <div class="row g-4">
                    <!--begin::Col-->
                    @if (session('success'))
                        <div class="col-12">
                            <div class="callout callout-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="col-12">
                            <div class="callout callout-danger">
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <form action="{{ route('admin.language.update', $language->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card card-primary card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Chỉnh sửa ngôn ngữ</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">Thứ tự ưu tiên</span>
                                            <input type="number" class="form-control" name="priority"
                                                value="{{ $language->priority }}"
                                                placeholder="Mặc định là 0, số càng lớn thì hiển thị càng trước"
                                                aria-describedby="basic-addon1" />
                                        </div>
                                        @error('priority')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">Ngôn ngữ</span>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $language->name }}" placeholder="Tiếng Anh, Tiếng Việt,..."
                                                aria-describedby="basic-addon2" />
                                        </div>
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text">Mô tả ngắn</span>
                                            <textarea class="form-control" name="short_description" placeholder="Đọc, nghe tài liệu cơ bản."
                                                aria-label="With textarea">{{ $language->short_description }}</textarea>
                                        </div>
                                        @error('short_description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Lưu chỉnh sửa</button>
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

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
                        <h3 class="mb-0">Danh sách mạng xã hội</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.socials') }}">Danh sách mạng xã hội</a>
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
                <!--begin::Row-->
                <div class="row g-4">
                    <!--begin::Col-->
                    <div class="col-md-8">
                        <form action="{{ route('admin.social.update', $social->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card card-primary card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Chỉnh sửa mạng xã hội</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">Dự án</span>
                                                    <input type="text" class="form-control" name="social_name"
                                                        placeholder="Tên dự án" value="{{ $social->name }}" />
                                                </div>
                                                @error('social_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">Loại</span>
                                                    <input type="text" class="form-control" name="social_type"
                                                        placeholder="Dự án cá nhân, nhóm,..."
                                                        value="{{ $social->type }}" />
                                                </div>
                                                @error('social_type')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <input type="file" class="form-control" name="social_image" />
                                                @error('social_image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <select class="form-select js-active-select2" name="social_category_id">
                                                    <option disabled selected>Chọn danh mục</option>
                                                    @foreach ($socialCategories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if ($category->id == $social->social_category_id) selected @endif>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('social_category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Mô tả ngắn (tối đa 255 ký
                                                    tự)</label>
                                                <textarea class="form-control" name="social_short_description" id="" rows="3">{{ $social->short_description }}</textarea>
                                                @error('social_short_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Mô tả chi tiết</label>
                                                <textarea class="form-control activeTinyeditor" name="social_description" id="" rows="3">{!! $social->description !!}</textarea>
                                                @error('social_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">Ngày bắt đầu (có thể
                                                        bỏ trống)</span>
                                                    <input type="date" class="form-control" name="social_started_at"
                                                        value="{{ $social->social_started_at }}" />
                                                </div>
                                                @error('social_started_at')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">Ngày kết thúc (có thể
                                                        bỏ trống)</span>
                                                    <input type="date" class="form-control" name="social_ended_at"
                                                        value="{{ $social->social_ended_at }}" />
                                                </div>
                                                @error('social_ended_at')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Trạng thái hiển thị dự án</label>
                                                <select class="form-select js-active-select2" name="social_status">
                                                    <option disabled selected>Trạng thái</option>
                                                    <option value="draft"
                                                        @if ($social->status == 'draft') selected @endif>
                                                        Bản nháp
                                                    </option>

                                                    <option value="published"
                                                        @if ($social->status == 'published') selected @endif>
                                                        Đã xuất bản
                                                    </option>

                                                    <option value="hidden"
                                                        @if ($social->status == 'hidden') selected @endif>
                                                        Ẩn
                                                    </option>

                                                </select>
                                                @error('social_category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
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

                    <div class="col-md-4">
                        <div class="card card-dark card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Ảnh hiện tại</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                @if (empty($social->image_url))
                                    <span class="badge bg-danger">Chưa có hình ảnh</span>
                                @else
                                    <img src="{{ asset('storage/' . $social->image_url) }}" class="img-fluid"
                                        alt="{{ $social->name }}" />
                                @endif
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection

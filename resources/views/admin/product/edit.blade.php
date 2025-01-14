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
                        <form action="{{ route('admin.product.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card card-primary card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Chỉnh sửa dự án</div>
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
                                                        placeholder="Tên dự án" value="{{ $product->name }}" />
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
                                                        value="{{ $product->type }}" />
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
                                                        <option value="{{ $category->id }}"
                                                            @if ($category->id == $product->product_category_id) selected @endif>
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
                                                        <option value="{{ $technology->id }}"
                                                            @if (in_array($technology->id, $product->technologies->pluck('id')->toArray())) selected @endif>
                                                            {{ $technology->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('product_technologies_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="product_github_link" class="form-label">Link Github</label>
                                                <input type="text" class="form-control" name="product_github_link"
                                                    id="product_github_link" placeholder="Link Github"
                                                    value="{{ $product->github_link }}" />
                                                @error('product_github_link')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="product_preview_link" class="form-label">Link Preview</label>
                                                <input type="text" class="form-control" name="product_preview_link"
                                                    id="product_preview_link" placeholder="Link Preview"
                                                    value="{{ $product->preview_link }}" />
                                                @error('product_preview_link')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Mô tả ngắn (tối đa 255 ký
                                                    tự)</label>
                                                <textarea class="form-control" name="product_short_description" id="" rows="3">{{ $product->short_description }}</textarea>
                                                @error('product_short_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Mô tả chi tiết</label>
                                                <textarea class="form-control activeTinyeditor" name="product_description" id="" rows="3">{!! $product->description !!}</textarea>
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
                                                        value="{{ $product->project_started_at ? $product->project_started_at->format('Y-m-d') : '' }}" />
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
                                                        value="{{ $product->project_ended_at ? $product->project_ended_at->format('Y-m-d') : '' }}" />
                                                </div>
                                                @error('product_ended_at')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Trạng thái hiển thị dự án</label>
                                                <select class="form-select js-active-select2" name="product_status">
                                                    <option disabled selected>Trạng thái</option>
                                                    <option value="draft"
                                                        @if ($product->status == 'draft') selected @endif>
                                                        Bản nháp
                                                    </option>

                                                    <option value="published"
                                                        @if ($product->status == 'published') selected @endif>
                                                        Đã xuất bản
                                                    </option>

                                                    <option value="hidden"
                                                        @if ($product->status == 'hidden') selected @endif>
                                                        Ẩn
                                                    </option>

                                                </select>
                                                @error('product_category_id')
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
                                @if (empty($product->image_url))
                                    <span class="badge bg-danger">Chưa có hình ảnh</span>
                                @else
                                    <img src="{{ asset('storage/' . $product->image_url) }}" class="img-fluid"
                                        alt="{{ $product->name }}" />
                                @endif
                            </div>
                            <!--end::Body-->
                        </div>

                        <div class="card card-dark card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Ảnh chi tiết</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <form action="{{ route('admin.product.image.store', $product->id) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="file" class="form-control" name="images[]" multiple
                                                    placeholder="" aria-describedby="fileHelpId" />
                                            </div>
                                            @if ($errors->has('images.*'))
                                                <div class="text-danger">
                                                    @foreach ($errors->get('images.*') as $message)
                                                        <p class="mb-0">{{ $message[0] }}</p>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-outline-success w-100">Tải
                                                    lên</button>
                                            </div>
                                        </form>
                                    </div>
                                    @if ($product->images->count() > 0)
                                        <div class="col-12">
                                            <div class="row g-2">
                                                @foreach ($product->images as $image)
                                                    <div class="col-6">
                                                        <p class="mb-0">
                                                            {{ $image->name }}
                                                        </p>
                                                        <div>
                                                            <form
                                                                action="{{ route('admin.product.image.delete', $image->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-link text-danger p-0"
                                                                    style="font-size: 0.875rem;">
                                                                    Xóa
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <img src="{{ asset('storage/' . $image->image_url) }}"
                                                            class="img-fluid rounded-top" alt="{{ $image->name }}" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
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

@extends('layout.admin')

@section('title', 'Admin - Ngôn ngữ')

@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Danh mục</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh mục</li>
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
                    <div class="col-md-12">
                        <div class="text-end">
                            <a href="{{ route('admin.product-category.create') }}" class="btn btn-primary">Thêm danh mục</a>
                        </div>
                    </div>
                    <!--begin::Col-->
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Danh mục</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if ($productCategories->count() == 0)
                                    <div class="text-center">
                                        <i class="bi bi-emoji-frown"></i>
                                        <p>Hiện tại chưa có dữ liệu, vùi long thêm đi...</p>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Danh mục</th>
                                                    <th style="width: 150px">Hình ảnh</th>
                                                    <th style="width: 250px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- <tr class="align-middle">
                                                    <td>1.</td>
                                                    <td>
                                                        <p class="mb-0">Tiếng Anh</p>
                                                        <p class="mb-0 text-muted">
                                                            Đọc hiểu tốt, viết tốt, nói tốt, nghe tốt
                                                        </p>
                                                    </td>
                                                    <td><span class="badge text-bg-dark">Bình thường</span></td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-warning">Sửa</a>
                                                        <a href="#" class="btn btn-sm btn-outline-danger">Xóa</a>
                                                    </td>
                                                </tr> --}}
                                                @foreach ($productCategories as $category)
                                                    <tr class="align-middle">
                                                        <td>{{ $category->id }}.</td>
                                                        <td>
                                                            {{ $category->name }}
                                                            @if ($category->products->count() > 0)
                                                                <p class="mb-0 text-muted">Số sản phẩm:
                                                                    {{ $category->products->count() }}
                                                                </p>
                                                                <p class="mb-0 text-muted">
                                                                    @foreach ($category->products as $product)
                                                                        <span class="badge bg-primary">
                                                                            {{ $product->name }}
                                                                        </span>
                                                                    @endforeach
                                                                </p>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if (empty($category->image_url))
                                                                <span class="badge bg-danger">Chưa có hình ảnh</span>
                                                            @else
                                                                <img src="{{ asset('storage/' . $category->image_url) }}"
                                                                    alt="{{ $category->name }}" class="img-fluid"
                                                                    style="width: 150px; height: 150px">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.product-category.edit', $category->id) }}"
                                                                class="btn btn-sm btn-warning">Sửa</a>
                                                            <form
                                                                action="{{ route('admin.product-category.delete', $category->id) }}"
                                                                method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger">Xóa</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $productCategories->links('pagination::bootstrap-5') }}
                            </div>
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

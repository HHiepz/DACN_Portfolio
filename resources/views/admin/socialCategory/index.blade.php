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
                        <h3 class="mb-0">Danh mục mạng xã hội</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.socials') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh mục mạng xã hội</li>
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
                            <a href="{{ route('admin.social-category.create') }}" class="btn btn-primary">Thêm danh mục</a>
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
                                @if ($socialCategories->count() == 0)
                                    <div class="text-center">
                                        <i class="bi bi-emoji-frown"></i>
                                        <p>Hiện tại chưa có dữ liệu, vùi long thêm đi...</p>
                                    </div>
                                @else
                                    {{-- If have data --}}
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
                                                @foreach ($socialCategories as $category)
                                                    <tr class="align-middle">
                                                        <td>{{ $category->id }}.</td>
                                                        <td>
                                                            <p class="mb-0"> {{ $category->name }} </p>
                                                        </td>
                                                        <td>
                                                            @if (empty($category->image_url))
                                                                <span class="badge bg-danger">Chưa có hình ảnh</span>
                                                            @else
                                                                <img src="{{ asset('storage/' . $category->image_url) }}"
                                                                    class="img-fluid" alt="" />
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="#" class="btn btn-sm btn-warning">Sửa</a>
                                                            <form action="#" method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger">Xóa</button>
                                                            </form>

                                                            <form action="#" method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-sm btn-info">
                                                                    <i class="bi bi-arrow-up"></i>
                                                                </button>
                                                            </form>

                                                            <form action="#" method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-sm btn-info">
                                                                    <i class="bi bi-arrow-down"></i>
                                                                </button>
                                                            </form>


                                                            <form action="#" method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-sm btn-dark">
                                                                    <i class="bi bi-arrow-repeat"></i>
                                                                </button>
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
                                {{ $socialCategories->links('pagination::bootstrap-5') }}
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

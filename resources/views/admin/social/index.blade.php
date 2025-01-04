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
                        <h3 class="mb-0">Danh sách mạng xã hội</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.socials') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách mạng xã hội</li>
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
                            <a href="{{ route('admin.social.create') }}" class="btn btn-primary">Thêm mạng xã hội</a>
                        </div>
                    </div>
                    <!--begin::Col-->
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Mạng xã hội</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- If don't have any data --}}
                                <div class="text-center">
                                    <i class="bi bi-emoji-frown"></i>
                                    <p>Hiện tại chưa có dữ liệu, vùi long thêm đi...</p>
                                </div>
                                {{-- If have data --}}
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Dự án</th>
                                                <th style="width: 150px">Trạng thái</th>
                                                <th style="width: 150px">Thư tự ưu tiên</th>
                                                <th style="width: 150px">Hình ảnh</th>
                                                <th style="width: 250px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="align-middle">
                                                <td>1.</td>
                                                <td>
                                                    <p class="mb-0">Tiếng Anh</p>
                                                    <p class="mb-0 text-muted">
                                                        Đọc hiểu tốt, viết tốt, nói tốt, nghe tốt
                                                    </p>
                                                </td>
                                                <td><span class="badge text-bg-dark">Bình thường</span></td>
                                                <td><span class="badge text-bg-dark">Bình thường</span></td>
                                                <td>
                                                    <span class="badge bg-danger">Chưa có hình ảnh</span>
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{-- Paginate there --}}
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

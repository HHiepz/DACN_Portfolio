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
                        <h3 class="mb-0">Kỹ năng ngôn ngữ</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kỹ năng ngôn ngữ</li>
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
                            <a href="{{ route('admin.language.create') }}" class="btn btn-primary">Thêm ngôn ngữ</a>
                        </div>
                    </div>
                    <!--begin::Col-->
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Ngôn ngữ</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if ($languages->count() == 0)
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
                                                    <th>Ngôn ngữ</th>
                                                    <th style="width: 150px">Thư tự ưu tiên</th>
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
                                                @foreach ($languages as $language)
                                                    <tr class="align-middle">
                                                        <td>{{ $language->id }}.</td>
                                                        <td>
                                                            <p class="mb-0">{{ $language->name }}</p>
                                                            <p class="mb-0 text-muted">
                                                                {{ $language->short_description }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            @if ($language->priority == 0)
                                                                <span class="badge text-bg-dark">Mặc định</span>
                                                            @else
                                                                <span class="badge text-bg-danger">
                                                                    {{ $language->priority }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.language.edit', $language->id) }}"
                                                                class="btn btn-sm btn-warning">Sửa</a>
                                                            <form
                                                                action="{{ route('admin.language.delete', $language->id) }}"
                                                                method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger">Xóa</button>
                                                            </form>
                                                            @if ($language->priority < 10)
                                                                <form
                                                                    action="{{ route('admin.language.priority.up', $language->id) }}"
                                                                    method="POST" class="d-inline-block">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-sm btn-info">
                                                                        <i class="bi bi-arrow-up"></i>
                                                                    </button>
                                                                </form>
                                                            @endif

                                                            @if ($language->priority > 0)
                                                                <form
                                                                    action="{{ route('admin.language.priority.down', $language->id) }}"
                                                                    method="POST" class="d-inline-block">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-sm btn-info">
                                                                        <i class="bi bi-arrow-down"></i>
                                                                    </button>
                                                                </form>
                                                            @endif

                                                            @if ($language->priority != 0)
                                                                <form
                                                                    action="{{ route('admin.language.priority.reset', $language->id) }}"
                                                                    method="POST" class="d-inline-block">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-sm btn-dark">
                                                                        <i class="bi bi-arrow-repeat"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
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
                                {{ $languages->links('pagination::bootstrap-5') }}
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

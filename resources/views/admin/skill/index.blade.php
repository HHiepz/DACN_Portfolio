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
                        <h3 class="mb-0">Kỹ năng chuyên ngành</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kỹ năng chuyên ngành</li>
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
                            <a href="{{ route('admin.skill-category.create') }}" class="btn btn-primary">Thêm mới</a>
                        </div>
                    </div>
                    <!--begin::Col-->
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Kỹ năng chuyên ngành</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if ($categories->count() == 0)
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
                                                    <th>Kỹ năng</th>
                                                    <th style="width: 150px">Thư tự ưu tiên</th>
                                                    <th style="width: 250px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                    <tr class="align-middle">
                                                        <td>{{ $category->id }}.</td>
                                                        <td>
                                                            <p class="mb-0">{{ $category->name }}</p>
                                                            @foreach ($category->skills as $skill)
                                                                <span class="badge bg-primary">{{ $skill->name }}</span>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @if ($category->priority == 0)
                                                                <span class="badge text-bg-dark">Mặc định</span>
                                                            @else
                                                                <span class="badge text-bg-danger">
                                                                    {{ $category->priority }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.skill-category.edit', $category->id) }}"
                                                                class="btn btn-sm btn-warning">Sửa</a>
                                                            <form
                                                                action="{{ route('admin.skill-category.delete', $category->id) }}"
                                                                method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger">Xóa</button>
                                                            </form>
                                                            @if ($category->priority < 10)
                                                                <form
                                                                    action="{{ route('admin.skill-category.priority.up', $category->id) }}"
                                                                    method="POST" class="d-inline-block">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-sm btn-info">
                                                                        <i class="bi bi-arrow-up"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                            @if ($category->priority > 0)
                                                                <form
                                                                    action="{{ route('admin.skill-category.priority.down', $category->id) }}"
                                                                    method="POST" class="d-inline-block">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-sm btn-info">
                                                                        <i class="bi bi-arrow-down"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                            @if ($category->priority != 0)
                                                                <form
                                                                    action="{{ route('admin.skill-category.priority.reset', $category->id) }}"
                                                                    method="POST" class="d-inline-block">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-sm btn-info">
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
                                {{ $categories->links('pagination::bootstrap-5') }}
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

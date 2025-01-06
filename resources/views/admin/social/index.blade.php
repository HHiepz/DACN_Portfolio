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
                                @if ($socials->count() == 0)
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
                                                    <th>Dự án</th>
                                                    <th style="width: 150px">Trạng thái</th>
                                                    <th style="width: 150px">Thư tự ưu tiên</th>
                                                    <th style="width: 150px">Hình ảnh</th>
                                                    <th style="width: 250px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($socials as $social)
                                                    <tr class="align-middle">
                                                        <td>{{ $social->id }}.</td>
                                                        <td>
                                                            <p class="mb-0">
                                                                <span class="fw-bold">
                                                                    {{ $social->name }}
                                                                </span>
                                                                <span class="badge bg-primary">
                                                                    {{ $social->category->name }}
                                                                </span>
                                                            <p class="mb-0">
                                                                <i class="bi bi-box"></i> {{ $social->type }}
                                                            </p>
                                                            @if (isset($social->social_started_at) || isset($social->social_ended_at))
                                                                <p class="mb-0">
                                                                    <i class="bi bi-calendar"></i>
                                                                    @if ($social->social_started_at && $social->social_ended_at)
                                                                        {{ $social->social_started_at }}
                                                                        -
                                                                        {{ $social->social_ended_at }}
                                                                    @elseif ($social->social_started_at)
                                                                        {{ $social->social_started_at }}
                                                                    @elseif ($social->social_ended_at)
                                                                        {{ $social->social_ended_at }}
                                                                    @endif
                                                                </p>
                                                            @endif
                                                            <p class="mb-0 text-muted">
                                                                {{ $social->short_description }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            @if ($social->status == 'draft')
                                                                <span class="badge bg-secondary">Nháp</span>
                                                            @elseif ($social->status == 'published')
                                                                <span class="badge bg-success">Đã xuất bản</span>
                                                            @elseif ($social->status == 'hidden')
                                                                <span class="badge bg-secondary">Ẩn</span>
                                                            @else
                                                                <span class="badge bg-info">Không xác định -
                                                                    {{ $social->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($social->priority == 0)
                                                                <span class="badge text-bg-dark">Mặc định</span>
                                                            @else
                                                                <span class="badge text-bg-danger">
                                                                    {{ $social->priority }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (empty($social->image_url))
                                                                <span class="badge bg-danger">Chưa có hình ảnh</span>
                                                            @else
                                                                <img src="{{ asset('storage/' . $social->image_url) }}"
                                                                    alt="{{ $social->name }}" class="img-fluid">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.social.edit', $social->id) }}"
                                                                class="btn btn-sm btn-warning">Sửa</a>
                                                            <form action="{{ route('admin.social.delete', $social->id) }}"
                                                                method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger">Xóa</button>
                                                            </form>
                                                            @if ($social->priority < 10)
                                                                <form
                                                                    action="{{ route('admin.social.priority.up', $social->id) }}"
                                                                    method="POST" class="d-inline-block">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-sm btn-info">
                                                                        <i class="bi bi-arrow-up"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                            @if ($social->priority > 0)
                                                                <form
                                                                    action="{{ route('admin.social.priority.down', $social->id) }}"
                                                                    method="POST" class="d-inline-block">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-sm btn-info">
                                                                        <i class="bi bi-arrow-down"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                            @if ($social->priority != 0)
                                                                <form
                                                                    action="{{ route('admin.social.priority.reset', $social->id) }}"
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

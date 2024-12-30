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
                            <li class="breadcrumb-item"><a href="{{ route('admin.skill-categories') }}">Kỹ năng chuyên
                                    ngành</a></li>
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
                    <div class="col-md-12">
                        <div class="text-end">
                            <form action="{{ route('admin.skill-category.delete', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Xóa toàn bộ</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-12">
                            <div class="card card-primary card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Chỉnh sửa kỹ năng</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body">
                                    @if ($category->skills->count() == 0)
                                        <div class="text-center">
                                            <i class="bi bi-emoji-frown"></i>
                                            <p>Hiện tại chưa có dữ liệu, vùi long thêm đi...</p>
                                        </div>
                                    @else
                                        @foreach ($category->skills as $skill)
                                            <div class="mb-3">
                                                <form action="{{ route('admin.skill.update', $skill->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="skill_category_id"
                                                        value="{{ $category->id }}" />
                                                    <div class="input-group">
                                                        <span class="input-group-text" style="width: 50px">
                                                            #{{ $skill->priority }}
                                                        </span>
                                                        <input type="text" class="form-control" name="skill_name"
                                                            value="{{ $skill->name }}"
                                                            placeholder="HTML, CSS, PHP, Laravel,..." />
                                                        <button type="submit" class="btn btn-sm btn-outline-success">
                                                            <i class="bi bi-save"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                                <form action="{{ route('admin.skill.delete', $skill->id) }}" method="POST"
                                                    class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger p-0"
                                                        style="font-size: 0.875rem;">
                                                        Xóa
                                                    </button>
                                                </form>
                                                @if ($skill->priority < 10)
                                                    <form action="{{ route('admin.skill.priority.up', $skill->id) }}"
                                                        method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-link text-secondary p-0"
                                                            style="font-size: 0.875rem;">
                                                            Up
                                                        </button>
                                                    </form>
                                                @endif
                                                @if ($skill->priority > 0)
                                                    <form action="{{ route('admin.skill.priority.down', $skill->id) }}"
                                                        method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-link text-secondary p-0"
                                                            style="font-size: 0.875rem;">
                                                            Down
                                                        </button>
                                                    </form>
                                                @endif
                                                @if ($skill->priority != 0)
                                                    <form action="{{ route('admin.skill.priority.reset', $skill->id) }}"
                                                        method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-link text-secondary p-0"
                                                            style="font-size: 0.875rem;">
                                                            Reset
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <form action="{{ route('admin.skill-category.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card card-dark card-outline mb-4">
                                    <!--begin::Header-->
                                    <div class="card-header">
                                        <div class="card-title">Nhóm</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">Tên nhóm</span>
                                                <input type="text" class="form-control" name="skill_category_name"
                                                    placeholder="Frontend, Backend,..." value="{{ $category->name }}" />
                                            </div>
                                            @error('skill_category_name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                    <!--begin::Footer-->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-outline-dark">Lưu thay đổi</button>
                                    </div>
                                    <!--end::Footer-->
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <form action="{{ route('admin.skill.store') }}" method="POST">
                                @csrf
                                <div class="card card-primary card-outline mb-4">
                                    <!--begin::Header-->
                                    <div class="card-header">
                                        <div class="card-title">Thêm kỹ năng</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <form action="{{ route('admin.skill.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="hidden" name="skill_category_id"
                                                    value="{{ $category->id }}" />
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon2">Kỹ năng</span>
                                                    <input type="text" class="form-control" name="skill_name"
                                                        placeholder="HTML, CSS, PHP, Laravel,..."
                                                        aria-describedby="basic-addon2" />
                                                </div>
                                                @error('skill_name')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </form>
                                    </div>
                                    <!--end::Body-->
                                    <!--begin::Footer-->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-outline-secondary">Thêm kỹ năng</button>
                                    </div>
                                    <!--end::Footer-->
                                </div>
                            </form>
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

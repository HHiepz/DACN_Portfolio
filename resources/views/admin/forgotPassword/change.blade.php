@extends('layout.admin')

@section('title', 'Admin - Change Password')

@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Đổi mật khẩu</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.profile.edit') }}">Cài đặt thông tin</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Thay đổi mật khẩu</li>
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
                <div class="row g-4">
                    <div class="col-md-8">
                        <form action="{{ route('admin.profile.passowrd.update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card card-dark card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Đổi mật khẩu</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mật khẩu cũ</label>
                                        <input type="password" class="form-control" name="passworld_old"
                                            placeholder="Mật khẩu cũ" />
                                        @error('passworld_old')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mật khẩu mới</label>
                                        <input type="password" class="form-control" name="passworld"
                                            placeholder="Mật khẩu mới" />
                                        @error('passworld')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Lập lại mật khẩu mới</label>
                                        <input type="password" class="form-control" name="passworld_again"
                                            placeholder="Lập lại mật khẩu mới" />
                                        @error('passworld_again')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Body-->
                                <div class="card-footer">
                                    <button class="btn btn-warning">
                                        Lưu thay đổi
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection

@extends('layout.admin')

@section('title', 'Admin - Cài đặt thông tin')

@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Cài đặt thông tin</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cài đặt thông tin</li>
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
                <form action="{{ route('admin.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-4">
                        <!--begin::Col-->
                        <div class="col-md-12">
                            <div class="text-end">
                                <button type="submit" name="update" class="btn btn-warning">
                                    Lưu chỉnh sửa
                                </button>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card card-primary card-outline mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Cài đặt thông tin - {{ $user->first_name }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Email:</label>
                                        <input type="text" name="email"class="form-control" disabled
                                            value="{{ $user->email }}" />
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Tên (first_name):</label>
                                        <input type="text" name="first_name"class="form-control"
                                            placeholder="Tên"value="{{ $user->first_name }}" />
                                        @error('first_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Họ (last_name):</label>
                                        <input type="text" name="last_name"class="form-control"
                                            placeholder="Họ"value="{{ $user->last_name }}" />
                                        @error('last_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Năm sinh:</label>
                                        <input type="date" name="birthday"class="form-control" placeholder="Địa chỉ"
                                            value="{{ $user->birthday }}" />
                                        @error('birthday')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Số điện thoại
                                            (phone_number):</label>
                                        <input type="text" name="phone_number"class="form-control"
                                            placeholder="Số điện thoại" value="{{ $user->phone_number }}" />
                                        @error('phone_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Chuyên ngành (Major):</label>
                                        <input type="text" name="major"class="form-control" placeholder="Chuyên ngành"
                                            value="{{ $user->major }}" />
                                        @error('major')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Sinh sống (country):</label>
                                        <input type="text" name="country"class="form-control" placeholder="Sinh sống"
                                            value="{{ $user->country }}" />
                                        @error('country')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">iframe google map:</label>
                                        <input type="text" name="iframe_google_map"class="form-control"
                                            placeholder="Link google map" value="{{ $user->iframe_google_map }}" />
                                        @error('iframe_google_map')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Địa chỉ:</label>
                                        <input type="text" name="address"class="form-control" placeholder="Địa chỉ"
                                            value="{{ $user->address }}" />
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Mô tả chi tiết</label>
                                            <textarea class="form-control activeTinyeditor" name="description" rows="3">{!! $user->description !!}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-primary card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Ảnh đại diện</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="mb-3">
                                        @if (empty($user->image_url))
                                            <span class="badge bg-danger">Chưa có hình ảnh</span>
                                        @else
                                            <img src="{{ asset('storage/' . $user->image_url) }}"
                                                class="img-fluid rounded-circle" alt="{{ $user->name }}" />
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <input type="file" class="form-control" name="image" />
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                    </div>
                </form>
                <!--begin::Row-->
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection

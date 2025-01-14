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
                <div class="row g-4">
                    <!--begin::Col-->
                    <div class="col-md-8">
                        <form action="{{ route('admin.profile.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                            value="{{ $user->birthday ? $user->birthday->format('Y-m-d') : '' }}" />
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
                                        <label for="" class="form-label fw-bold">Link Github:</label>
                                        <input type="text" name="github_link"class="form-control"
                                            placeholder="Link Github" value="{{ $user->github_link }}" />
                                        @error('github_link')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Link Facebook:</label>
                                        <input type="text" name="facebook_link"class="form-control"
                                            placeholder="Link Facebook" value="{{ $user->facebook_link }}" />
                                        @error('facebook_link')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Link Linkedin:</label>
                                        <input type="text" name="linkedin_link"class="form-control"
                                            placeholder="Link Linkedin" value="{{ $user->linkedin_link }}" />
                                        @error('linkedin_link')
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
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Ảnh đại diện:</label>
                                        <input type="file" class="form-control" name="image" />
                                        @error('image')
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
                                <div class="card-footer">
                                    <button type="submit" name="update" class="btn btn-warning">
                                        Lưu chỉnh sửa
                                    </button>
                                </div>
                            </div>
                        </form>
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
                            </div>
                            <!--end::Body-->
                        </div>


                        <div class="card card-dark card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Danh sách CV</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <form action="{{ route('admin.profile.file.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="file" class="form-control" name="files[]" multiple
                                                    placeholder="" aria-describedby="fileHelpId" />
                                            </div>
                                            @if ($errors->has('files.*'))
                                                <div class="text-danger">
                                                    @foreach ($errors->get('files.*') as $message)
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
                                    @if ($files->count() > 0)
                                        <div class="col-12">
                                            <div class="row g-2">
                                                @foreach ($files as $file)
                                                    <div class="col-12">
                                                        <p class="mb-0">
                                                            {{ $file->name }}
                                                            @php
                                                                $fileUrl = asset('storage/' . $file->file_url);
                                                                $fileSize = filesize(
                                                                    storage_path('app/public/' . $file->file_url),
                                                                );
                                                                $fileExtension = pathinfo(
                                                                    $file->name,
                                                                    PATHINFO_EXTENSION,
                                                                );
                                                            @endphp
                                                            (<a href="{{ $fileUrl }}"
                                                                target="_blank">{{ number_format($fileSize / 1048576, 2) }}
                                                                MB</a> |
                                                            {{ $fileExtension }})
                                                        </p>
                                                        <div class="d-flex align-items-center">
                                                            @if ($user->file_id == $file->id)
                                                                <form action="{{ route('admin.profile.file.disable') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-link text-secondary p-0 me-2">
                                                                        Bỏ hiển thị
                                                                    </button>
                                                                </form>
                                                            @else
                                                                <form
                                                                    action="{{ route('admin.profile.file.active', $file->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-link text-primary p-0 me-2">
                                                                        Hiển thị chính
                                                                    </button>
                                                                </form>
                                                            @endif
                                                            <a href="{{ asset('storage/' . $file->file_url) }}"
                                                                class="inline-block text-secondary me-2" download>
                                                                Tải xuống
                                                            </a>
                                                            <form
                                                                action="{{ route('admin.profile.file.delete', $file->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-link text-danger p-0 me-2">
                                                                    Xóa
                                                                </button>
                                                            </form>
                                                        </div>
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
                <!--begin::Row-->
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection

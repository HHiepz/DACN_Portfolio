<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="{{ route('home') }}" target="_blank" class="nav-link">Xem trang
                    người dùng</a>
            </li>
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    @if ($user->image_url == null)
                        <img src="https://placehold.co/160x160" class="user-image rounded-circle shadow"
                            alt="User" />
                    @else
                        <img src="{{ asset('storage/' . $user->image_url) }}" class="user-image rounded-circle shadow"
                            alt="User" />
                    @endif
                    <span class="d-none d-md-inline">{{ $user->fullname }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        @if ($user->image_url == null)
                            <img src="https://placehold.co/160x160" class="rounded-circle shadow" alt="User" />
                        @else
                            <img src="{{ asset('storage/' . $user->image_url) }}" class="rounded-circle shadow"
                                alt="User" />
                        @endif
                        <p>
                            {{ $user->fullname }}
                            <small>Member since Nov. 2023</small>
                        </p>
                    </li>
                    <!--end::User Image-->
                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-default btn-flat">Cài đặt tài
                            khoản</a>
                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-end">Đăng xuất</a>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>

<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">
                {{ config('app.name') }}
            </span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-primary' : '' }}">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header"> </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <p>
                            Quản lý kỹ năng
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.languages') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.languages' ? 'bg-primary' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Ngôn ngữ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.skill-categories') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.skill-categories' ? 'bg-primary' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kỹ năng chuyên ngành</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link ">
                        <p>
                            Quản lý dự án
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.technologies') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.technologies' ? 'bg-primary' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Công nghệ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.products') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.products' ? 'bg-primary' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Danh sách dự án</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product-categories') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.product-categories' ? 'bg-primary' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link ">
                        <p>
                            Quản lý mạng xã hội
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.socials') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.socials' ? 'bg-primary' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Danh sách mạng xã hội</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.social-categories') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.social-categories' ? 'bg-primary' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>

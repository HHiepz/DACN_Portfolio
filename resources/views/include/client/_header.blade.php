<header>
    <div class="container">
        <div class="d-flex align-items-center">
            <!-- Logo -->
            <div class="header__logo">
                <a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
            </div>
            <!-- Menu -->
            <nav class="header__menu">
                <ul class="header__menu-list">
                    <li class="header__menu-item">
                        <a href="{{ route('home') }}" class="header__menu-link">Home</a>
                    </li>
                    <li class="header__menu-item">
                        <a href="{{ route('products') }}" class="header__menu-link">Project</a>
                    </li>
                    <li class="header__menu-item">
                        <a href="{{ route('home') }}" class="header__menu-link">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Download CV -->
        <div class="header__download">
            @if ($user->file_id == null)
                <button class="btn btn-primary" disabled>
                    Tải CV của tôi
                    <i class="bi bi-download"></i>
                </button>
            @else
                <a href="{{ asset('storage/' . $user->file->file_url) }}" class="btn btn-primary" download="">
                    Tải CV của tôi
                    <i class="bi bi-download"></i>
                </a>
            @endif
        </div>
    </div>
</header>

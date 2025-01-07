<div id="sidebar-container">
    <div id="sidebar">
        <!-- Avatar, Major, Contact (fb, github) -->
        <section class="border-dark border-bottom d-flex flex-column align-items-center py-3">
            <div class="sidebar__avatar">
                @if (empty($user->image_url))
                    <img src="https://placehold.co/150x150" class="img-fluid rounded-circle" alt="" />
                @else
                    <img src="{{ asset('storage/' . $user->image_url) }}" class="img-fluid rounded-circle d-block mx-auto"
                        style="width: 200px; height: 200px; object-fit: cover;" alt="" />
                @endif
            </div>
            <p class="sidebar__name mb-0">
                {{ $user->fullname }}
            </p>
            <div class="sidebar__major">
                <span>
                    {{ $user->major }}
                </span>
            </div>
            <div class="sidebar__contact">
                <a href="#" class="sidebar__link">
                    <i class="sidebar__icon bi bi-facebook"></i>
                </a>
                <a href="#" class="sidebar__link">
                    <i class="sidebar__icon bi bi-github"></i>
                </a>
            </div>
        </section>

        <section class="border-dark border-bottom py-3">
            <div class="row g-2">
                <div class="col-12 d-flex">
                    <span>Ngày sinh:</span>
                    <span class="ms-auto">{{ $user->birthday->format('d/m/Y') }}</span>
                </div>
                <div class="col-12 d-flex">
                    <span>Số điện thoại:</span>
                    <span class="ms-auto">{{ $user->phone_number }}</span>
                </div>
                <div class="col-12 d-flex">
                    <span>Địa chỉ:</span>
                    <span class="ms-auto">{{ $user->address }}</span>
                </div>
            </div>
        </section>

        <section class="border-dark border-bottom py-3">
            <div class="sidebar__category">
                <span class="fw-bold h5 pb-3 d-block">
                    Ngôn ngữ
                </span>
            </div>

            <div class="sidebar__skills">
                <div class="sidebar_skill">
                    <p class="sidebar_skill--title fw-bold">English</p>
                    <p class="sidebar_skill--details">Đọc, nghe cơ bản.</p>
                </div>
            </div>
        </section>

        <section class="border-dark border-bottom py-3">
            <div class="sidebar__category">
                <span class="fw-bold h5 pb-3 d-block">
                    Kỹ năng chuyên ngành
                </span>
            </div>

            <div class="sidebar__skills">
                <div class="sidebar_skill">
                    <p class="sidebar_skill--title fw-bold">Frontend</p>
                    <p class="sidebar_skill--details">HTML, CSS, JavaScript, Bootstrap 5</p>
                </div>
                <div class="sidebar_skill">
                    <p class="sidebar_skill--title fw-bold">Backend</p>
                    <p class="sidebar_skill--details">PHP (OOP), Laravel (MVC, API)</p>
                </div>
                <div class="sidebar_skill">
                    <p class="sidebar_skill--title fw-bold">Database</p>
                    <p class="sidebar_skill--details">MySQL</p>
                </div>
                <div class="sidebar_skill">
                    <p class="sidebar_skill--title fw-bold">Phần mềm/ứng dụng</p>
                    <p class="sidebar_skill--details">Git (Github), VS Code, Figma, Canva</p>
                </div>
            </div>
        </section>

        <section class="text-center py-3">
            <a href="#" class="btn btn-primary">Tải CV của tôi <i class="bi bi-download"></i></a>
        </section>
    </div>
</div>

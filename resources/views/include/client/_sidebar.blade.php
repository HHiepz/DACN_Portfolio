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
            @if (!empty($user->major))
                <div class="sidebar__major">
                    <span>
                        {{ $user->major }}
                    </span>
                </div>
            @endif
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
                @if (!empty($user->birthday))
                    <div class="col-12 d-flex">
                        <span>Ngày sinh:</span>
                        <span class="ms-auto">{{ $user->birthday->format('d/m/Y') }}</span>
                    </div>
                @endif
                @if (!empty($user->phone_number))
                    <div class="col-12 d-flex">
                        <span>Số điện thoại:</span>
                        <span class="ms-auto">{{ $user->phone_number }}</span>
                    </div>
                @endif
                @if (!empty($user->address))
                    <div class="col-12 d-flex">
                        <span>Địa chỉ:</span>
                        <span class="ms-auto">{{ $user->address }}</span>
                    </div>
                @endif
            </div>
        </section>

        @if ($languages->count() > 0)
            <section class="border-dark border-bottom py-3">
                <div class="sidebar__category">
                    <span class="fw-bold h5 pb-3 d-block">
                        Ngôn ngữ
                    </span>
                </div>

                <div class="sidebar__skills">
                    @foreach ($languages as $language)
                        <div class="sidebar_skill">
                            <p class="sidebar_skill--title fw-bold">{{ $language->name }}</p>
                            <p class="sidebar_skill--details">{{ $language->short_description }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        @if ($skillCategories->count() > 0)
            <section class="border-dark border-bottom py-3">
                <div class="sidebar__category">
                    <span class="fw-bold h5 pb-3 d-block">
                        Kỹ năng chuyên ngành
                    </span>
                </div>

                <div class="sidebar__skills">
                    @foreach ($skillCategories as $category)
                        <div class="sidebar_skill">
                            <p class="sidebar_skill--title fw-bold">{{ $category->name }}</p>
                            <p class="sidebar_skill--details">
                                @foreach ($category->skills as $skill)
                                    {{ $skill->name }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <section class="text-center py-3">
            <a href="#" class="btn btn-primary">Tải CV của tôi <i class="bi bi-download"></i></a>
        </section>
    </div>
</div>

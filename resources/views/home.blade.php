@extends('layout.layout')

{{-- Custom CSS --}}
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('/css/components/cpn-sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/pages/page-index.css') }}">
@endsection

{{-- Nội dung chính --}}
@section('content')
    <!-- Sidebar -->
    @include('include.client._sidebar')
    <!-- End: Sidebar -->

    {{-- Content --}}
    <div id="content">
        <div class="container">
            <section class="short-info">
                <div class="text-center">
                    <h1>{{ $user->fullname }} -
                        @if (!empty($user->major))
                            {{ $user->major }}
                        @endif
                    </h1>
                    <p class="text-start">
                        {!! $user->description !!}
                    </p>
                </div>
            </section>

            @if ($products->count() > 0)
                <section class="products">
                    <div class="text-center">
                        <h3 class="section__title">Sản phẩm</h3>
                        <p class="section__description">Các dự án tôi đã làm trong những năm tôi học lập trình </p>
                    </div>
                    <div class="row g-5 g-md-4">
                        @foreach ($products as $product)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="section__card">
                                    <a href="{{ route('product.detail', $product->id) }}">
                                        @if (empty($product->image_url))
                                            <img class="card-img-top rounded" src="https://placehold.co/400x200"
                                                alt="Title" />
                                        @else
                                            <img class="card-img-top rounded"
                                                src="{{ asset('storage/' . $product->image_url) }}" alt="Title" />
                                        @endif
                                    </a>
                                    <p class="section__card--type">
                                        <span>{{ $product->type }}</span>
                                        @if (!empty($product->project_started_at) || !empty($product->project_ended_at))
                                            ・
                                            <span>
                                                @if ($product->project_started_at && $product->project_ended_at)
                                                    {{ $product->project_started_at->format('d/m/Y') }}
                                                    -
                                                    {{ $product->project_ended_at->format('d/m/Y') }}
                                                @elseif ($product->project_started_at)
                                                    {{ $product->project_started_at->format('d/m/Y') }}
                                                @elseif ($product->project_ended_at)
                                                    {{ $product->project_ended_at->format('d/m/Y') }}
                                                @endif
                                            </span>
                                        @endif
                                    </p>
                                    <h4 class="section__card--title">
                                        <a href="{{ route('product.detail', $product->id) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h4>
                                    <p class="section__card--text">
                                        {{ $product->short_description }}
                                    </p>
                                    <div class="section__card--tags">
                                        @foreach ($product->technologies as $technology)
                                            <span class="badge badge-outline-dark">{{ $technology->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="section__more">
                        <a class="btn btn-primary" href="{{ route('products') }}">Xem thêm</a>
                    </div>
                </section>
            @endif

            @if ($technologies->count() > 0)
                <section class="skills">
                    @foreach ($technologies as $technology)
                        <div class="skill__item">
                            <img src="{{ asset('storage/' . $technology->image_url) }}" class="img-fluid rounded-top"
                                alt="{{ $technology->name }}" />
                            <span class="skill__item--text">{{ $technology->name }}</span>
                        </div>
                    @endforeach
                </section>
            @endif

            @if ($socials->count() > 0)
                <section class="social">
                    <div class="text-center">
                        <h3 class="section__title">Cuộc Sống Xã Hội</h3>
                        <p class="section__description">Thông tin về cuộc sống xã hội của tôi</p>
                    </div>
                    <div class="row g-5 g-md-4">
                        @foreach ($socials as $social)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="section__card">
                                    <a href="{{ route('social.detail', $social->id) }}">
                                        @if (empty($social->image_url))
                                            <img class="card-img-top rounded" src="https://placehold.co/400x200"
                                                alt="Title" />
                                        @else
                                            <img class="card-img-top rounded"
                                                src="{{ asset('storage/' . $social->image_url) }}" alt="Title" />
                                        @endif
                                    </a>
                                    <p class="section__card--type">
                                        <span>{{ $social->type }}</span>
                                        @if (!empty($social->social_started_at) || !empty($social->social_ended_at))
                                            ・
                                            <span>
                                                @if ($social->social_started_at && $social->social_ended_at)
                                                    {{ $social->social_started_at->format('d/m/Y') }}
                                                    -
                                                    {{ $social->social_ended_at->format('d/m/Y') }}
                                                @elseif ($social->social_started_at)
                                                    {{ $social->social_started_at->format('d/m/Y') }}
                                                @elseif ($social->social_ended_at)
                                                    {{ $social->social_ended_at->format('d/m/Y') }}
                                                @endif
                                            </span>
                                        @endif
                                    </p>
                                    <h4 class="section__card--title">
                                        <a href="{{ route('social.detail', $social->id) }}">
                                            {{ $social->name }}
                                        </a>
                                    </h4>
                                    <p class="section__card--text">
                                        {{ $social->short_description }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="section__more">
                        <a class="btn btn-primary" href="{{ route('socials') }}">Xem thêm</a>
                    </div>
                </section>
            @endif

            @if (!empty($user->iframe_google_map) && !empty($user->country))
                <section class="map">
                    <div class="text-center">
                        <h3 class="section__title">Sinh sống và làm việc</h3>
                        <p class="section__description text-danger">{{ $user->country }}</p>
                    </div>
                    {!! $user->iframe_google_map !!}
                </section>
            @endif

            <footer>
                <div class="container">
                    <div class="d-flex align-items-start border-bottom ">
                        <div class="footer__content">
                            <p class="footer__content--owner">Mr HIEP</p>
                            <ul class="footer__nav">
                                <li class="footer__nav--item">
                                    <a href="{{ route('home') }}">Trang chủ</a>
                                </li>
                                <li class="footer__nav--item">
                                    <a href="{{ route('products') }}">Sản phẩm</a>
                                </li>
                                <li class="footer__nav--item">
                                    <a href="{{ route('socials') }}">Cuộc sống xã hội</a>
                                </li>
                                <li class="footer__nav--item">
                                    <a href="{{ route('home') }}">Sinh sống và làm việc</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer__contact">
                            <label for="" class="footer__form--label form-label fw-bold">Liên hệ</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter your mail">
                                <button class="btn btn-primary" type="button">Gửi</button>
                            </div>
                        </div>
                    </div>
                    <div class="copyright">
                        Trong trường hợp cần thêm thông tin vui lòng liên hệ qua
                        <span class="fw-bold">{{ $user->email }}</span>. Cảm ơn
                        đã ghé
                    </div>
                </div>
            </footer>

        </div>
    </div>
    {{-- End: Content --}}
@endsection

@extends('layout.layout')

{{-- Nội dung chính --}}
@section('content')
    @include('include.client._header')

    <main class="py-5 min-vh-100">
        <div class="container">
            <section>
                <div class="section__banner-text">
                    <p class="section__banner-text--title">Sản phẩm</p>
                    <p class="section__banner-text--text">
                        Các dự án tôi đã làm trong những năm tôi học lập trình
                    </p>
                </div>
            </section>

            <section>
                <div class="row g-5 g-md-4">
                    @foreach ($socials as $social)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="section__card">
                                <a href="{{ route('social.detail', $social->id) }}">
                                    @if (empty($social->image_url))
                                        <img class="card-img-top rounded" src="https://placehold.co/400x200"
                                            alt="Title" />
                                    @else
                                        <img class="card-img-top rounded" src="{{ asset('storage/' . $social->image_url) }}"
                                            alt="Title" />
                                    @endif
                                </a>
                                <p class="section__card--type">
                                    <span>{{ $social->type }}</span>
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
                    <div class="col-12">
                        <div class="text-end">
                            {{ $socials->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    @include('include.client._footer')
@endsection

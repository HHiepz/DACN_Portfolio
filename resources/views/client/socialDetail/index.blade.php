@extends('layout.layout')

{{-- Custom CSS --}}
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/pages/page-details.css') }}">
@endsection

{{-- Nội dung chính --}}
@section('content')
    @include('include.client._header')

    <main class="py-5 min-vh-100">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-7">
                    <div id="detail__images" class="carousel slide" data-bs-ride="carousel">

                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#detail__images" data-bs-slide-to="0"
                                class="active"></button>
                        </div>

                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner">
                            @if (!empty($social->image_url))
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/' . $social->image_url) }}" alt="{{ $social->name }}"
                                        class="d-block w-100">
                                </div>
                            @else
                                <div class="carousel-item active">
                                    <img src="https://placehold.co/4000x2000" alt="Los Angeles" class="d-block w-100">
                                </div>
                            @endif
                        </div>

                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#detail__images"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#detail__images"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <h2 class="detail__title">{{ $social->name }}</h2>
                    <p class="detail__type">
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
                    <p class="detail__description">
                        {{ $social->short_description }}
                    </p>
                </div>
                <div class="col-12">
                    {!! $social->description !!}
                </div>
            </div>
        </div>
    </main>

    @include('include.client._footer')
@endsection

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
                            @if (!empty($product->image_url))
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}"
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
                    <h2 class="detail__title">{{ $product->name }}</h2>
                    <p class="detail__type">
                        <span>{{ $product->type }}</span>
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
                    </p>
                    <p class="detail__description">
                        {{ $product->short_description }}
                    </p>
                    @if ($product->technologies->count() > 0)
                        <div class="detail__tech">
                            @foreach ($product->technologies as $technology)
                                <img src="{{ asset('storage/' . $technology->image_url) }}"
                                    class="detail__tech--image img-fluid rounded-top" alt="{{ $technology->name }}" />
                            @endforeach
                        </div>
                    @endif
                    <div class="detail__buttons">
                        @if (!empty($product->github))
                            <a href="{{ $product->github }}" class="btn btn-tertiary">
                                Github
                                <i class="bi bi-github"></i>
                            </a>
                        @endif
                        @if (!empty($product->preview))
                            <a href="{{ $product->preview }}" class="btn btn-outline-tertiary">
                                Xem trực tiếp
                                <i class="bi bi-eye"></i>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    {!! $product->description !!}
                </div>
            </div>
        </div>
    </main>

    @include('include.client._footer')
@endsection

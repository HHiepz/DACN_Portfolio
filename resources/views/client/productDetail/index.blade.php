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
                            <button type="button" data-bs-target="#detail__images" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#detail__images" data-bs-slide-to="2"></button>
                        </div>

                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://placehold.co/4000x2000" alt="Los Angeles" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/4000x2000" alt="Chicago" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/4000x2000" alt="New York" class="d-block w-100">
                            </div>
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
                    <h2 class="detail__title">Website - Poffolio</h2>
                    <p class="detail__type">
                        <span>Dự án cá nhân</span>
                        ・
                        <span>21/11/2024</span>
                    </p>
                    <p class="detail__description">Một trang web giới thiệu bản thân, các kỹ năng và dự án
                        đã thực hiện, được thiết kế chuyên nghiệp và tối ưu trải nghiệm người dùng.
                    </p>
                    <div class="detail__tech">
                        <img src="{{ asset('images/icons/html.svg') }}" class="detail__tech--image img-fluid rounded-top"
                            alt="HTML" />
                        <img src="{{ asset('images/icons/css.svg') }}" class="detail__tech--image img-fluid rounded-top"
                            alt="CSS" />
                        <img src="{{ asset('images/icons/laravel.svg') }}" class="detail__tech--image img-fluid rounded-top"
                            alt="Laravel" />
                        <img src="{{ asset('images/icons/mysql.svg') }}" class="detail__tech--image img-fluid rounded-top"
                            alt="MySQL" />
                    </div>
                    <div class="detail__buttons">
                        <a href="#" class="btn btn-tertiary">
                            Github
                            <i class="bi bi-github"></i>
                        </a>
                        <a href="#" class="btn btn-outline-tertiary">
                            Xem trực tiếp
                            <i class="bi bi-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('include.client._footer')
@endsection

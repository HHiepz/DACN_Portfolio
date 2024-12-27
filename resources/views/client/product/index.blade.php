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
                <div class="section__card--fillter">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary">HTML</button>
                        <button type="button" class="btn btn-outline-primary">CSS</button>
                        <button type="button" class="btn btn-outline-primary">Bootstrap</button>
                        <button type="button" class="btn btn-outline-primary">Laravel</button>
                    </div>
                </div>

                <div class="row g-5 g-md-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="section__card">
                            <a href="#">
                                <img class="card-img-top rounded" src="https://placehold.co/400x200" alt="Title" />
                            </a>
                            <p class="section__card--type">
                                <span>Dự án cá nhân</span>
                                ・
                                <span>21/11/2024</span>
                            </p>
                            <h4 class="section__card--title">
                                <a href="#">
                                    Website Portfolio
                                </a>
                            </h4>
                            <p class="section__card--text">Một trang web giới thiệu bản thân, các kỹ năng và dự án
                                đã thực hiện, được thiết kế chuyên nghiệp và tối ưu trải nghiệm người dùng.
                            </p>
                            <div class="section__card--tags">
                                <span class="badge badge-outline-dark">HTML</span>
                                <span class="badge badge-outline-dark">CSS</span>
                                <span class="badge badge-outline-dark">JavaScript</span>
                                <span class="badge badge-outline-dark">Laravel</span>
                                <span class="badge badge-outline-dark">Bootstrap</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="section__card">
                            <a href="#">
                                <img class="card-img-top rounded" src="https://placehold.co/400x200" alt="Title" />
                            </a>
                            <p class="section__card--type">
                                <span>Dự án cá nhân</span>
                                ・
                                <span>21/11/2024</span>
                            </p>
                            <h4 class="section__card--title">
                                <a href="#">
                                    Website Portfolio
                                </a>
                            </h4>
                            <p class="section__card--text">Một trang web giới thiệu bản thân, các kỹ năng và dự án
                                đã thực hiện, được thiết kế chuyên nghiệp và tối ưu trải nghiệm người dùng.
                            </p>
                            <div class="section__card--tags">
                                <span class="badge badge-outline-dark">HTML</span>
                                <span class="badge badge-outline-dark">CSS</span>
                                <span class="badge badge-outline-dark">JavaScript</span>
                                <span class="badge badge-outline-dark">Laravel</span>
                                <span class="badge badge-outline-dark">Bootstrap</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="section__card">
                            <a href="#">
                                <img class="card-img-top rounded" src="https://placehold.co/400x200" alt="Title" />
                            </a>
                            <p class="section__card--type">
                                <span>Dự án cá nhân</span>
                                ・
                                <span>21/11/2024</span>
                            </p>
                            <h4 class="section__card--title">
                                <a href="#">
                                    Website Portfolio
                                </a>
                            </h4>
                            <p class="section__card--text">Một trang web giới thiệu bản thân, các kỹ năng và dự án
                                đã thực hiện, được thiết kế chuyên nghiệp và tối ưu trải nghiệm người dùng.
                            </p>
                            <div class="section__card--tags">
                                <span class="badge badge-outline-dark">HTML</span>
                                <span class="badge badge-outline-dark">CSS</span>
                                <span class="badge badge-outline-dark">JavaScript</span>
                                <span class="badge badge-outline-dark">Laravel</span>
                                <span class="badge badge-outline-dark">Bootstrap</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="section__card">
                            <a href="#">
                                <img class="card-img-top rounded" src="https://placehold.co/400x200" alt="Title" />
                            </a>
                            <p class="section__card--type">
                                <span>Dự án cá nhân</span>
                                ・
                                <span>21/11/2024</span>
                            </p>
                            <h4 class="section__card--title">
                                <a href="#">
                                    Website Portfolio
                                </a>
                            </h4>
                            <p class="section__card--text">Một trang web giới thiệu bản thân, các kỹ năng và dự án
                                đã thực hiện, được thiết kế chuyên nghiệp và tối ưu trải nghiệm người dùng.
                            </p>
                            <div class="section__card--tags">
                                <span class="badge badge-outline-dark">HTML</span>
                                <span class="badge badge-outline-dark">CSS</span>
                                <span class="badge badge-outline-dark">JavaScript</span>
                                <span class="badge badge-outline-dark">Laravel</span>
                                <span class="badge badge-outline-dark">Bootstrap</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="section__card">
                            <a href="#">
                                <img class="card-img-top rounded" src="https://placehold.co/400x200" alt="Title" />
                            </a>
                            <p class="section__card--type">
                                <span>Dự án cá nhân</span>
                                ・
                                <span>21/11/2024</span>
                            </p>
                            <h4 class="section__card--title">
                                <a href="#">
                                    Website Portfolio
                                </a>
                            </h4>
                            <p class="section__card--text">Một trang web giới thiệu bản thân, các kỹ năng và dự án
                                đã thực hiện, được thiết kế chuyên nghiệp và tối ưu trải nghiệm người dùng.
                            </p>
                            <div class="section__card--tags">
                                <span class="badge badge-outline-dark">HTML</span>
                                <span class="badge badge-outline-dark">CSS</span>
                                <span class="badge badge-outline-dark">JavaScript</span>
                                <span class="badge badge-outline-dark">Laravel</span>
                                <span class="badge badge-outline-dark">Bootstrap</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="section__card">
                            <a href="#">
                                <img class="card-img-top rounded" src="https://placehold.co/400x200" alt="Title" />
                            </a>
                            <p class="section__card--type">
                                <span>Dự án cá nhân</span>
                                ・
                                <span>21/11/2024</span>
                            </p>
                            <h4 class="section__card--title">
                                <a href="#">
                                    Website Portfolio
                                </a>
                            </h4>
                            <p class="section__card--text">Một trang web giới thiệu bản thân, các kỹ năng và dự án
                                đã thực hiện, được thiết kế chuyên nghiệp và tối ưu trải nghiệm người dùng.
                            </p>
                            <div class="section__card--tags">
                                <span class="badge badge-outline-dark">HTML</span>
                                <span class="badge badge-outline-dark">CSS</span>
                                <span class="badge badge-outline-dark">JavaScript</span>
                                <span class="badge badge-outline-dark">Laravel</span>
                                <span class="badge badge-outline-dark">Bootstrap</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    @include('include.client._footer')
@endsection

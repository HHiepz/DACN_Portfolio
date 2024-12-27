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
                    <h1>Trần Hữu Hiệp - Web Developer</h1>
                    <p class="text-start">
                        Với 2 năm kinh nghiệm làm việc với ngôn ngữ PHP, tôi có thể xây dựng hệ thống Backend,
                        RESTful API với Laravel. Sử dụng thành thạo mô hình Model-View-Controller và Git (Github) để
                        quản lý và triển khai dự án.
                    </p>
                </div>
            </section>

            <section class="products">
                <div class="text-center">
                    <h3 class="section__title">Sản phẩm</h3>
                    <p class="section__description">Các dự án tôi đã làm trong những năm tôi học lập trình </p>
                </div>
                <div class="row g-5 g-md-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="section__card">
                            <a href="{{ route('product.detail', ['id' => 1]) }}">
                                <img class="card-img-top rounded" src="https://placehold.co/400x200" alt="Title" />
                            </a>
                            <p class="section__card--type">
                                <span>Dự án cá nhân</span>
                                ・
                                <span>21/11/2024</span>
                            </p>
                            <h4 class="section__card--title">
                                <a href="{{ route('product.detail', ['id' => 1]) }}">
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
                <div class="section__more">
                    <a class="btn btn-primary" href="{{ route('product') }}">Xem thêm</a>
                </div>
            </section>

            <section class="skills">
                <div class="skill__item">
                    <img src="{{ asset('/images/icons/bootstrap.svg') }}" class="img-fluid rounded-top" alt="" />
                    <span class="skill__item--text">Bootstrap</span>
                </div>
                <div class="skill__item">
                    <img src="{{ asset('/images/icons/laravel.svg') }}" class="img-fluid rounded-top" alt="" />
                    <span class="skill__item--text">Laravel</span>
                </div>
                <div class="skill__item">
                    <img src="{{ asset('/images/icons/html.svg') }}" class="img-fluid rounded-top" alt="" />
                    <span class="skill__item--text">HTML</span>
                </div>
                <div class="skill__item">
                    <img src="{{ asset('/images/icons/css.svg') }}" class="img-fluid rounded-top" alt="" />
                    <span class="skill__item--text">CSS</span>
                </div>
                <div class="skill__item">
                    <img src="{{ asset('/images/icons/mysql.svg') }}" class="img-fluid rounded-top" alt="" />
                    <span class="skill__item--text">MySQL</span>
                </div>
            </section>

            <section class="social">
                <div class="text-center">
                    <h3 class="section__title">Cuộc Sống Xã Hội</h3>
                    <p class="section__description">Thông tin về cuộc sống xã hội của tôi</p>
                </div>
                <div class="row g-5 g-md-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="section__card">
                            <a href="#">
                                <a href="#">
                                    <img class="card-img-top rounded" src="https://placehold.co/400x200"
                                        alt="Title" />
                                </a> </a>
                            <p class="section__card--type">
                                <span>Dự án cá nhân</span>
                                ・
                                <span>21/11/2024</span>
                            </p>
                            <p class="section__card--text">Một trang web giới thiệu bản thân, các kỹ năng và dự án
                                đã thực hiện, được thiết kế chuyên nghiệp và tối ưu trải nghiệm người dùng.
                            </p>
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
                            <p class="section__card--text">Một trang web giới thiệu bản thân, các kỹ năng và dự án
                                đã thực hiện, được thiết kế chuyên nghiệp và tối ưu trải nghiệm người dùng.
                            </p>
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
                            <p class="section__card--text">Một trang web giới thiệu bản thân, các kỹ năng và dự án
                                đã thực hiện, được thiết kế chuyên nghiệp và tối ưu trải nghiệm người dùng.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="section__more">
                    <a class="btn btn-primary" href="#">Xem thêm</a>
                </div>
            </section>


            <section class="map">
                <div class="text-center">
                    <h3 class="section__title">Sinh sống và làm việc</h3>
                    <p class="section__description text-danger">VIET NAM</p>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37551.75812652027!2d106.54329905659716!3d10.853761615170697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ae8d6408f5d%3A0x2b4a3cf382ff5d55!2zWHXDom4gVGjhu5tpIFRoxrDhu6NuZywgSMOzYyBNw7RuLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e1!3m2!1svi!2s!4v1733947116302!5m2!1svi!2s"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </section>

            <footer>
                <div class="container">
                    <div class="d-flex align-items-start border-bottom ">
                        <div class="footer__content">
                            <p class="footer__content--owner">Mr HIEP</p>
                            <ul class="footer__nav">
                                <li class="footer__nav--item">
                                    <a href="#">Trang chủ</a>
                                </li>
                                <li class="footer__nav--item">
                                    <a href="#">Sản phẩm</a>
                                </li>
                                <li class="footer__nav--item">
                                    <a href="#">Cuộc sống xã hội</a>
                                </li>
                                <li class="footer__nav--item">
                                    <a href="#">Sinh sống và làm việc</a>
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
                        <span class="fw-bold">tranhuuhiep2004@gmail.com</span>. Cảm ơn
                        đã ghé
                    </div>
                </div>
            </footer>

        </div>
    </div>
    {{-- End: Content --}}
@endsection

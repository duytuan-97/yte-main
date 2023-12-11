<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    {{-- <title>La'hera</title> --}}
    <title>La'hera @yield('title')</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('customer/assets/img/LHR_Web_Logo-10.png') }}" rel="icon" />
    <link href="{{ asset('customer/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <!-- Vendor CSS Files -->
    <link href="{{ asset('customer/assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('customer/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('customer/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('customer/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('customer/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('customer/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('customer/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('customer/assets/css/basic.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body class="body bg-white">
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <!-- <h1 class="logo me-auto"><a href="index.html">LA'HERA</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/" class="logo me-auto"><img src="{{ asset('customer/assets/img/logo.png') }}"
                    alt="" /></a>
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li>
                        <a class="nav-link scrollto" href="{{route('customer.index')}}">TRANG CHỦ</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="{{route('customer.dangthuchien')}}">VỀ CHÚNG TÔI</a>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>DỊCH VỤ</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{route('customer.medicine.index')}}">Dược</a></li>
                            <li><a href="{{route('customer.pharmaceuticalandmedical.index')}}">Y tế</a></li>
                            <li><a href="{{route('customer.dangthuchien')}}">Lưu trú</a></li>
                            <li><a href="{{route('news.index')}}">Tin tức</a></li>
                            <li><a href="{{route('customer.dangthuchien')}}">Văn phòng đổi mới sáng tạo</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('customer.dangthuchien')}}">LIÊN HỆ</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    @yield('content')

    <!--  Footer -->
    <section class="footer">
        <div class="container">
            <div>
                <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
                <hr />
            </div>
            <div class="row d-flex">
                <div class="footer-img">
                    <img src="{{ asset('customer/assets/img/LHR_Web_Logo-10.png') }}" class="img-fluid"
                        alt="" />
                </div>
                <div class="footer-content">
                    <div>
                        <h4>CÔNG TY CỔ PHẦN DỊCH VỤ Y TẾ VÀ DƯỢC PHẨM LA'HERA</h4>
                    </div>
                    <div class="d-md-flex">
                        <div class="col-md-3 col-sm-12">
                            <p>T.0981.600.650</p>
                        </div>
                        <div class="col-md-6 col-sm-12 me-3">
                            <p>
                                A.177 Hai Ba Trung, Ward Vo Thi Sau, District 3, Ho Chi Minh
                                City.
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-12 me-2">
                            <p>E.kinhdoanh@lahera.vn</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Footer -->
    <!-- Vendor JS Files -->
    <script src="{{ asset('customer/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('customer/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('customer/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('customer/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('customer/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('customer/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('customer/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('customer/assets/js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>

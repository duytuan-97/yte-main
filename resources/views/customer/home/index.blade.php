@extends('customer.layouts.basic')

@section('styles')
    <link href="{{ asset('customer/assets/css/home.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
@endsection

@section('content')
    <main id="main" class="container">
        <!-- ======= Hero Section ======= -->
        <div class="row p-1">
            <div class="image-container">
                <img class="responsive-image animate__animated animate__fadeInRight animate__delay-1s" id="image"
                    src="{{ asset('customer/assets/img/LHR_Web_MainBanner-01.jpg') }}" />
                <img class="responsive-image animate__animated animate__fadeInRight animate__delay-1s" id="mobile-image"
                    src="{{ asset('customer/assets/img/LHR_Web_MainBanner_Mob-03.jpg') }}" />
                <div class="row image-text " id="text">
                    <div class="col-xl-6 hero-text">
                        <div class="animate__animated animate__fadeInLeft animate__delay-2s divider"></div>
                        <div class="hero-panel animate__animated animate__fadeInRight animate__delay-2s"
                            style="text-align: left;">
                            <h2>DỊCH VỤ</h2>
                            <h1>DƯỢC &<br>Y TẾ</h1>
                            <p>
                                Dịch vụ chăm sóc sức khỏe của La' Hera là giải pháp kết hợp
                                của Tây y và Việt y nhằm mang đến kết quả điều trị tốt nhất
                                cho khách hàng
                            </p>
                            <a href="{{route('customer.pharmaceuticalandmedical.index')}}" class="btn-get-started scrollto" style="text-decoration:underline; color: black">XEM THÊM</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero -->

        <!-- MainBanner 2 row  hidden style="display: grid;"-->
        <section class="row p-4">
            <div class="image-container-2">
                <!-- animate__animated animate__fadeInLeft animate__delay-4s  -->
                <!--   -->
                <div class="divider-2  animate__animated animate__fadeInLeft animate__delay-2s" id="divider-2"></div>
                <!-- animate__animated animate__fadeInLeft animate__delay-2s -->
                <img class="responsive-image-2 animate__animated animate__fadeInLeft animate__delay-1s" id="image-2"
                    src="{{ asset('customer/assets/img/LHR_Web_MainBanner-02.jpg') }}" />
                <!-- animate__animated animate__fadeInLeft animate__delay-2s -->
                <img class="responsive-image-2 animate__animated animate__fadeInLeft animate__delay-1s" id="mobile-image-2"
                    src="{{ asset('customer/assets/img/LHR_Web_MainBanner_Mob-04.jpg') }}" />
                <div class="row image-text-2 " id="text-2">
                    <div class="hero-text-2">
                        <!-- animate__animated animate__fadeInRight animate__delay-4s -->
                        <div class="hero-panel-2 animate__animated animate__fadeInRight animate__delay-2s"
                            style="text-align: left;">
                            <h2>DỊCH VỤ</h2>
                            <h1>LƯU TRÚ & LÀM VIỆC</h1>
                            <ul style="list-style-type:disc;">
                                <li style="padding-left: 0;">Dịch vụ lưu trú cao cấp - Bed In Town quận 1</li>
                                <li style="padding-left: 0;">Dịch vụ văn phòng đổi mới sáng tạo</li>
                            </ul>
                            <a href="{{route('customer.dangthuchien')}}" class="btn-get-started scrollto"
                                style="text-decoration:underline; color: black">XEM THÊM</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End MainBanner 2 -->
    </main>
@endsection

@section('scripts')
    <script>
        window.addEventListener("load", function() {
            updateTextPosition();

            window.addEventListener("resize",function(){
                if(isLandscape()){
                    reloadPage();
                }else{
                    updateTextPosition();
                }
            });


            function updateTextPosition() {
                const imageHeight = document.getElementById("image").clientHeight;
                const textElement = document.getElementById("text");
                const mobileImageElement = document.getElementById("mobile-image");
                const imageHeight_2 = document.getElementById("image-2").clientHeight;
                const textElement_2 = document.getElementById("text-2");
                const divider_2 = document.getElementById("divider-2");
                const mobileImageElement_2 = document.getElementById("mobile-image-2");

                if (window.innerWidth >= 768) {
                    const desiredTop = imageHeight * 0.591; // Điều chỉnh vị trí theo tỷ lệ cao hình ảnh
                    textElement.style.top = `${desiredTop}px`;
                    mobileImageElement.style.display = "none"; // Ẩn hình ảnh cho màn hình điện thoại
                    document.getElementById("image").style.display = "block"; // Hiển thị hình ảnh mặc định
                    //image-2
                    const desiredTop_2 = imageHeight_2 *
                        0.3350; //0.3350.285 Điều chỉnh vị trí theo tỷ lệ cao hình ảnh
                    const dividerTop_2 = imageHeight_2 * 0.148;
                    textElement_2.style.top = `${desiredTop_2}px`;
                    divider_2.style.top = `${dividerTop_2}px`;
                    mobileImageElement_2.style.display = "none"; // Ẩn hình ảnh cho màn hình điện thoại
                    document.getElementById("image-2").style.display = "block"; // Hiển thị hình ảnh mặc định
                    if (window.innerWidth >= 1200 && window.innerWidth <= 1400) {
                        const desiredTop_2 = imageHeight_2 *
                            0.3380; //0.285 Điều chỉnh vị trí theo tỷ lệ cao hình ảnh
                        // const dividerTop_2 = imageHeight_2 * 0.148;
                        textElement_2.style.top = `${desiredTop_2}px`;
                    }
                    if (window.innerWidth >= 992 && window.innerWidth < 1200) {
                        const desiredTop_2 = imageHeight_2 *
                            0.3600; //0.285 Điều chỉnh vị trí theo tỷ lệ cao hình ảnh
                        // const dividerTop_2 = imageHeight_2 * 0.148;
                        textElement_2.style.top = `${desiredTop_2}px`;
                    }
                    if (window.innerWidth < 992 && window.innerWidth >= 768) {
                        const desiredTop_2 = imageHeight_2 *
                            0.3500; //0.285 Điều chỉnh vị trí theo tỷ lệ cao hình ảnh
                        // const dividerTop_2 = imageHeight_2 * 0.148;
                        textElement_2.style.top = `${desiredTop_2}px`;
                    }
                    // textElement_2.style.top = `${desiredTop_2}px`;
                } else {
                    const desiredTop = imageHeight * 0.591;
                    mobileImageElement.style.display = "block"; // Hiển thị hình ảnh cho màn hình điện thoại
                    document.getElementById("image").style.display = "none";
                    //image-2
                    const desiredTop_2 = imageHeight_2 * 0.84; //0.285 Điều chỉnh vị trí theo tỷ lệ cao hình ảnh
                    const dividerTop_2 = imageHeight_2 * 0.194;
                    // textElement_2.style.top = `${desiredTop_2}px`;
                    //     divider_2.style.top = `${dividerTop_2}px`;
                    mobileImageElement_2.style.display = "block"; // Hiển thị hình ảnh cho màn hình điện thoại
                    document.getElementById("image-2").style.display = "none";
                }
            }
        });
        // Hàm kiểm tra xem trang nằm ngang hay dọc
        function isLandscape() {
            return window.innerWidth > window.innerHeight;
        }

        // Hàm reload lại trang
        function reloadPage() {
            window.location.reload();
        }
    </script>
    <script>
        // Hàm kiểm tra xem trang nằm ngang hay dọc
        function isLandscape() {
            return window.innerWidth > window.innerHeight;
        }

        // Hàm reload lại trang
        function reloadPage() {
            window.location.reload();
        }
    </script>

    <script>
        AOS.init();
    </script>
@endsection

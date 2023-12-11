@extends('customer.layouts.basic')

@section('title', "- ".$product->last_name)
@section('styles')
    <link href="{{ asset('/customer/assets/css/pharmaceutical_detail.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
@endsection

@section('content')
    <div id="main" class="bg-white">
        <div class="container">
            <div class="pb-5" >
                <div class="card" style="padding-top:100px">
                    <div class="row g-0">
                        <div class="col-md-6 border-end">
                            <div class="d-flex flex-column justify-content-center">
                                <div class="main_image" style="max-width: 1000px">
                                    {{-- <img src="{{ asset('/customer/assets/img/Duoc_BLSh.png') }}" id="main_product_image" width="350" /> --}}

                                    <img src="/storage/{{ $product->images[0] }}" id="main_product_image" width="350" />
                                </div>
                                <div class="thumbnail_images overflow-hidden">
                                    <div class=" mySwiper">
                                        <div class="swiper-wrapper thumbnail_images_ul">
                                            @foreach ($product_images as $item)
                                                <div class="swiper-slide thumbnail_images_li">
                                                <img onclick="changeImage(this)" src="/storage/{{ $item }}" width="70" />
                                            </div>
                                            @endforeach

                                        {{-- <div class="swiper-slide thumbnail_images_li">
                                            <img onclick="changeImage(this)"
                                                src="{{ asset('/customer/assets/img/Duoc_BLSh.png') }}" width="70" />
                                        </div>
                                        <div class="swiper-slide thumbnail_images_li">
                                            <img onclick="changeImage(this)"
                                                src="{{ asset('/customer/assets/img/LHR_Web_SubDuoc_Detail_DTAs-06.jpg') }}"
                                                width="70" />
                                        </div>
                                        <div class="swiper-slide thumbnail_images_li">
                                            <img onclick="changeImage(this)"
                                                src="{{ asset('/customer/assets/img/LHR_Web_SubDuoc_Detail_DTAs-05.jpg') }}"
                                                width="70" />
                                        </div>
                                        <div class="swiper-slide thumbnail_images_li">
                                            <img onclick="changeImage(this)"
                                                src="{{ asset('/customer/assets/img/LHR_Web_SubDuoc_Detail_DTAs-06.jpg') }}"
                                                width="70" />
                                        </div>
                                        <div class="swiper-slide thumbnail_images_li">
                                            <img onclick="changeImage(this)"
                                                src="{{ asset('/customer/assets/img/LHR_Web_SubDuoc_Detail_DTAs-05.jpg') }}"
                                                width="70" />
                                        </div>
                                        <div class="swiper-slide thumbnail_images_li">
                                            <img onclick="changeImage(this)"
                                                src="{{ asset('/customer/assets/img/LHR_Web_SubDuoc_Detail_DTAs-06.jpg') }}"
                                                width="70" />
                                        </div>
                                        <div class="swiper-slide thumbnail_images_li">
                                            <img onclick="changeImage(this)"
                                                src="{{ asset('/customer/assets/img/LHR_Web_SubDuoc_Detail_DTAs-05.jpg') }}"
                                                width="70" />
                                        </div> --}}
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 right-side content-above">
                                <div class="d-flex justify-content-between align-items-center">
                                    {{-- <h2>Viên uống cải thiện</h2> --}}
                                    <h2>{{$product->first_name}}</h2>
                                </div>
                                <div class="mt-2 pr-3 content">
                                    <h1 class="title-sp">{{$product->last_name}}</h1>
                                    {{-- <h1>Giảm suy nhược cơ thể BLSH</h1> --}}
                                </div>
                                <div class="price">
                                    <h3 style="border-bottom: 1px solid #d7dadc">{!!$product->price!!} VND</h3>
                                </div>
                                <div class="mt-5 content-text">
                                    <div class="title-sub">CÔNG DỤNG</div>
                                        {!!$product->purpose!!}

                                    {{-- <ul class="ul-left">
                                        <li>Hỗ trợ tăng cường sức đề kháng.</li>
                                        <li>Hỗ trợ giảm suy nhược cơ thể, giảm mệt mỏi.</li>
                                        <li>Giúp tiêu hóa tốt.</li>
                                    </ul> --}}
                                    <div class="title-sub">CÁCH DÙNG</div>
                                    <div class="justify-ul">{!!$product->use!!}</div>

                                    {{-- <h3>Liều dùng bình thường: <b>2 viên/lần</b>.</h3>
                                    <h3>
                                        Liều dùng trong các trường hợp điều trị đặc biệt:
                                        <b>5 viên/lần</b>. Mỗi ngày uống <b>2 lần</b> hoặc theo sự
                                        hướng dẫn của bác sĩ
                                    </h3> --}}
                                </div>
                            </div>
                            <div class="p-3 right-side content-above">
                                <div class="content-text">
                                    <div class="title-sub">ĐỐI TƯỢNG SỬ DỤNG</div>
                                    {{$product->drug_facts}}

                                    {{-- <h3>
                                        Người sức đề khác kém, suy nhược cơ thể, mệt mỏi, ăn kém
                                    </h3> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card image-sub content-above" id="full-description">
                    <div class="content-text">
                        <div class="title-sub">MÔ TẢ SẢN PHẨM</div>
                        {!!$product->content!!}
                    </div>

                    {{-- <img id="image-sub" src="{{ asset('/customer/assets/img/LHR_Web_SubDuoc_Detail_BLSh-03.png') }}"
                        width="100%" />
                    <img id="mobile-image-sub"
                        src="{{ asset('/customer/assets/img/LHR_Web_SubDuoc_Detail_BLSh-04.png') }}" width="100%" /> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        watchSlidesProgress: true,
        slidesPerView: 4,
    });
    </script>
    <script>
        window.addEventListener("load", function() {

            // updateTextPosition();
            // window.addEventListener("resize", updateTextPosition);

            // function updateTextPosition() {
            //     const mobileImageElement =
            //         document.getElementById("mobile-image-sub");

            //     if (window.innerWidth >= 768) {
            //         mobileImageElement.style.display = "none";
            //         document.getElementById("image-sub").style.display = "block";
            //     } else {
            //         mobileImageElement.style.display = "block";
            //         document.getElementById("image-sub").style.display = "none";
            //     }
            // }

            // function LoadListImage() {
            //     const mobileImageElement =
            //         document.getElementById("thumbnail");

            //     if (window.innerWidth >= 768) {
            //         mobileImageElement.style.display = "none";
            //         document.getElementById("image-sub").style.display = "block";
            //     } else {
            //         mobileImageElement.style.display = "block";
            //         document.getElementById("image-sub").style.display = "none";
            //     }
            // }
        });

        function changeImage(element) {
            var main_prodcut_image = document.getElementById("main_product_image");
            main_prodcut_image.src = element.src;
        }
        const figcaption = document.querySelector('.attachment__caption');
figcaption.style.display = 'none';
    </script>

@endsection

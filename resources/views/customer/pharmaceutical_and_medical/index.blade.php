@extends('customer.layouts.basic')

@section('styles')
    <link href="{{ asset('/customer/assets/css/pharmaceutical_and_medical.css') }}" rel="stylesheet" media="screen and (-webkit-min-device-pixel-ratio:0)" type="text/css" />
    <link href="{{ asset('customer/assets/css/medicine_index.css') }}" rel="stylesheet" media="screen and (-webkit-min-device-pixel-ratio:0)" type="text/css" />
    @endsection

@section('content')
    <main id="main">
        <!-- banner & content -->
        <section class="container">
            <div class="row">
                <img src="{{ asset('/customer/assets/img/SubPage_MainBanner.png') }}" />
            </div>
            <div class="baner-content">
                <p>
                    <b>
                        Nhằm mang lại lợi ích và quan tâm đến vấn đề sức khỏe của cộng
                        đồng, tìm ra giải pháp cho khách hàng và cung cấp dịch vụ y tế
                        chất lượng giúp hồi phục sức khỏe. Công ty Cổ phần dược và Dịch vụ
                        Y tế La'Hera mong muốn giải quyết mọi thắc mắc về y tế và giúp
                        khách hàng tiếp cận các dịch vụ khám chữa bệnh hiệu quả, tiên tiến
                        tại Việt Nam và các nước trên thế giới.</b>
                </p>
            </div>
        </section>
        <!-- end banner & content -->

        <!-- các dịch vụ y tế -->
        <section class="container" data-aos="fade-up">
            <div class="dich-vu-y-te">
                <h1>CÁC DỊCH VỤ Y TẾ</h1>
                <hr />
                <div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="dich-vu zoom-dich-vu">
                                <div class="dich-vu-icon col-3 col-sm-3">
                                    <img src="{{ asset('/customer/assets/img/DichVu_Yte-01.png') }}" alt="" />
                                </div>
                                <div class="dich-vu-content col-9 col-sm-9">
                                    <p>
                                        Giải pháp điều trị<br><span> rối loạn đường huyết </span><br>của Việt Y
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="dich-vu zoom-dich-vu">
                                <div class="dich-vu-icon col-3 col-sm-3">
                                    <img src="{{ asset('customer/assets/img/DichVu_Yte-02.png') }}" alt="" />
                                </div>
                                <div class="dich-vu-content col-9 col-sm-9">
                                    <p>
                                        Giải pháp điều trị <br><span> thừa cân </span><br>của Việt Y
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="dich-vu zoom-dich-vu">
                                <div class="dich-vu-icon col-3 col-sm-3">
                                    <img src="{{ asset('customer/assets/img/DichVu_Yte-03.png') }}" alt="" />
                                </div>
                                <div class="dich-vu-content col-9 col-sm-9">
                                    <p>
                                        Giải pháp phòng chống<span><br> nhiễm độc do rượu bia <br></span>của Việt Y
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="dich-vu zoom-dich-vu">
                                <div class="dich-vu-icon col-3 col-sm-3">
                                    <img src="{{ asset('customer/assets/img/DichVu_Yte-04.png') }}" alt="" />
                                </div>
                                <div class="dich-vu-content col-9 col-sm-9">
                                    <p>
                                        Dịch vụ <span><br> tầm soát ung thư & tư vấn chuyên sâu <br></span>Kết hợp Tây Y và
                                        Việt Y
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="dich-vu zoom-dich-vu">
                                <div class="dich-vu-icon col-3 col-sm-3">
                                    <img src="{{ asset('customer/assets/img/DichVu_Yte-05.png') }}" alt="" />
                                </div>
                                <div class="dich-vu-content col-9 col-sm-9">
                                    <p>
                                        Dịch vụ <span><br> Khám sức khỏe định kỳ <br></span>Kết hợp tầm
                                        soát ung thư và hậu Covid
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="dich-vu zoom-dich-vu">
                                <div class="dich-vu-icon col-3 col-sm-3">
                                    <img src="{{ asset('customer/assets/img/DichVu_Yte-06.png') }}" alt="" />
                                </div>
                                <div class="dich-vu-content col-9 col-sm-9">
                                    <p>Dịch vụ<span><br> Khám bệnh theo yêu cầu <br></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end các dịch vụ y tế -->

        <!-- các sản phẩm -->
        <div data-aos="fade-up" class="danh-sach-san-pham">
            <div class="container">
            <section class="ds-sanpham">
                <div class="danh-sach-san-pham-content">
                    <div class="danh-sach-san-pham-title-out duoc-sp">
                        <div class="danh-sach-san-pham-title">
                            <h1>DƯỢC</h1>
                            <h2>THỰC PHẨM BẢO VỆ SỨC KHỎE</h2>
                            <hr />
                        </div>
                    </div>
                    <div class="row row-cols-2 row-cols-md-3">
                        @foreach ($products as $product)
                        <div class="col">
                            <a href="{{ route('customer.pharmaceuticalandmedical.pharmaceutical_detail',['id'=>$product->id]) }}">
                                <div class="card duoc-text">
                                    <div class="zoom-sanpham">
                                        <img src="/storage/{{ $product->images[0] }}" alt="..." />
                                    </div>
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Card title</h5> -->
                                        <p class="card-text">
                                            {{$product->first_name}} <br />
                                            {{$product->last_name}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        {{-- <div class="col">
                            <a href="{{ route('customer.pharmaceuticalandmedical.pharmaceutical_detail') }}">
                                <div class="card duoc-text">
                                    <div class="zoom-sanpham">
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png') }}" alt="..." />
                                    </div>
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Card title</h5> -->
                                        <p class="card-text">
                                            Viên uống hỗ trợ <br />
                                            Giải Độc Gan - DTLv
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('customer.pharmaceuticalandmedical.pharmaceutical_detail') }}">
                                <div class="card duoc-text">
                                    <div class="zoom-sanpham">
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png') }}" alt="..." />
                                    </div>
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Card title</h5> -->
                                        <p class="card-text">
                                            Viên uống hỗ trợ <br />
                                            Bổ Phế - DTAs
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('customer.pharmaceuticalandmedical.pharmaceutical_detail') }}">
                                <div class="card duoc-text">
                                    <div class="zoom-sanpham">
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png') }}" alt="..." />
                                    </div>
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Card title</h5> -->
                                        <p class="card-text">
                                            Viên uống hỗ trợ <br />
                                            Nhuận Tràng - DTCl
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('customer.pharmaceuticalandmedical.pharmaceutical_detail') }}">
                                <div class="card duoc-text">
                                    <div class="zoom-sanpham">
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png') }}" alt="..." />
                                    </div>
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Card title</h5> -->
                                        <p class="card-text">
                                            Viên uống cải thiện <br />
                                            Viêm Loét Dạ Dày -DTSt
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('customer.pharmaceuticalandmedical.pharmaceutical_detail') }}">
                                <div class="card duoc-text">
                                    <div class="zoom-sanpham">
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png') }}" alt="..." />
                                    </div>
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Card title</h5> -->
                                        <p class="card-text">
                                            Viên uống hỗ trợ <br />
                                            Giảm Suy Nhược - BLSh
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('customer.pharmaceuticalandmedical.pharmaceutical_detail') }}">
                                <div class="card duoc-text">
                                    <div class="zoom-sanpham">
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png') }}" alt="..." />
                                    </div>
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Card title</h5> -->
                                        <p class="card-text">
                                            Dung dịch Sulfide <br />
                                            Kháng khuẩn, Siêu Vi
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('customer.pharmaceuticalandmedical.pharmaceutical_detail') }}">
                                <div class="card duoc-text">
                                    <div class="zoom-sanpham">
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png') }}" alt="..." />
                                    </div>
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Card title</h5> -->
                                        <p class="card-text">
                                            Dung dịch Xịt Mũi <br />
                                            Sulfide VX
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div> --}}
                    </div>
                    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </section>
        </div></div>
        <!-- end các sản phẩm -->
    </main>
@endsection

@section('scripts')
@endsection

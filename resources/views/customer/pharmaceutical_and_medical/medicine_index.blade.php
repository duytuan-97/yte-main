@extends('customer.layouts.basic')

@section('styles')
    <link href="{{ asset('customer/assets/css/pharmaceutical_and_medical.css') }}" rel="stylesheet" media="screen and (-webkit-min-device-pixel-ratio:0)" type="text/css" />
    <link href="{{ asset('customer/assets/css/medicine_index.css') }}" rel="stylesheet" media="screen and (-webkit-min-device-pixel-ratio:0)" type="text/css" />
@endsection

@section('content')
    <main id="main">
        <section class="container">
            <div id="row-container" class="row row-duoc">
                <div class="duoc-img"></div>
                <div class="duoc">
                    <div class="duoc-text">
                        <div class="box-duoc">
                            <div data-aos="fade-right" data-aos-easing="ease-in-back" data-aos-delay="300"
                                data-aos-offset="300" class="box-duoc-left"></div>
                            <p class="duoc-text-align">
                                Kế thừa tinh hoa y học cổ truyền phương Đông
                                đã được cụ Hải Thượng Lãn Ông chắt lọc và
                                tổng hợp, đồng thời ứng dụng những thành tựu
                                trong y học hiện đại Tây phương, phương pháp
                                khám chửa bệnh Việt Y bổ sung thêm những lý
                                luận nghiệm chứng để xây dựng hệ thống chuẩn
                                bệnh Tứ chuẩn, cùng với những bài thuốc,
                                dược liệu kết hợp giữa thực nghiệm qua hơn
                                bốn ngàn năm của y học cổ truyền và nghiên
                                cứu hơn bốn trăm năm của học hiện đại nhằm
                                giải quyết những nan đề của y học cổ truyền,
                                những khoảng trống của y học hiện đại mà
                                thường được gọi tên là nam chứng, bệnh mãn
                                tính.
                            </p>
                            <div data-aos="fade-left" data-aos-easing="ease-in-back" data-aos-delay="300"
                                data-aos-offset="300" class="box-duoc-right"></div>
                        </div>
                    </div>

                    <div data-aos="fade-up" class="duoc-sanpham">
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
                            <a href="{{ route('customer.pharmaceuticalandmedical.pharmaceutical_detail',['id'=>$product->id])}}">
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
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png')}}" alt="..." />
                                    </div>
                                    <div class="card-body card-duoc">
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
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png')}}" alt="..." />
                                    </div>
                                    <div class="card-body card-duoc">
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
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png')}}" alt="..." />
                                    </div>
                                    <div class="card-body card-duoc">
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
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png')}}" alt="..." />
                                    </div>
                                    <div class="card-body card-duoc">
                                        <p class="card-text">
                                            Viên uống cải thiện <br />
                                            Viêm Loét Dạ Dày -DTSt
                                        </p>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col">
                                <div class="card duoc-text">
                                    <div class="zoom-sanpham">
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png')}}" alt="..." />
                                    </div>
                                    <div class="card-body card-duoc">
                                        <p class="card-text">
                                            Viên uống hỗ trợ <br />
                                            Giảm Suy Nhược - BLSh
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <a href="{{ route('customer.pharmaceuticalandmedical.pharmaceutical_detail') }}">
                                <div class="card duoc-text">
                                    <div class="zoom-sanpham">
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png')}}" alt="..." />
                                    </div>
                                    <div class="card-body card-duoc">
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
                                        <img src="{{ asset('customer/assets/img/Duoc_BLSh.png')}}" alt="..." />
                                    </div>
                                    <div class="card-body card-duoc">
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
                    <div class="duoc-footer"></div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        window.addEventListener("load", function() {
            adjustRowHeight();

            window.addEventListener("resize", adjustRowHeight);

            function adjustRowHeight() {
                const rowContainer =
                    document.getElementById("row-container");
                const duoc = rowContainer.querySelector(".duoc");

                if (duoc) {
                    const duocHeight = duoc.clientHeight;
                    rowContainer.style.minHeight = `${duocHeight}px`;
                }
            }
        });
    </script>
@endsection

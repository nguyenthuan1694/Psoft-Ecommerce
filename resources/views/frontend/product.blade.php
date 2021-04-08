@extends('frontend.layouts.app')

@section('content')
    {{ Breadcrumbs::render('product', $product) }}
    <link rel="stylesheet" href="{{ asset('frontend/css/product.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <section>
        <div class="container section--default">
            <div class="bg-qc row mb-3">
                <div class="col-md-6"><img style="border-radius: 6px" src="{{ asset('frontend/images/background/bg-qc-1.png') }}" alt=""></div>
                <div class="col-md-6"><img style="border-radius: 6px" src="{{ asset('frontend/images/background/bg-qc-2.png') }}" alt=""></div>
            </div>
            <div>
                <span style="font-size: 24px">{{ $product->name }}</span>
                <span class="product attribute sku" style="font-size: 13px;color: #808080">( No: {{ $product->sku }})
            </span>
            </div>
            
            <div class="product--date__content">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                </svg>
                <span class="product--date__text">{{ date('d/m/Y', strtotime($product->created_at)) }}</span>
                <span class="" style="font-size: 13px;position: absolute; left: 100px; color: #808080">{{ $commentsTotal }} Hỏi đáp &amp; tư vấn</span>
                <span class="rating" style="font-size: 13px;position: absolute; left: 230px; color: #808080">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i id="five" class="fa fa-star"></i>
                    <small style="color: #333;" class="font-weight-bold">(4.5/5)</small>
                </span>
                
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-xs-12">
                    <div class="wrap-image-pro">
                        @foreach($product->images as $images)
                            <img src="{{ asset($images->url) }}" alt="">
                        @endforeach
                    </div>
                    <div class="thumnail">
                        @foreach($product->images as $images)
                            <img src="{{ asset($images->url) }}" alt="">
                        @endforeach
                    </div>
                    <div class="mt-4" style="font-size: 13.5px; line-height: 1.5;text-align: justify">
                        {!! $product->short_description !!}
                    </div>
                </div>
                <div class="col-lg-5 col-sm-5 col-xs-12">
                    <div class="wrap-price-detail">
                        <span class="price mr-2">{{ number_format($product->price, 0) }} đ</span>
                        <del class="mr-2">{{ number_format($product->cost, 0) }} đ</del>
                        <span class="btn btn-km">Giảm {{ number_format(($product->price) - ($product->cost)) }} đ</span>
                    </div>
                    <div>
                        <div style="margin: 0 0 15px">
                            <span class="font-weight-bold" style="font-size: 13px">Hãy lựa chọn theo sở thích cá nhân và xem giá bán.</span>
                        </div>
                        <!-- aaaa -->
                        <div class="product-options-wrapper">
                            <div class="field configurable required">
                                <div class="control-option">
                                    <label data-id="10827" data-sku="26150670" data-title="Graphite" class="opt_attr active" data-price="26.790.000&nbsp;₫" data-marketprice="30.990.000&nbsp;₫" data-discount="13" for="opt_attr_211">
                                        <input id="opt_attr_211" type="radio" value="211" name="super_attribute[93]">
                                        <span class="name"><i class="tick"></i>Graphite</span>
                                        <span class="price">26.790.000&nbsp;₫</span>
                                    </label>
                                    <label data-id="10826" data-sku="26150669" data-title="Silver" class="opt_attr" data-price="26.990.000&nbsp;₫" data-marketprice="30.990.000&nbsp;₫" data-discount="12" for="opt_attr_210">
                                        <input id="opt_attr_210" type="radio" value="210" name="super_attribute[93]">
                                        <span class="name"><i class="tick"></i>Silver</span>
                                        <span class="price">26.990.000&nbsp;₫</span>
                                    </label>
                                    <label data-id="10828" data-sku="26150667" data-title="Pacific Blue" class="opt_attr" data-price="26.990.000&nbsp;₫" data-marketprice="30.990.000&nbsp;₫" data-discount="12" for="opt_attr_212">
                                        <input id="opt_attr_212" type="radio" value="212" name="super_attribute[93]">
                                        <span class="name"><i class="tick"></i>Pacific Blue</span>
                                        <span class="price">26.990.000&nbsp;₫</span>
                                    </label>
                                    <label data-id="10829" data-sku="26150668" data-title="Gold" class="opt_attr" data-price="27.190.000&nbsp;₫" data-marketprice="30.990.000&nbsp;₫" data-discount="12" for="opt_attr_213">
                                        <input id="opt_attr_213" type="radio" value="213" name="super_attribute[93]">
                                        <span class="name"><i class="tick"></i>Gold</span>
                                        <span class="price">27.190.000&nbsp;₫</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="" style="border: 1px solid #eee; padding: 15px 15px 0; clear: both;border-radius: 5px;">
                            <div style="margin-bottom: 15px; font-size:14px; color: #FFF">    
                                <span class="text-uppercase" style="color: #FFF;background-color: #c1272d; border-radius: 10px; padding: 5px 15px;">
                                    khuyến mãi, ưu đãi
                                </span>
                                <div class="mt-3">
                                    <ul style="color: #333333">
                                        <li> <i class="fa fa-hand-o-right"></i> Hỗ trợ kích hoạt eSIM miễn phí <a style="color: #0071bb; text-decoration: none;" href="#">(Xem chi tiết)</a></li>
                                        <li> <i class="fa fa-hand-o-right"></i> Trade-in thu cũ lên đời tiết kiệm đến <strong style="color: #ff0000">19,8 triệu</strong> <a style="color: #0071bb; text-decoration: none;" href="#">(Xem chi tiết)</a></li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="mt-3">
                                    <span style="margin: 0 0 15px; color: #c83837; font-size: 14px; font-weight: normal;">Có <strong>4 ưu đãi nổi bật</strong> mua kèm máy</span>
                                    <ul class="mt-2" style="color: #333333">
                                        <li class="mt-2"> <i class="fa fa-hand-o-right"></i> Mua <a style="color: #0071bb; text-decoration: none;" href="#"> đế sạc không dây Apple MagSafe</a> giá chỉ <strong style="color: #ff0000">1.490.000đ</strong> (giá gốc 1.650.000đ) </li>
                                        <li class="mt-2"> <i class="fa fa-hand-o-right"></i> <a style="color: #0071bb; text-decoration: none;" href="#">Combo phụ kiện iPhone 12 Series thời trang</a> giá chỉ <strong style="color: #ff0000">890.000đ</strong> (giá gốc 1.240.000đ) </li>
                                        <li class="mt-2"> <i class="fa fa-hand-o-right"></i> <a style="color: #0071bb; text-decoration: none;" href="#">Combo phụ kiện iPhone 12 Series thương hiệu</a> giá chỉ <strong style="color: #ff0000">1.050.000đ</strong> (giá gốc 1.470.000đ) </li>
                                        <li class="mt-2"> <i class="fa fa-hand-o-right"></i> <a style="color: #0071bb; text-decoration: none;" href="#">Combo phụ kiện iPhone 12 Series chính hãng</a> giá chỉ <strong style="color: #ff0000">990.000đ</strong> (giá gốc 1.120.000đ)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3" style="background-color: #10b0a7; margin-bottom: 15px; color: #FFF; border-radius: 6px;padding: 7px;">
                            <a style="color: #fff;text-decoration: none; font-size: 14px;" href="#" target="_blank">
                                <i class="fa fa-angle-double-right"></i>
                                Giảm thêm 1.5% giá trị hoá đơn dành cho thành viên PSoft
                            </a>
                        </div>
                        <div class="box-tocart">
                            <input type="hidden" name="qty" value="1">  
                            <div class="fieldset">
                                <div class="actions">
                                    <form action="{{ route('cart.index') }}" method="get" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input hidden class="form-control" type="text" id="product_id" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="action primary tocart  btn-go-cart" id="product-addtocart-button">
                                            <span>Mua ngay</span>
                                            <small>Giao tận nơi cho quý khách hàng hoặc nhận hàng tại shop.</small> 
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- aa -->

                    <!-- <p>Tình trạng: Còn hàng</p>
                    <button class="btn-default-solid" onclick="addToCart({{$product->id}}, {{$product->qty}})">Chọn mua</button>
                    <div class="wrap-group-number">
                        <button class="btn-plus"><i class="ti-plus"></i></button>
                        <button class="btn-minus"><i class="ti-minus"></i></button>
                        <input type="text" disabled value="0">
                    </div>
                    <p> Nhà sản xuất: {{ $product->manufacturer }}</p> -->
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-12" style="border: 1px solid #eeeeee;border-radius: 5px; padding: 10px">
                    <div class="row">
                        <div class="col-md-2"><i style="font-size: 40px; color: #c2292e" class="fa fa-gift"></i></div>
                        <div class="col-md-10">
                            <span style="font-size: 13px">
                                Bộ sản phẩm: Thân máy, Hộp, Cáp, Cây lấy sim, Sách hướng dẫn 
                                (Tất cả lô máy từ tháng 10/2020, Apple cắt bỏ tai nghe, củ sạc khỏi bộ sản phẩm bán kèm)
                            </span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2"><i style="font-size: 40px; color: #c2292e" class="fa fa-shield"></i></div>
                        <div class="col-md-10">
                            <span style="font-size: 13px">
                                Giá đã bao gồm 10% VAT. Bảo hành 12 tháng Toàn cầu. Bảo hành 1 đổi 1 theo chính sách của Apple Việt Nam (Xem chi tiết)
                            </span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2"><i style="font-size: 40px; color: #c2292e" class="fa fa-usd"></i></div>
                        <div class="col-md-10">
                            <span style="font-size: 13px">
                               <div>
                                Trả góp 0% qua thẻ tín dụng (Không trả trước, trả hàng tháng chỉ 4.465.000 ₫) hoặc qua 
                                Paylater
                               </div>
                            <div style="font-size: 13px" class="mt-2">
                                <p style="background-color: rgba(193, 39, 45, 0.3); padding: 5px; border-radius: 6px">
                                Trả trước <strong style="color: #c2292e"> 8.037.000 ₫</strong>, trả hàng tháng chỉ <strong style="color: #c2292e">6.251.000 ₫</strong></p>
                            </div>
                            <div>
                                Hoặc Trả góp có lãi suất với trả trước <strong style="color: #c2292e">2.679.000 ₫</strong>, trả hàng tháng 
                                <strong style="color: #c2292e">4.054.667 ₫</strong> qua nhà tài chính <strong>Home Credit, FE Credit, HD Saison</strong>  (chỉ cần CMND + GPLX)
                                Hoặc trả góp - trả trước 0đ qua nhà tài chính FE Credit (Thủ tục chỉ cần CMND + Hộ khẩu )
                            </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="container section--default short-description">
            <div class="short-description__card">
                <h5 class="text-uppercase">Giới thiệu</h5>
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        {!! $product->short_description !!}
                    </div>
                </div>
            </div>
           
        </div> -->
       
        <div class="container section--default long_description">
        <hr>
            <div class="row">
                <div class="col-md-8">
                    @if($product->long_description)
                    <div class="long-description__card">
                        <h5 class="text-uppercase">Thông tin chung</h5>
                        <hr>
                        {!! $product->long_description !!}
                    </div>
                    @endif
                    <!-- comment -->
                    <div class="w-100">
                        <span class="cmt-title">{{ $commentsTotal }} Hỏi đáp &amp; tư vấn</span>
                        <form class="needs-validation" novalidate action="{{ route('home.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="slug" value="{{ $product->slug }}">
                            <div class="form-group tinymce-wrap mt-3">
                                <textarea placeholder="Hãy đặt câu hỏi, chúng tôi sẽ tư vấn giúp bạn..." name="description" class="tinymce" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <input style="font-size: 13px" required placeholder="Họ tên (bắt buộc)" id="name" name="name" type="text" class="form-control" value="{{ old('name') }}">
                                    <div class="valid-feedback">Tên hợp lệ !</div>
                                    <div class="invalid-feedback">Vui lòng nhập tên !</div>
                            </div>
                            <div class="form-group">
                                <input style="font-size: 13px" required placeholder="Số điện thoại (bắt buộc)" id="phone" name="phone" type="text" class="form-control" value="{{ old('phone') }}">
                                <div class="valid-feedback">Số điện thoại hợp lệ !</div>
                                <div class="invalid-feedback">Vui lòng nhập Số điện thoại !</div>
                            </div>
                            <button class="btn btn-km" type="submit">Gửi phản hồi</button>
                        </form>
                    </div>
                    @foreach($comments as $comment)
                    @if(empty($comment->parent_id))
                    <div class=" text0 mb-3" id="i-comment-{{$comment->id}}">
                        <div class="input-group w-auto flex-nowrap  comment-box-style mt-4 pt-3 px-3 pb-1">
                            <div class="input-group-prepend mr-2">
                                <img src="{{ asset('frontend/images/avatars/default.png') }}" class="img-fluid avatar-img mr-2" alt="Responsive image">
                            </div>
                            <div class="w-100">
                                <div class="text-capitalize mb-1 font-weight-bold">
                                    {{ $comment->name }}
                                    <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i id="five" class="fa fa-star"></i>
                                    </span>
                                </div>
                                <input type="hidden" name="cmt_name" value="{{ $comment->name }}">
                                <input type="hidden" name="cmt_phone" value="{{ $comment->phone }}">
                                <div class="comment-content font-light">
                                    {!! $comment->description !!}
                                </div>
                                <div class="text08 mt-1">
                                    <i><span class="color-gray">
                                    Đã đăng {{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                                    </i> 
                                    <a class="ml-2 color-gray product-comment" onclick="addCommentBox({{ $comment->id }},{{ $comment->phone }})"><b style="color: #1979c3">Trả lời</b></a>
                                </div>
                            </div>
                        </div>
                        {{-- Show subcomments --}}
                        @if(count($comment->subComments) > 0)
                            @foreach($comment->subComments as $sub)
                                @if($sub->admin == 1)
                                <div class="input-group w-auto flex-nowrap comment-box-sub ml-4 ml-md-5 mt-3 pt-3 px-3 pb-1">
                                    <div class="input-group-prepend mr-2">
                                        <img src="{{ asset('frontend/images/avatars/default.png') }}" class="img-fluid avatar-img mr-2" alt="Responsive image">
                                    </div>
                                    <div class="w-100">
                                        <div class="text-capitalize mb-1 font-weight-bold">
                                            <i class="color-pink">{{$sub->name}}</i>
                                        </div>
                                        <div class="comment-content font-light"> {!! $sub->description !!}</div>
                                        <div class="text08 mt-1 ">
                                        <i><span class="color-gray">{{Carbon\Carbon::parse($sub->created_at)->diffForHumans()}}</span></i> 
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($sub->admin == 0)
                                <div class="input-group w-auto flex-nowrap comment-box-style ml-4 ml-md-5 mt-3 pt-3 px-3 pb-1">
                                    <div class="input-group-prepend mr-2">
                                        <img src="{{ asset('frontend/images/avatars/default.png') }}" class="img-fluid avatar-img mr-2" alt="Responsive image">
                                    </div>
                                    <div class="w-100">
                                        <div class="text-capitalize mb-1 font-weight-bold">
                                            {{$sub->name}}
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i id="five" class="fa fa-star"></i>
                                            </span>
                                        </div>
                                        <div class="comment-content font-light">{{$sub->description}}</div>
                                        <div class="text08 mt-1 ">
                                        <i><span class="color-gray">{{Carbon\Carbon::parse($sub->created_at)->diffForHumans()}}</span></i> 
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    @endif 
                    @endforeach
                    <!-- end comment -->
                </div>
                <div class="col-md-4 ">
                    <div class="text-center">
                        <span class="font-weight-bold" style="font-size: 20px;margin: 0 0 15px; padding-bottom: 15px;">Cấu hình | Thông số</span>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="font-weight-bold" style="font-size: 14px">Màn Hình</span>
                        </div>
                        <div class="col-md-8">
                            <ul style="font-size: 14px">
                                <li class="mt-2">Công nghệ màn hình: Super Retina XDR OLED</li>
                                <li class="mt-2">Độ phân giải: 1170 x 2532 pixels</li>
                                <li class="mt-2">Màn hình rộng: 6.1 inches</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="font-weight-bold" style="font-size: 14px">Camera sau</span>
                        </div>
                        <div class="col-md-8">
                            <ul style="font-size: 14px">
                                <li class="mt-2">Độ phân giải: 12 MP + 12 MP + 12 MP + TOF</li>
                                <li class="mt-2">Quay phim: 4K@24/30/60fps, 1080p@30/60/120/240fps, HDR, Dolby Vision HDR (up to 60fps)</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="font-weight-bold" style="font-size: 14px">Camera sau</span>
                        </div>
                        <div class="col-md-8">
                            <ul style="font-size: 14px">
                                <li class="mt-2">Độ phân giải: 12 MP + 12 MP + 12 MP + TOF</li>
                                <li class="mt-2">Quay phim: 4K@24/30/60fps, 1080p@30/60/120/240fps, HDR, Dolby Vision HDR (up to 60fps)</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="font-weight-bold" style="font-size: 14px">Camera trước</span>
                        </div>
                        <div class="col-md-8">
                            <ul style="font-size: 14px">
                                <li class="mt-2">Độ phân giải: 12 MP</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="font-weight-bold" style="font-size: 14px">Hệ điều hành - CPU</span>
                        </div>
                        <div class="col-md-8">
                            <ul style="font-size: 14px">
                                <li class="mt-2">Hệ điều hành: iOS 14</li>
                                <li class="mt-2">Chipset (hãng SX CPU): Apple A14 Bionic (5 nm)</li>
                                <li class="mt-2">Tốc độ CPU: Hexa-core</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="font-weight-bold" style="font-size: 14px">Bộ nhớ - Lưu trữ</span>
                        </div>
                        <div class="col-md-8">
                            <ul style="font-size: 14px">
                                <li class="mt-2">Bộ nhớ trong: 128 GB</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="font-weight-bold" style="font-size: 14px">Kết nối</span>
                        </div>
                        <div class="col-md-8">
                            <ul style="font-size: 14px">
                                <li class="mt-2">Mạng di động: Hỗ trợ 5G</li>
                                <li class="mt-2">Wifi: Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, hotspot</li>
                                <li class="mt-2">Bluetooth: 5.0, A2DP, LE</li>
                                <li class="mt-2">Cổng kết nối/sạc: Lightning, USB 2.0</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="font-weight-bold" style="font-size: 14px">Thông tin pin - Sạc</span>
                        </div>
                        <div class="col-md-8">
                            <ul style="font-size: 14px">
                                <li class="mt-2">Thông tin pin - Sạc Dung lượng pin: 2815 mAh</li>
                                <li class="mt-2">Loại pin: Li-Ion</li>
                                <li class="mt-2">Công nghệ pin: Sạc nhanh 20W</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container section--default long_description">
           <div class="product--same__card">
                <h5 class="text-uppercase">Sản phẩm tương tự</h5>
                <hr>
                <div class="row">
                    @foreach($products->take(4) as $product)
                        <div class="col-md-3 col-sm-4 mt-4">
                            <div class="wsk-cp-product" data-animate-in="up">
                                <a  href="{{ route('product', ['slug' => $product->slug]) }}">
                                    <div class="product--same__img">
                                        <img src="{{ asset($product->thumbnail) }}" alt="Img" class="img-responsive" />
                                    </div>
                                </a>
                                <div class="product--same__text">
                                    <div class="title-product mb-3 ">
                                        <span><a class="product-grid__title" href="{{ route('product', ['slug' => $product->slug]) }}">{{ $product->name }}</a></span>
                                    </div>
                                    <div class="product--same__description">
                                        <p class="product-grid__location"><strong>Vị trí:</strong> {{ $product->location }}</p>
                                        <p class="product-grid__total-area"><strong>Tổng diện tích:</strong> {{ $product->total_area }}</p>
                                        <p class="product-grid__type"><strong>Loại hình: </strong> {{ $product->type }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
           </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('backend/dist/js/validation-data.js') }}"></script>
    <script type="text/javascript">

        // $('.btn-plus').click(function () {
        //     console.log('ss')
        //     if ($('#qty').val() < 4 ) {
        //         $('#qty').val(parseInt($('#qty').val()) + 1);
        //     }
        // });

        // $('.btn-minus').click(function () {
        //     if ($('#qty').val() > 0) {
        //         $('#qty').val(parseInt($('#qty').val()) - 1);
        //     }
        // });

        var clickCount = 0;
        function showImage(obj)
        {
            if(!clickCount){clickCount++;return ;}
             var imageObj =  (list_images);
             var iThumb=[];
             let img;
            objId=jQuery(obj).data('id');
           
            for(xin in imageObj['images'][objId])
            {
                iThumb.push(imageObj['images'][objId][xin]['img']);
            } 

            if(iThumb.length)
            {
                for(x in iThumb)
                {
                    

                   jQuery(".nav-gallery-right img").attr("src",iThumb.pop());
                    break;
                }
            }
        }
        // 
        function addCommentBox(id, phone) {
        // Check if comment box is already exist
        var targetDiv = document.getElementById('i-comment-' + id).getElementsByClassName("comment-temp")[0];

        if(targetDiv != undefined) {
        return;
        }

        // Check if comment is already exist at other comments
        targetDiv = document.getElementsByClassName('comment-temp')[0];
        if(targetDiv != undefined) {
        targetDiv.remove();
        }

        // HTML comment box 
        var newNotificationHtml = `
            <div class="input-group w-auto flex-nowrap ml-4 ml-md-5 mt-4 comment-temp">
                <div class="input-group-prepend mr-2">
                <img src="{{ asset('frontend/images/avatars/default.png') }}" class="img-fluid avatar-img mr-2" alt="Responsive image">
                </div>
                <div class="w-100">
                    <div class="form-group tinymce-wrap mt-3">
                        <textarea id="i-comment-temp" placeholder="Hãy đặt câu hỏi, chúng tôi sẽ tư vấn giúp bạn..." name="description_sub" class="tinymce" rows="3"></textarea>
                    </div>
                </div>           
            </div>
            <div class="text-right mt-2 mb-4">
                    <a href="#" class="text09 btn btn-km bg-color-white color-pink" onclick="saveComment(`+id+`,`+phone+`)" >Gửi phản hồi</a>
            </div>
            `;

        // Add
        $('#i-comment-' + id).append(newNotificationHtml);
        document.getElementById('i-comment-temp').focus();
        
    }
    </script>
    <script src="{{ asset('frontend/js/product.js') }}"></script>
@endsection

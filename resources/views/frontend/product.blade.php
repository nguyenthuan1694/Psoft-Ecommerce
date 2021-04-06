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
                </div>
                <div class="col-lg-5 col-sm-5 col-xs-12">
                    <p class="wrap-price-detail">
                        <span class="price">{{ number_format($product->price, 0) }} đ</span>
                        <del>{{ number_format($product->cost, 0) }} đ</del>
                        <span class="btn btn-km">Giảm {{ number_format(($product->price) - ($product->cost)) }} đ</span>
                    </p>
                    <div class="">
                        <p class="font-weight-bold" style="font-size: 13px">Hãy lựa chọn theo sở thích cá nhân và xem giá bán.</p>
                    </div>
                    <!-- aaaa -->
                    <div class="product-options-wrapper" id="product-options-wrapper" data-hasrequired="* Required Fields">
    <div class="fieldset" tabindex="0">
        
            

        
       
        <div class="field configurable required">
            <div class="  control-option">
                                    <label data-id="10827" data-sku="26150670" onclick="showImage(this);newloadNhanhProduct(this,26150670,10704);" ;="" data-title="Graphite" class="opt_attr active" data-price="26.790.000&nbsp;₫" data-marketprice="30.990.000&nbsp;₫" data-discount="13" for="opt_attr_211">
                        <input id="opt_attr_211" type="radio" value="211" name="super_attribute[93]">
                            <span class="name"><i class="tick"></i>Graphite</span>
                            <span class="price">26.790.000&nbsp;₫</span>
                           
                       <!-- <i class="fa fa-check"></i>-->
                    </label>
                   
                                     <label data-id="10826" data-sku="26150669" onclick="showImage(this);newloadNhanhProduct(this,26150669,10704);" ;="" data-title="Silver" class="opt_attr" data-price="26.990.000&nbsp;₫" data-marketprice="30.990.000&nbsp;₫" data-discount="12" for="opt_attr_210">
                        <input id="opt_attr_210" type="radio" value="210" name="super_attribute[93]">
                            <span class="name"><i class="tick"></i>Silver</span>
                            <span class="price">26.990.000&nbsp;₫</span>
                           
                       <!-- <i class="fa fa-check"></i>-->
                    </label>
                   
                                     <label data-id="10828" data-sku="26150667" onclick="showImage(this);newloadNhanhProduct(this,26150667,10704);" ;="" data-title="Pacific Blue" class="opt_attr" data-price="26.990.000&nbsp;₫" data-marketprice="30.990.000&nbsp;₫" data-discount="12" for="opt_attr_212">
                        <input id="opt_attr_212" type="radio" value="212" name="super_attribute[93]">
                            <span class="name"><i class="tick"></i>Pacific Blue</span>
                            <span class="price">26.990.000&nbsp;₫</span>
                           
                       <!-- <i class="fa fa-check"></i>-->
                    </label>
                   
                                     <label data-id="10829" data-sku="26150668" onclick="showImage(this);newloadNhanhProduct(this,26150668,10704);" ;="" data-title="Gold" class="opt_attr" data-price="27.190.000&nbsp;₫" data-marketprice="30.990.000&nbsp;₫" data-discount="12" for="opt_attr_213">
                        <input id="opt_attr_213" type="radio" value="213" name="super_attribute[93]">
                            <span class="name"><i class="tick"></i>Gold</span>
                            <span class="price">27.190.000&nbsp;₫</span>
                           
                       <!-- <i class="fa fa-check"></i>-->
                    </label>
                   
                    
               <!-- <select name="super_attribute[93]"
                        data-selector="super_attribute[93]"
                        data-validate="{required:true}"
                        id="attribute93"
                        class="super-attribute-select">
                    <option value="">Choose an Option...</option>
                </select>-->
            </div>
        </div>
    
    
   <script>
        var clickCount=0;
        var list_images= {"attributes":{"93":{"id":"93","code":"color","label":"M\u00e0u","options":[{"id":"210","label":"Silver","products":["10826"],"product_id":"10826","price":"26990000.0000","market_price":"30990000.0000","discount":12,"thumbnail":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/i\/p\/iphone-12-pro-trang_1_1.jpg","id_nhanh":"26150669","sku":"26150669"},{"id":"211","label":"Graphite","products":["10827"],"product_id":"10827","price":"26790000.0000","market_price":"30990000.0000","discount":13,"thumbnail":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/i\/p\/iphone-12-pro-den_1_1.jpg","id_nhanh":"26150670","sku":"26150670"},{"id":"212","label":"Pacific Blue","products":["10828"],"product_id":"10828","price":"26990000.0000","market_price":"30990000.0000","discount":12,"thumbnail":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/i\/p\/iphone-12-pro-xanh_2_1.jpg","id_nhanh":"26150667","sku":"26150667"},{"id":"213","label":"Gold","products":["10829"],"product_id":"10829","price":"27190000.0000","market_price":"30990000.0000","discount":12,"thumbnail":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/i\/p\/iphone-12-pro-vang_3.jpg","id_nhanh":"26150668","sku":"26150668"}],"position":"0"}},"template":"<%- data.price %>\u00a0\u20ab","currencyFormat":"%s\u00a0\u20ab","optionPrices":{"10826":{"oldPrice":{"amount":26990000},"basePrice":{"amount":26990000},"finalPrice":{"amount":26990000},"tierPrices":[]},"10827":{"oldPrice":{"amount":26790000},"basePrice":{"amount":26790000},"finalPrice":{"amount":26790000},"tierPrices":[]},"10828":{"oldPrice":{"amount":26990000},"basePrice":{"amount":26990000},"finalPrice":{"amount":26990000},"tierPrices":[]},"10829":{"oldPrice":{"amount":27190000},"basePrice":{"amount":27190000},"finalPrice":{"amount":27190000},"tierPrices":[]}},"priceFormat":{"pattern":"%s\u00a0\u20ab","precision":0,"requiredPrecision":0,"decimalSymbol":",","groupSymbol":".","groupLength":3,"integerRequired":-4},"prices":{"oldPrice":{"amount":26790000},"basePrice":{"amount":26790000},"finalPrice":{"amount":26790000}},"productId":"10704","chooseText":"Choose an Option...","images":{"10826":[{"thumb":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/cache\/f9c7fbe9b524c081a3ccf800cbd963eb\/i\/p\/iphone-12-pro-trang_1_1.jpg","img":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/cache\/c687aa7517cf01e65c009f6943c2b1e9\/i\/p\/iphone-12-pro-trang_1_1.jpg","full":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/cache\/926507dc7f93631a094422215b778fe0\/i\/p\/iphone-12-pro-trang_1_1.jpg","caption":null,"position":"1","isMain":true,"type":"image","videoUrl":null}],"10827":[{"thumb":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/cache\/f9c7fbe9b524c081a3ccf800cbd963eb\/i\/p\/iphone-12-pro-den_1_1.jpg","img":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/cache\/c687aa7517cf01e65c009f6943c2b1e9\/i\/p\/iphone-12-pro-den_1_1.jpg","full":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/cache\/926507dc7f93631a094422215b778fe0\/i\/p\/iphone-12-pro-den_1_1.jpg","caption":null,"position":"1","isMain":true,"type":"image","videoUrl":null}],"10828":[{"thumb":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/cache\/f9c7fbe9b524c081a3ccf800cbd963eb\/i\/p\/iphone-12-pro-xanh_2_1.jpg","img":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/cache\/c687aa7517cf01e65c009f6943c2b1e9\/i\/p\/iphone-12-pro-xanh_2_1.jpg","full":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/cache\/926507dc7f93631a094422215b778fe0\/i\/p\/iphone-12-pro-xanh_2_1.jpg","caption":null,"position":"1","isMain":true,"type":"image","videoUrl":null}],"10829":[{"thumb":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/cache\/f9c7fbe9b524c081a3ccf800cbd963eb\/i\/p\/iphone-12-pro-vang_3.jpg","img":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/cache\/c687aa7517cf01e65c009f6943c2b1e9\/i\/p\/iphone-12-pro-vang_3.jpg","full":"https:\/\/didongviet.vn\/pub\/media\/catalog\/product\/cache\/926507dc7f93631a094422215b778fe0\/i\/p\/iphone-12-pro-vang_3.jpg","caption":null,"position":"1","isMain":true,"type":"image","videoUrl":null}]},"index":{"10826":{"93":"210"},"10827":{"93":"211"},"10828":{"93":"212"},"10829":{"93":"213"}},"skus":[]};
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
    </script> 
 
<style type="text/css">

 
  @media screen and (min-width: 1024px)
  {
    .page-product-configurable .product-options-wrapper label.label_supper_attr{display: none !important; }
  }
</style>
<script>
require([
    "jquery",
    "jquery/ui"
], function($){

//<![CDATA[
    $.extend(true, $, {
        calendarConfig: {
            dayNames: ["Ch\u1ee7 Nh\u1eadt","Th\u1ee9 Hai","Th\u1ee9 Ba","Th\u1ee9 T\u01b0","Th\u1ee9 N\u0103m","Th\u1ee9 S\u00e1u","Th\u1ee9 B\u1ea3y"],
            dayNamesMin: ["CN","Th 2","Th 3","Th 4","Th 5","Th 6","Th 7"],
            monthNames: ["th\u00e1ng 1","th\u00e1ng 2","th\u00e1ng 3","th\u00e1ng 4","th\u00e1ng 5","th\u00e1ng 6","th\u00e1ng 7","th\u00e1ng 8","th\u00e1ng 9","th\u00e1ng 10","th\u00e1ng 11","th\u00e1ng 12"],
            monthNamesShort: ["thg 1","thg 2","thg 3","thg 4","thg 5","thg 6","thg 7","thg 8","thg 9","thg 10","thg 11","thg 12"],
            infoTitle: "About the calendar",
            firstDay: 0,
            closeText: "Close",
            currentText: "Go Today",
            prevText: "Previous",
            nextText: "Next",
            weekHeader: "WK",
            timeText: "Time",
            hourText: "Hour",
            minuteText: "Minute",
            dateFormat: $.datepicker.RFC_2822,
            showOn: "button",
            showAnim: "",
            changeMonth: true,
            changeYear: true,
            buttonImageOnly: null,
            buttonImage: null,
            showButtonPanel: true,
            showWeek: true,
            timeFormat: '',
            showTime: false,
            showHour: false,
            showMinute: false
        }
    });

    enUS = {"m":{"wide":["January","February","March","April","May","June","July","August","September","October","November","December"],"abbr":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]}}; // en_US locale reference
//]]>

});
</script>

    </div>
</div>
                    <!-- aa -->
                    <!-- <p>Tình trạng: Còn hàng</p>
                    <div class="mb-10">
                        <button class="btn-default-solid">Chọn mua</button>
                        <div class="wrap-group-number">
                            <button class="btn-plus"><i class="ti-plus"></i></button>
                            <button class="btn-minus"><i class="ti-minus"></i></button>
                            <input id="qty" type="text" disabled="" value="1">
                        </div>
                    </div>
                    <p> Nhà sản xuất: {{ $product->manufacturer }}</p> -->
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-12" style="border: 1px solid #eeeeee;border-radius: 5px; padding: 10px">
                    <div class="row">
                        <div class="col-md-2"><i style="font-size: 40px; color: #c2292e" class="fa fa-gift"></i></div>
                        <div class="col-md-10">
                            <span style="font-size: 13px">Bộ sản phẩm: Thân máy, Hộp, Cáp, Cây lấy sim, Sách hướng dẫn 
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
                                Trả góp 0% qua thẻ tín dụng (Không trả trước, trả hàng tháng chỉ 4.465.000 ₫) hoặc qua 
                                Paylater
                            <div style="font-size: 13px">
                                <p style="background-color: rgba(193, 39, 45, 0.3); padding: 5px; border-radius: 6px">
                                Trả trước <strong style="color: #c2292e"> 8.037.000 ₫</strong>, trả hàng tháng chỉ <strong style="color: #c2292e">6.251.000 ₫</strong></p>
                            </div>
                                Hoặc Trả góp có lãi suất với trả trước <strong style="color: #c2292e">2.679.000 ₫</strong>, trả hàng tháng 
                                <strong style="color: #c2292e">4.054.667 ₫</strong> qua nhà tài chính <strong>Home Credit, FE Credit, HD Saison</strong>  (chỉ cần CMND + GPLX)
                                Hoặc trả góp - trả trước 0đ qua nhà tài chính FE Credit (Thủ tục chỉ cần CMND + Hộ khẩu )
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container section--default short-description">
            <div class="short-description__card">
                <h5 class="text-uppercase">Giới thiệu</h5>
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        {!! $product->short_description !!}
                    </div>
                </div>
            </div>
           
        </div>
        <div class="container section--default long_description">
            @if($product->long_description)
                <div class="long-description__card">
                    <h5 class="text-uppercase">Thông tin chung</h5>
                    <hr>
                    {!! $product->long_description !!}
                </div>
            @endif
        </div>
        <!-- cmt -->
        <div class="container section--default">
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
            
        </div>
        <!-- cmt end -->

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

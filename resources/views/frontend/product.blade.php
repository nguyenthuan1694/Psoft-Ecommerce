@extends('frontend.layouts.app')

@section('content')
    {{ Breadcrumbs::render('product', $product) }}
    <link rel="stylesheet" href="{{ asset('frontend/css/product.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <section>
    <div class="container section--default">
            <div class="row">
                <div class="col-lg-5 col-sm-4 col-xs-12">
                <span style="font-size: 24px">{{ $product->name }}</span>
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
                <div class="col-lg-7 col-sm-8 col-xs-12">
                    <p class="wrap-price-detail">
                        <span class="price">{{ number_format($product->price, 0) }} đ</span>
                        <del>{{ number_format($product->cost, 0) }} đ</del>
                        <span class="btn btn-km">Giảm {{ number_format(($product->price) - ($product->cost)) }} đ</span>
                    </p>
                    <p class="font-weight-bold" style="font-size: 13px">Hãy lựa chọn theo sở thích cá nhân và xem giá bán.</p>
                    <!-- <div class="control-option">
                        <p>
                            <label class="opt_attr active">
                                <input type="radio" id="male" checked name="gender" value="male">
                                <span class="name"><i class="tick"></i>Graphite</span>
                                <span class="price">26.790.000&nbsp;₫</span>
                            </label>
                            <label class="opt_attr">
                                <input type="radio" id="female" name="gender" value="female">
                                <span class="name"><i class="tick"></i>Graphite</span>
                                <span class="price">26.790.000&nbsp;₫</span>
                            </label>
                            <label class="opt_attr">
                                <input type="radio" id="other" name="gender" value="other">
                                <span class="name"><i class="tick"></i>Graphite</span>
                                <span class="price">26.790.000&nbsp;₫</span>
                            </label>
                        </p>
                    </div> -->
                    <p>Tình trạng: Còn hàng</p>
                    <div class="mb-10">
                        <button class="btn-default-solid">Chọn mua</button>
                        <div class="wrap-group-number">
                            <button class="btn-plus"><i class="ti-plus"></i></button>
                            <button class="btn-minus"><i class="ti-minus"></i></button>
                            <input id="qty" type="text" disabled="" value="1">
                        </div>
                    </div>
                    <p> Nhà sản xuất: {{ $product->manufacturer }}</p>
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

@extends('frontend.layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <section style="padding-top: 35px">
        <div class="container section--default">
            <div class="row">
                <div class="col-md-8">
                    <div class="gallery gallery-responsive portfolio_slider">
                        <div class=""><img style="border-radius: 5px" src="{{ asset('frontend/images/slider/slider_2.png') }}"></div>
                        <div class=""><img style="border-radius: 5px" src="{{ asset('frontend/images/slider/slider_3.jpg') }}"></div>
                        <div class=""><img style="border-radius: 5px" src="{{ asset('frontend/images/slider/slider_4.jpg') }}"></div>
                    </div>
                </div>
                <div class="col-md-4" style="padding-top: 20px">
                    <div class="mb-3">
                        <a href=""><img style="border-radius: 5px" src="{{ asset('frontend/images/slider/slider_4.jpg') }}"></a>
                    </div>
                    <div class="">
                        <a href=""><img style="border-radius: 5px" src="{{ asset('frontend/images/slider/slider_3.jpg') }}"></a>
                    </div>
                </div>
            </div>
            <div class="sale">
                <img style="border-radius: 5px" src="{{ asset('frontend/images/background/sale_last_week.png') }}" alt="">
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6"><img style="border-radius: 5px" src="{{ asset('frontend/images/background/qc_1.png') }}" alt=""></div>
                <div class="col-md-6"><img style="border-radius: 5px" src="{{ asset('frontend/images/background/qc_2.png') }}" alt=""></div>
            </div>
        </div>
        @foreach($categories as $category)
            @if(!empty($category->products))
                @if(empty($category->parent_id))
                <div class="container section--default mt-3">
                    <div class="wrap_title mb__30 des_title_2" style="border-radius: 5px;background: linear-gradient(90deg, #0dd7c5 0%, #044943 50%, #0dd7c5 100%)">
                        <h3 class="sections-title tc pr flex fl_center al_center fs__24 title_2">
                            <span class="mr__10 ml__10 text-uppercase" style="color: #FFF">{{ $category->name }}</span>
                        </h3>
                        <span class="dn tt_divider">
                            <span></span>
                            <i class="dn clprfalse title_2 la-gem"></i>
                            <span> </span>
                        </span>
                        <div class="text-center"><span class="section-subtitle db sub-title tc">{{ $category->description }}</span></div>
                    </div>
                    <!-- product -->
                    <div class="row">
                        @foreach($category->products->take(8) as $product)
                            <div class="abc col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-4">
                                <div class="home--product">
                                    <a  href="{{ route('product', ['slug' => $product->slug]) }}">
                                        <div class="home--product__img">
                                            <img src="{{ asset($product->thumbnail) }}" alt="Img" class="img-responsive" />
                                            @if($product->cost)
                                                <span class="btn btn-km">{{ number_format(($product->price) - ($product->cost)) }}??</span>
                                            @endif
                                        </div>
                                    </a>
                                    <div class="home--product__text">
                                        <div class="home--product__title">
                                            <span><a class="home--product__name" href="#">{{ $product->name }}</a></span>
                                        </div>
                                        <div class="home--product__description">
                                            <p class="home--product__location">
                                                <strong>{!! trans('home.price') !!}</strong>
                                                <span class="mr-2">{{ number_format($product->price) }}??</span>
                                                @if($product->cost)
                                                    <del>{{ number_format($product->cost) }}??</del>
                                                @endif
                                            </p>
                                            <p style="font-size: 13px">{!! trans('home.text-1') !!}</p>
                                            <small class="btn btn-bh">{!! trans('home.guarantee') !!}</small>
                                            <p class="mt-1"></p>
                                            <small class="btn btn-lx">{!! trans('home.installment') !!}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-3">
                        <div class="home--product__view">
                            <a href="{{ route('category', ['slug' => $category->slug]) }}" class="float-right btn btn-custom btn-sm color--link mb-1">
                            {!! trans('home.view-all') !!}
                            </a>
                        </div>
                    </div>
                    
                </div>
                @endif
            @endif
        @endforeach
    </section>
@endsection

@section('script')
<script src="{{ asset('backend/dist/js/validation-data.js') }}"></script>
<script>
        $('.gallery-responsive').slick({
    dots: false,
    infinite: true,
    speed: 600,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3500,
    responsive: [
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
    });
    $('.slick-prev').hide();
    $('.slick-next').hide();
    let indexOpen = 0;

let btnTab = document.querySelectorAll('.nav-tab ul li button');
let contentTab = document.querySelectorAll('.content-tab');

</script>
@endsection
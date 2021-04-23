@extends('frontend.layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('frontend/css/introduce.css') }}">
    {{ Breadcrumbs::render('news', $news) }}
    <section>
        <div class="container">
            <div class="container section--default">
                <div class="row mt-3 introduce-news">
                    <div class="col-lg-9 col-sm-9 col-xs-12">
                        @foreach($news as $items)
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="introduce_img">
                                        <a href="{{ route('news.showNews', ['slug' => $items->slug]) }}"><img src="{{ asset($items->thumbnail) }}" alt="" class="img-responsive"></a>
                                    </div>
                                    <div class="product-bage product-badge__outline">
                                        <div class="product-badge__inner">
                                            <span class="product-badge__stt">New</span><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="introduce-text">
                                        <a href="{{ route('news.showNews', ['slug' => $items->slug]) }}">
                                            <h5 style="line-height: 24px">{{ $items->title }}</h5>
                                            <p class="introduce-text__short_description">{{ $items->short_description }}</p>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="list-cate-left">
                            <div class="introduce-product section--default">
                                <h4 class="introduce-product__title">Sản phẩm nổi bật</h4>
                                <div>
                                    @foreach($products->take(10) as $product)
                                    <ul>
                                        <li class="introduce-product__li">
                                            <div class="row">
                                                <div class="col-md-5 cool-sm-5 introduce-product__img">
                                                    <div class="product-img__same">
                                                        <a href="{{ route('product', ['slug' => $product->slug]) }}"><img src="{{ asset($product->thumbnail) }}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="introduce-product__content col-md-7 col-sm-7">
                                                    <a href="{{ route('product', ['slug' => $product->slug]) }}" class="introduce-product__text font-weight-bold">
                                                        {{ $product->name }}
                                                    </a>
                                                    <div style="position: relative">
                                                        <svg style="color: #d5d5d5;" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                                        </svg>
                                                        <small style=" color: #d5d5d5;position: absolute;top: 2px;padding-left: 3px;">
                                                            {{ date('d/m/Y', strtotime($product->created_at)) }}
                                                        </small>
                                                    </div>
                                                    <div class="introduce-text__short_description_product">
                                                        {!! $product->short_description !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('frontend.layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('frontend/css/introduce.css') }}">
{{ Breadcrumbs::render('introduce', $news) }}
<section>
    <div class="container section--default">
        <div class="introduce-product row">
            <div class="col-lg-9 col-sm-6 col-sx-12">
                <h5 class="text-uppercase">{{ $news->title }}</h5>
                <div class="mt-3">
                    {{ $news->short_description }}
                </div>
                <div class="mt-3">
                    <img src="{{ asset($news->thumbnail) }}" alt="">
                </div>
                <div class="mt-3">
                {!! $news->long_description !!}
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-sx-12">
                <div class="introduce-product section--default">
                    <h4 class="introduce-product__title">Tin HOT</h4>
                    <div>
                        @foreach($newsData->take(10) as $news)
                        <ul>
                            <li class="introduce-product__li">
                                <div class="row">
                                    <div class="col-md-5 cool-sm-5 introduce-product__img">
                                        <div class="product-img__same">
                                            <a href="{{ route('news', ['slug' => $news->slug]) }}"><img src="{{ asset($news->thumbnail) }}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="introduce-product__content col-md-7 col-sm-7">
                                        <a href="{{ route('news', ['slug' => $news->slug]) }}" class="introduce-product__text font-weight-bold">
                                            {{ $news->title }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                <div class="introduce-product section--default">
                    <h4 class="introduce-product__title">Sản phẩm nổi bật</h4>
                    <div>
                        @foreach($products->take(15) as $product)
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
</section>
@endsection
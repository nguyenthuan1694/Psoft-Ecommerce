@extends('frontend.layouts.app')

@section('content')
    {{ Breadcrumbs::render('category', $category) }}
    <link rel="stylesheet" href="{{ asset('frontend/css/category.css') }}">
    <section>
        <div class="container vrsg-categories">
            <div class="bg-qc row mb-3">
                <div class="col-md-6"><img style="border-radius: 6px" src="{{ asset('frontend/images/background/bg-qc-1.png') }}" alt=""></div>
                <div class="col-md-6"><img style="border-radius: 6px" src="{{ asset('frontend/images/background/bg-qc-2.png') }}" alt=""></div>
            </div>
            <div class="row">
                <!-- <div class="col-auto category--list__left">
                    <div class="category--list section--default">
                        <h4 class="category--list__title">
                            Danh mục
                        </h4>
                        <ul class="category--list__content text-uppercase">
                            @include('frontend.includes.categories_left_menu', ['categories' => $categories])
                        </ul>
                    </div>
                    
                </div> -->
                <div class="col-auto category--list__right section--default">
                    <div class="section-title_category">
                        <h2 class="category--list__right-title">{{ $category->name }}</h2>
                    </div>
                    <!-- category--list__product -->
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-4 mb-1">
                                <div class="home--product">
                                    <a  href="{{ route('product', ['slug' => $product->slug]) }}">
                                        <div class="home--product__img">
                                            <img src="{{ asset($product->thumbnail) }}" alt="Img" class="img-responsive" />
                                            @if($product->cost)
                                                <span class="btn btn-km">{{ number_format(($product->price) - ($product->cost)) }}đ</span>
                                            @endif
                                        </div>
                                    </a>
                                    <div class="home--product__text">
                                        <div class="home--product__title">
                                            <span><a class="home--product__name" href="#">{{ $product->name }}</a></span>
                                        </div>
                                        <div class="home--product__description">
                                            <p class="home--product__location">
                                                <strong>Giá:</strong>
                                                <span class="mr-2">{{ number_format($product->price) }}đ</span>
                                                @if($product->cost)
                                                    <del>{{ number_format($product->cost) }}đ</del>
                                                @endif
                                            </p>
                                            <p class="" style="font-size: 13px">[Hot] thu cũ lên đời giá cao - thủ tục nhanh - trợ giá lên tới 1 triệu</p>
                                            <small class="btn btn-bh">Bảo hành 12 tháng</small>
                                            <p class="mt-1"></p>
                                            <small class="btn btn-lx">Trả góp 0% lãi xuất</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $products->links('frontend.includes.pagination') }}
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('frontend.layouts.app')

@section('content')
    {{ Breadcrumbs::render('category', $category) }}
    <link rel="stylesheet" href="{{ asset('frontend/css/category.css') }}">
    <section>
        <div class="container vrsg-categories">
            <div class="row">
                <div class="col-auto category--list__left">
                    <div class="category--list section--default">
                        <h4 class="category--list__title">
                            Danh mục
                        </h4>
                        <ul class="category--list__content text-uppercase">
                            @include('frontend.includes.categories_left_menu', ['categories' => $categories])
                        </ul>
                    </div>
                    
                </div>
                <div class="col-auto category--list__right section--default">
                    <div class="section-title">
                        <h2 class="category--list__right-title">{{ $category->name }}</h2>
                    </div>
                    <div class="category--list__product row">
                        @foreach($products as $product)
                        <div class="col-md-3 col-sm-4">
                            <div class="category--list__product-content">
                                <a  href="{{ route('product', ['slug' => $product->slug]) }}">
                                    <div class="category--list__img">
                                        <img src="{{ asset($product->thumbnail) }}" alt="Img" class="img-responsive" />
                                    </div>
                                </a>
                                <div class="category--list__text">
                                    <div class="text-left mb-2">
                                        <span><a class="category-text__title" href="{{ route('product', ['slug' => $product->slug]) }}">{{ $product->name }}</a></span>
                                    </div>
                                    <div class="description-prod">
                                        <p class="product-grid__location"><strong>Vị trí:</strong> {{ $product->location }}</p>
                                        <p class="product-grid__total-area"><strong>Tổng diện tích:</strong> {{ $product->total_area }}</p>
                                        <p class="product-grid__type"><strong>Loại hình: </strong> {{ $product->type }}</p>
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
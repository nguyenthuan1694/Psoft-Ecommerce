@extends('frontend.layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('frontend/css/category.css') }}">
    <section>
        <div class="container vrsg-categories" style="padding-top: 60px">
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
                    <div class="category--list__news section--default">
                        <h4 class="category--list__title">Tin tức</h4>
                        <div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-auto category--list__right section--default">
                    <div class="section-title">
                        <h2 class="category--list__right-title">Kết quả tìm kiếm với từ khoá: {{ $keyword }}</h2>
                    </div>
                    <div class="category--list__product row">
                        @foreach($products as $product)
                        <div class="col-md-3 col-sm-4">
                            <div class="category--list__product-content">
                                <a  href="{{ route('product', ['slug' => $product->searchable['slug']]) }}">
                                    <div class="category--list__img">
                                        <img src="{{ asset($product->searchable['thumbnail']) }}" alt="Img" class="img-responsive" />
                                    </div>
                                </a>
                                <div class="category--list__text">
                                    <div class="text-left mb-2">
                                        <span><a class="category-text__title" href="{{ route('product', ['slug' => $product->searchable['slug']]) }}">{{ $product->searchable['name'] }}</a></span>
                                    </div>
                                    <div class="description-prod">
                                      
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
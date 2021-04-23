<link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}">
<header class="header">
    <nav class="header-menu" style="display: flex;align-items: center;justify-content: flex-end;">
        <div class="main-menu">
            <div style="position: absolute;top: -5px;left: 0;display: block;cursor: pointer;">
                <a href="/" class="logo">
                    <img style="background-color: #044943" src="{{ asset('frontend/images/logos/logo_login.png') }}" 
                    class="img-fluid" alt="">
                </a>
            </div>
            
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <div style="position: absolute;top: 0;left: 130px;display: block;cursor: pointer;" class="aa">
                <ul class="ul-menu">
                    <li class="has-child menu-li">
                        <a href="#" class="a-li">Danh mục sản phẩm</a>
                        <ul class="sub-ul-menu">
                            @include('frontend.includes.categories_top_menu', ['categories' => $categories])
                        </ul>
                    </li>
                    <li class="menu-li"><a class="a-li" href="{{ route('news') }}">Tin công nghệ</a></li>
                    <li class="menu-li"><a class="a-li" href="#contacts">Hotline: 1800.6018 (miễn phí)</a></li>
                </ul>
            </div>
            <div style="position: absolute;top: 8px;left: 45%;display: block;cursor: pointer;" class="search">
                <form action="{{ route('search') }}" method="get">
                    <input class="form-control" type="text" name="query" placeholder="Tìm kiếm ...">
                    <button><span class="ti-search"></span></button>
                </form>
            </div>
            <div style="position: absolute;top: 0;right: 15%;display: block;cursor: pointer;">
                @include('frontend.includes.cart_menu')
            </div>
        </div>
    </nav>
    <div class="px-2" id="content-dash-id" style="display: none;" >
    </div>
</header>
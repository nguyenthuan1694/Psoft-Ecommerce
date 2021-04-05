<link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}">
<header class="header">
    <nav class="header-menu">
        <div class="main-menu">
            <a href="/" class="logo">
                <img style="background-color: #044943" src="{{ asset('frontend/images/logos/logo_login.png') }}" 
                class="img-fluid" alt="">
            </a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <ul class="ul-menu">
                <li class="has-child menu-li">
                    <a href="#" class="a-li">Danh mục sản phẩm</a>
                    <ul class="sub-ul-menu">
                        @include('frontend.includes.categories_top_menu', ['categories' => $categories])
                    </ul>
                </li>
                <li class="menu-li"><a class="a-li" href="#work">Giới thiệu</a></li>
                <li class="menu-li"><a class="a-li" href="#about">Tin tức và sự kiện</a></li>
                <li class="menu-li"><a class="a-li" href="#careers">Liên hệ</a></li>
            </ul>
        </div>
    </nav>
    <div class="px-2" id="content-dash-id" style="display: none;" >
            </div>
</header>
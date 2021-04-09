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
            <div style="position: absolute;top: 0;left: 130px;display: block;cursor: pointer;">
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
            <!-- <div style="position: relative;cursor: pointer;right: 250px;">
                @ include('frontend.includes.cart_menu')
            </div> -->
        </div>
    </nav>
    <div class="px-2" id="content-dash-id" style="display: none;" >
            </div>
</header>
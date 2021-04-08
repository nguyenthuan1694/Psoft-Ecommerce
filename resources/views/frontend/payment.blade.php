@extends('frontend.layouts.app')

@section('content')
    {{ Breadcrumbs::render('cart') }}
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}">
    <section>
        <div class="container cart__card">
            <div class="text-center">
                <span class="text-uppercase font-weight-bold" style="color: red">đặt hàng thành công</span>
            </div>
            <div style="padding: 15px 30px">
                <span style="font-size: 14px">Cảm ơn bạn đã mua hàng tại Di Động Việt. BQT sẽ sớm liên hệ để xác nhận đơn hàng của bạn</span>
            </div>
            <div style="display: block;margin: 0 0px;line-height: 30px;font-size: 14px;color: #333;background: #f3f3f3;text-transform: uppercase;padding: 0 30px;">THÔNG TIN ĐẶT HÀNG:</div>
            <div class="infoorder">
                <div>Họ và  tên: Nguyen N/A</div>
			     <div>Số điện thoại: 09152145245</div>
                <div>Tổng tiền: <strong><span class="price">7.790.000,00&nbsp;₫</span></strong></div>
            </div>
            <div style="display: block;margin: 0 0px;line-height: 30px;font-size: 14px;color: #333;background: #f3f3f3;text-transform: uppercase;padding: 0 30px;">SẢN PHẨM ĐÃ MUA:</div>
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset($product->thumbnail) }}" alt="">
                </div>
                <div class="col-md-6">
                    <span style="font-size: 13px">{{ $product->name }}</span>
                </div>
                <div class="col-md-3">
                    <span style="font-size: 13px; color: red">7.790.000,00 ₫</span>
                </div>
            </div>
            <hr>

        </div>
    </section>
@endsection
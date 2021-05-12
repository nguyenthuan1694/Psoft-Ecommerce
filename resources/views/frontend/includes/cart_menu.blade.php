<div class="wrap-cart-icon has-item">
    <a href="{{ route('cart.index') }}" class="cart-icon"><i class="ti-shopping-cart"></i></a>
    <span id="cart_qty" class="qty-cart">{{ $cart::count() }}</span>
    <a href="{{ route('cart.paymentProduct') }}">Giỏ hàng</a>
    <div class="wrap-item-view-cart">
        <div id="cart_content">
            @foreach($cart::content() as $product)
                <div class="item-view-cart">
                    <div class="w-item-mini">
                        <img src="{{ $product->options->img }}" alt="">
                    </div>
                    <div class="content-text-item">
                        <a href="#">{{ $product->name }}</a>
                        <p>{{ $product->qty }} x {{ number_format($product->price, 0) }} đ</p>
                    </div>
                    <span class="remove-item" onclick="removeFromCart('{{ $product->rowId }}')"><i class="ti-close"></i></span>
                </div>
            @endforeach
        </div>

        <div class="wrap-total-fee">
            <p>Tạm tính: <span class="float-right"><strong id="cart_total">{{ $cart::total() }}VNĐ</strong></span></p>
            <div class="wrap-btn-event">
                <a href="{{ route('cart.paymentProduct') }}" class="btn-default">Giỏ hàng</a>
            </div>
        </div>
    </div>
</div>

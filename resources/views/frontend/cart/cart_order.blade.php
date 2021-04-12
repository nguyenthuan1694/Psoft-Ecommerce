@extends('frontend.layouts.app')

@section('content')
    {{ Breadcrumbs::render('cart') }}
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}">
    <section>
        <div class="container cart__card">
            <table class="table">
            @foreach($cart as $key => $product)
                <tr>
                    <td><img class="img-fluid img-thumbnail" style="width: 100px; height: auto"  src="{{ asset($product->options->img) }}" alt="img"></td>
                    <td><span class="font-weight-bold" style="color: #ea2135; font-size: 14px;">{{ number_format($product->price, 0) }}&nbsp;đ</span></td>
                    <td>
                        <div class="input-group">
                            <button id="{{$key}}" class="btn-minus input-group-addon btn btn-primary">-</button>
                            <input type="number" id="qty_{{$key}}" class="item-count form-control" value="{{ $product->qty }}">
                            <button id="{{$key}}" class="btn-plus btn btn-primary input-group-addon">+</button>
                        </div>
                    </td>
                    <td>
                        <button class="delete-item btn btn-danger" onclick="removeFromCart('{{$product->rowId}}')" data-name="{{ $product->name }}">X</button>
                    </td>
                    <td>
                        <span class="font-weight-bold total_{{$key}}" style="color: #ea2135; font-size: 14px;" >{{ number_format($product->qty * ($product->price), 0) }} đ</span>
                        <input type="hidden" id="total_{{$key}}" value="{{ $product->qty * ($product->price) }}">
                    </td>
                </tr>
                @endforeach
            </table>
            <div style="padding: 10px"><strong>Tổng Tiền</strong>: <span class="total-cart"></span>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $('.remove-item').click(function() {
		    $(this).parents('.item-view-cart').remove();
        });
        
        $('.btn-plus').click(function() {
            var keyId = $(this).attr('id');
            var total = $("#total_"+keyId).val();
            var input = $('#qty_'+keyId);
            var plus = input.val(+input.val()+1);
            var totalaa = $('.total_'+keyId).text(new Intl.NumberFormat('en').format(total*(plus.val()))+' đ');
        });
        
        $('.btn-minus').click(function() {
            var input = $(this).siblings('input');
            if(input.val() >1){
                input.val(+input.val()-1);
            }
            else {
                $('#cartModal').modal('show')
            }

        });


        function setShipping(obj)
	    {
            $this=$(obj);
            $this.closest("div").find(".active").removeClass("active");
            $this.addClass("active");
            $("input[name='shipping_method']").val(jQuery(obj).data("ship"));
            $(".tab-shipping .tab-pane").hide();
            $("#tab_"+$(obj).data("ship")).fadeIn();
            return false;
	    }
    </script>
@endsection

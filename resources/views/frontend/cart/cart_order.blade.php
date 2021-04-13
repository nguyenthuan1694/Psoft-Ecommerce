@extends('frontend.layouts.app')

@section('content')
    {{ Breadcrumbs::render('cart') }}
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}">
    <section>
        <div class="container cart__card">
            <table class="table" id="order-entry">
            @foreach($cart as $key => $product)
                <tr>
                    <td><img class="img-fluid img-thumbnail" style="width: 100px; height: auto"  src="{{ asset($product->options->img) }}" alt="img"></td>
                    <td>
                        <span class="font-weight-bold" style="color: #ea2135; font-size: 14px;">{{ number_format($product->price, 0) }}&nbsp;đ</span>
                        <input type="hidden" class="form-calc form-cost" value="{{ $product->price }}">
                    </td>
                    <td>
                        <!-- <div class="input-group"> -->
                            <!-- <button id="{{$key}}" class="form-calc btn-minus minus_{{$key}} input-group-addon btn btn-primary">-</button> -->
                            <input type="text" id="qty_{{$key}}" class="form-calc form-qty item-count form-control" value="{{ $product->qty }}">
                            <!-- <button id="{{$key}}" onClick="btnPlus('{{ $key }}')" class="form-calc form-qty btn-plus plus_{{$key}} btn btn-primary input-group-addon">+</button> -->
                        <!-- </div> -->
                    </td>
                    <td>
                        <button class="delete-item btn btn-danger" onclick="removeFromCart('{{$product->rowId}}')" data-name="{{ $product->name }}">X</button>
                    </td>
                    <td>
                        <input class="form-line form-control" value="{{ number_format(($product->qty) * $product->price) }}" readonly>
                        <input type="hidden" class="price form-control" value="{{ $product->qty * $product->price }}" readonly>
                        <!-- <span class="font-weight-bold total_{{$key}} " style="color: #ea2135; font-size: 14px;" ></span> -->
                        <!-- <input type="hidden" id="totalh_{{$key}}" value="">
                        <input type="hidden" id="total_{{$key}}" value="{{ $product->qty * ($product->price) }}">
                        <input type="hidden" id="qtyh_{{$key}}" value=""> -->
                    </td>
                </tr>
                
                @endforeach
                <tr>
                    <td colspan="1" class="font-weight-bold">Tổng Tiền: </td>
                    <td id="total" style="color: #ea2135; font-weight: 600; font-size: 14px"></td>
                </tr>
            </table>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $('.remove-item').click(function() {
		    $(this).parents('.item-view-cart').remove();
        });

        // function btnPlus(key) {
        //     var total = $("#total_"+key).val();
        //     var input = $('#qty_'+key);
        //     var plus = input.val(+input.val()+1);
        //     // push qty
        //     $('#qtyh_'+key).val(plus.val());
        //     var totalaa = $('.total_'+key).text(new Intl.NumberFormat('en').format(total*(plus.val()))+' đ');
        //     // $('#totalh_'+key).val(total*(plus.val()));
        //     // $('.total-cart').text(totalCart(key));
        // }
        
        // $('.btn-minus').click(function() {
        //     var input = $(this).siblings('input');
        //     if(input.val() >1){
        //         input.val(+input.val()-1);
        //     }
        //     else {
        //         $('#cartModal').modal('show');
        //     }
        // });

        // function totalCart(key) {
            // var keyId = $('.plus_'+key).attr('id');
            // var total =+ $("#totalh_"+key).val();
            // if($('#qtyh_'+key).val()) {
            //     var plus = $('#qtyh_'+key).val();
            // } else {
            //     var plus = 1;
            // }
            // var totalCart = total;
           
            // console.log(total)
            // return new Intl.NumberFormat('en').format(total*(plus))+' đ';
        // }

        // $('.total-cart').text(totalCart());

        // ().toFixed(2)

        $("#order-entry").on("keyup", ".form-calc", function() {
            var key = $(this).attr('id');
            var parent = $(this).closest("tr");
            var price = new Intl.NumberFormat('en').format(parent.find(".form-qty").val() * parent.find(".form-cost").val());
            var priceHidden = parent.find(".form-qty").val() * parent.find(".form-cost").val();
            parent.find(".price").val(priceHidden);
            parent.find(".form-line").val(price);
            var totalPrice = 0;
            var total = 0;
            $(".price").each(function(){
                totalPrice += parseFloat($(this).val()||0);
            });
            $(".form-line").each(function(){
                total += parseFloat($(this).val()||0);
            });
            $("#total").text(new Intl.NumberFormat('en').format(totalPrice)+ ' đ');
            // totalCart(key)
        });
        function getUnique(array){
            var uniqueArray = [];
            
            // Loop through array values
            for(i=0; i < array.length; i++){
                if(uniqueArray.indexOf(array[i]) === -1) {
                    uniqueArray.push(array[i]);
                }
            }
            return uniqueArray;
        }

        function loadTable() {
            var price = [];
            $('.form-calc').each(function(){
                var parent = $(this).closest("tr");
                var priceq = parent.find(".form-qty").val() * parent.find(".form-cost").val();
                price.push(priceq)
            });
            var priceTotal = getUnique(price);
            return new Intl.NumberFormat('en').format(priceTotal.reduce((a, b) => a + b, 0))+ ' đ';
        }

        $("#total").text(loadTable())
        
        // function totalCart(key) {
        //     console.log(key)
        //     var keyId = $('.plus_'+key).val();
        //     console.log(keyId)
        //     var total =+ $("#totalh_"+key).val();
        //     if($('#qtyh_'+key).val()) {
        //         var plus = $('#qtyh_'+key).val();
        //     } else {
        //         var plus = 1;
        //     }
        //     var totalCart = total;
           
        //     console.log(total)
        //     return new Intl.NumberFormat('en').format(total*(plus))+' đ';
        // }

        // $('#total').text(totalCart());
        
    </script>
@endsection

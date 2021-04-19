@extends('frontend.layouts.app')

@section('content')
    {{ Breadcrumbs::render('cart') }}
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <section>
        <div class="container" style="max-width: 800px">
            <div class="mb-2">
                <a href="/" style="text-decoration: none; color: #0056b3;"><i class="fa fa-reply"></i>   Mua thêm sản phẩm khác</a>
            </div>
        </div>
        <div class="container cart__card">
            <div class="mb-2">
                <span style="padding: 10px" class="font-weight-bold">Thông tin đơn hàng</span>
            </div>
            @if(Cart::count() > 0)
            <table class="table" id="order-entry">
                @foreach(Cart::content() as $product)
                <tr>
                    <td><img class="img-fluid img-thumbnail" style="width: 100px; height: auto"  src="{{ asset($product->options->img) }}" alt="img"></td>
                    <td>
                        <span class="font-weight-bold" style="color: #ea2135; font-size: 14px;">{{ number_format($product->price, 0) }}&nbsp;đ</span>
                        <input type="hidden" class="form-calc form-cost" value="{{ $product->price }}">
                        <input type="hidden" class="productId" value="{{ $product->id }}">
                    </td>
                    <td>
                        <input type="hidden" class="qty" value="{{ $product->qty }}">
                        <input type="text" min="0" max="5" class="form-calc form-qty item-count form-control" value="{{ $product->qty }}">
                    </td>
                    <td>
                        <button class="delete-item btn btn-danger" onclick="removeFromCart('{{$product->rowId}}')" data-name="{{ $product->name }}">X</button>
                    </td>
                    <td>
                        <input class="form-line form-control" value="{{ number_format(($product->qty) * $product->price) }}" readonly>
                        <input type="hidden" class="price form-control" value="{{ $product->qty * $product->price }}" readonly>
                    </td>
                </tr>
                
                @endforeach
                <tr>
                    <td colspan="1" class="font-weight-bold">Tổng Tiền: </td>
                    <td id="total" style="color: #ea2135; font-weight: 600; font-size: 14px"></td>
                </tr>
            </table>
            <hr>
            <span style="padding: 10px;" class="font-weight-bold">Thông tin khách hàng</span>
            <form name="checkout" action="{{ route('cart.postCheckout') }}" method="post">
                @csrf
                <div style="padding: 15px 30px">
                    <!-- @if ($errors->any())
                        @foreach ($errors->all() as $error)
                           <p style="color: #dc3545">{{ $error }}</p>
                        @endforeach
                    @endif -->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="fullname" style="font-size: 14px">Họ và tên</label>
                            <input style="font-size: 14px" id="fullname" name="fullname" type="text" placeholder="Vui lòng nhập họ tên" class="form-control @error('fullname') is-invalid @enderror">
                            @error('fullname')<small style="color: #dc3545">*Vui lòng nhập họ tên</small>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" style="font-size: 14px">Email</label>
                            <input style="font-size: 14px" id="email" name="email" type="text" placeholder="Vui lòng nhập email" class="form-control  @error('email') is-invalid @enderror">
                            @error('email')<small class="form-text text-muted">*Vui lòng nhập email</small>@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <div class="col-md-6">
                            <label for="phone" style="font-size: 14px">Số điện thoại</label>
                            <input style="font-size: 14px" id="phone" name="phone" type="text" placeholder="Vui lòng nhập số điện thoại" class="form-control  @error('phone') is-invalid @enderror">
                            @error('phone')<small style="color: #dc3545">*Vui lòng nhập số điện thoại</small>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="house_number" style="font-size: 14px">Số nhà</label>
                            <input style="font-size: 14px" type="text" name="house_number" placeholder="*Số nhà" class="form-control @error('house_number') is-invalid @enderror">
                            @error('house_number')<small style="color: #dc3545">*Vui lòng nhập Số nhà</small>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <select id="province" name="province_code" class="province col-md-4 form-control custom-select @error('province_code') is-invalid @enderror">
                            <option value="" selected>Tỉnh / Thành phố </option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->code }}">{{ $province->name_with_type }}</option>
                            @endforeach
                        </select>
                        @error('province_code')<small style="color: #dc3545">*Vui lòng chọn Tỉnh/Thành phố</small>@enderror
                    </div>
                    <div class="form-group">
                        <select id="district" name="district_code" class="col-md-4 form-control custom-select @error('district_code') is-invalid @enderror">
                            <option value="" selected>Quận / Huyện</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->code }}">{{ $district->name_with_type }}</option>
                            @endforeach
                        </select>
                        @error('district_code')<small style="color: #dc3545">*Vui lòng chọn Quận / Huyện</small>@enderror
                    </div>
                    <div class="form-group">
                        <select id="ward" name="ward_code" class="col-md-4 form-control custom-select @error('ward_code') is-invalid @enderror">
                            <option value="" selected>Phường / Xã</option>
                            @foreach($wards as $ward)
                                <option value="{{ $ward->code }}">{{ $ward->name_with_type }}</option>
                            @endforeach
                        </select>
                        @error('ward_code')<small style="color: #dc3545">*Vui lòng chọn Phường / Xã</small>@enderror
                    </div>
                    <!-- <div class="form-group">
                        <span class="font-weight-bold">Chọn cách thức nhận hàng</span>
                    </div>
                    <div class="form-group mode-choose">
                        <div class="choose-label">
                            <a href="#" data-ship="at_shop" onclick="setShipping(this);">Nhận hàng tại cửa hàng</a>
                            <a href="#" data-ship="at_home" onclick="setShipping(this);">Giao hàng tận nơi</a>
                        </div>
                    </div>

                    <input type="hidden" name="shipping_method">
                    
                    <div class="form-group">
                        <div class="tab-shipping">
                            <div class="tab-pane" id="tab_at_shop">
                                <div class="tab-inner">
                                    <div class="tab-scroll">
                                        <ul class="scroll-store"><li><label><input type="radio" name="showroom" value="1"><span>198 Hoàng Văn Thụ, P. 04, Quận Tân Bình,&nbsp;TP.HCM (Ngay vòng xoay Lăng Cha Cả, Cuối đường Lê Văn Sỹ)</span></label></li><li><label><input type="radio" name="showroom" value="2"><span>621 Âu Cơ, Quận Tân Phú, HCM (Ngã 4 Âu Cơ &amp; Thoại Ngọc Hầu)</span></label></li><li><label><input type="radio" name="showroom" value="3"><span>367 Quang Trung, P. 10, Q. Gò Vấp, Tp HCM</span></label></li><li><label><input type="radio" name="showroom" value="5"><span>&nbsp;75 - 77 Trần Quang Khải, P. Tân Định, Quận 1, HCM</span></label></li><li><label><input type="radio" name="showroom" value="6"><span>177 Nguyễn Văn Linh, Q. Hải Châu, Đà Nẵng</span></label></li><li><label><input type="radio" name="showroom" value="7"><span>607-609 Lê Hồng Phong, P. 10, Quận 10, HCM</span></label></li><li><label><input type="radio" name="showroom" value="9"><span>232 Tân Hương, P. Tân Quý, Quận Tân Phú, Tp. Hồ Chí Minh</span></label></li><li><label><input type="radio" name="showroom" value="10"><span>97 Võ Văn Ngân, P. Linh Chiểu, Quận Thủ Đức, TP.HCM</span></label></li><li><label><input type="radio" name="showroom" value="11"><span>619&nbsp;Nguyễn Thị Thập, Phường Tân Hưng, Quận 7, TP.HCM (đối diện Lotte Mart)</span></label></li><li><label><input type="radio" name="showroom" value="12"><span>51 Lê Văn Việt, P. Hiệp Phú, Quận 9, TP.HCM</span></label></li><li><label><input type="radio" name="showroom" value="13"><span>626 Lê Quang Định, Phường 1, Quận Gò Vấp (Ngay ngã 4 Phạm Văn Đồng và Lê Quang Định)</span></label></li><li><label><input type="radio" name="showroom" value="14"><span>745A Đường 3/2, Phường 6, Quận 10, TP.HCM (Ngay ngã 3 Nguyễn Kim &amp; 3/2)</span></label></li><li><label><input type="radio" name="showroom" value="15"><span>217 Bà Hom, Phường 13, Quận 6, TP.HCM</span></label></li><li><label><input type="radio" name="showroom" value="27"><span>87C Nguyễn Ảnh Thủ, Khu phố 3, Phường Trung Mỹ Tây, Quận 12, TP.HCM (Ngay sát trung tâm văn hoá Quận 12)</span></label></li><li><label><input type="radio" name="showroom" value="28"><span>316 Tùng Thiện Vương, Phường 13, Quận 8</span></label></li><li><label><input type="radio" name="showroom" value="29"><span>315 Đỗ Xuân Hợp, Phường Phước Long B, Quận 9, TP.HCM</span></label></li></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_at_home">
                                <div class="tab-inner">
                                    <div class="tab-scroll">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="name" style="font-size: 14px">Tỉnh/Thành phố</label>
                                                <input style="font-size: 14px"  type="text" placeholder="Vui lòng nhập họ tên" class="form-control" value="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone" style="font-size: 14px">Quận/Huyện</label>
                                                <input style="font-size: 14px"  type="text" placeholder="Vui lòng nhập số điện thoại" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <textarea placeholder="Địa chỉ..." name="description" class="tinymce" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <hr>
                    <!-- <form action="{{ route('cart.getCheckout') }}" method="get" enctype="multipart/form-data"> -->
                        <div class="form-group">
                            
                            <button name="btnCheckout" style="border: 0" class="col-info" type="submit">Đặt hàng trước, thanh toán sau
                                <span>(Thanh toán tại nhà hoặc tại cửa hàng)</span>
                            </button>
                            <!-- <div class="orpayment">
                                <span>Hoặc thanh toán Online</span>
                            </div> -->
                        </div>
                    <!-- </form> -->
                    <!-- <div class="form-group">
                        <div class="list-payment-online">
                            <div class="item-payment">
                                <lable data-method="payoo">
                                    <input type="radio" name="payment_method" value="payoo"><i class="icon-payment icon-payment-payoo"></i> 
                                    Thanh toán thông qua Payoo	
                                </lable>
                            </div>
                        </div>
                    </div> -->
                </div>
            </form>
            @endif
            @if(Cart::count() == 0)
            <hr>
            <div style="padding: 10px 30px">
                <div class="text-center">Không có sản phẩm nào trong giỏ hàng</div>
                <div class="text-center">
                    <a href="/" style="color: #0056b3; text-decoration: none">Quay lại trang chủ</a>
                </div>
                <div class="text-center">
                <small>Khi cần trợ giúp vui lòng gọi 1800.1060 hoặc 028.3622.1060 (7h30 - 22h)</small>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $('.remove-item').click(function() {
		    $(this).parents('.item-view-cart').remove();
        });

        $("#order-entry").on("change", ".form-calc", function() {
            
            var parent = $(this).closest("tr");
            
            var qty = parent.find(".qty").val();
            var qtyc = parent.find(".form-qty").val();

            if(qty > qtyc) {
                var sl = (qtyc - qty)
            } else {
                var sl = qtyc - qty;
            }
            var productId = parent.find(".productId").val();
            addToCart(productId, sl);
            var price = new Intl.NumberFormat('en').format(parent.find(".form-qty").val() * parent.find(".form-cost").val());
            var priceHidden = parent.find(".form-qty").val() * parent.find(".form-cost").val();
            parent.find(".price").val(priceHidden);
            parent.find(".form-line").val(price);
            var totalPrice = 0;
            var total = 0;
            $(".price").each(function(){
                totalPrice += parseFloat($(this).val()||0);
            });
            $(".form-line").each(function() {
                total += parseFloat($(this).val()||0);
            });
            $("#total").text(new Intl.NumberFormat('en').format(totalPrice)+ ' đ');
           
        });

        // add order
        function addToCart(id, qty) {
            $.ajax({
                type: 'POST',
                url: '{{ route('cart.add') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: id,
                    qty: qty
                }
            }).then(function (res) {
                // $('#cart_qty').html(res.data.count);
                $('#cart_content').html(function () {
                    let html = '';
                    // res.data.content.forEach(function (e) {
                    //    html = html +
                    //        `<div class="item-view-cart">
                    //             <div class="w-item-mini">
                    //                 <img src="${e.options.img}" alt="">
                    //             </div>
                    //             <div class="content-text-item">
                    //                 <a href="#">${e.name}</a>
                    //                 <p>${e.qty} x ${e.price} VNĐ</p>
                    //             </div>
                    //             <span class="remove-item" onclick="removeFromCart('${e.rowId}')"><i class="ti-close"></i></span>
                    //         </div>`;
                    // });
                    // return html;
                })
                // $('#cart_total').html(res.data.total);
            });
        }

        // loại bỏ items trùng lập trong mảng
        function getUnique(array) {
            var uniqueArray = [];
            // Loop through array values
            for(i=0; i < array.length; i++){
                if(uniqueArray.indexOf(array[i]) === -1) {
                    uniqueArray.push(array[i]);
                }
            }
            return uniqueArray;
        }

        //
        function loadTable() {
            var price = [];
            $('.form-calc').each(function(){
                var parent = $(this).closest("tr");
                var total = parent.find(".form-qty").val() * parent.find(".form-cost").val();
                price.push(total)
            });
            var priceTotal = getUnique(price);
            return new Intl.NumberFormat('en').format(priceTotal.reduce((a, b) => a + b, 0))+ ' đ';
        }
        $("#total").text(loadTable());

        // change cách thức nhận hàng
        function setShipping(obj)
	    {
            $this=$(obj);
            $this.closest("div").find(".active").removeClass("active");
            $this.addClass("active");
            $("input[name='shipping_method']").val($(obj).data("ship"));
            $(".tab-shipping .tab-pane").hide();
            $("#tab_"+$(obj).data("ship")).fadeIn();
            return false;
	    }
        
        // remove cart items
        function removeFromCart(row_id) {
          $.ajax({
            type: 'DELETE',
            url: '{{ route('cart.remove') }}',
            data: {
              _token: '{{ csrf_token() }}',
              row_id: row_id,
            }
          }).then(function (res) {
            var totalItems = res.data.count;
            if(totalItems < 1) {
                window.location = document.location.origin
            } else {
                location.reload();
            }
            
            // $('#cart_qty').html(res.data.count);
            
            // $('#order-entry').html(function () {
            //   let html = '';
            //     res.data.content.forEach(function (e) {
            //     html = html +
            //         `<tr>
            //             <td><img class="img-fluid img-thumbnail" style="width: 100px; height: auto"  src="${e.options.img}" alt="img"></td>
            //             <td>
            //                 <span class="font-weight-bold" style="color: #ea2135; font-size: 14px;">${e.price}&nbsp;đ</span>
            //                 <input type="hidden" class="form-calc form-cost" value="${e.price}">
            //             </td>
            //             <td>
            //                 <input type="number" class="form-calc form-qty item-count form-control" value="${e.qty}">
            //             </td>
            //             <td>
            //                 <button class="delete-item btn btn-danger" onclick="removeFromCart('${e.rowId}')" data-name="${e.name}">X</button>
            //             </td>
            //             <td>
            //                 <input class="form-line form-control" value="${(e.qty*(e.price))}" readonly>
            //                 <input type="hidden" class="price form-control" value="${e.qty} * ${e.price}" readonly>
            //             </td>
            //         </tr>`
            //         ;
            //   });
            //   html += `<tr>
            //             <td colspan="1" class="font-weight-bold">Tổng Tiền: </td>
            //             <td id="total" style="color: #ea2135; font-weight: 600; font-size: 14px"></td>
            //         </tr>`;

                   
            //   return html;
             
            // })
          });
        }

        $('#province').change(function () {
            let selected =  $(this).children("option:selected").val();
            $.ajax({
                type: 'POST',
                url: '{{ route('cart.getListDistrict') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    provinceCode: selected,
                }
            }).then(function (res) {
                let html = '';
                res.data.forEach(function (e) {
                    html += `<option value="${e.code}">${e.name_with_type}</option>`;
                });
                $('#district').html(html);
                $('#district').trigger('change');
            })
        });

        $('#district').change(function () {
            let selected =  $(this).children("option:selected").val();
            $.ajax({
                type: 'POST',
                url: '{{ route('cart.getListWard') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    districtCode: selected,
                }
            }).then(function (res) {
                let html = '';
                res.data.forEach(function (e) {
                    html += `<option value="${e.code}">${e.name_with_type}</option>`;
                });
                $('#ward').html(html);
                $('#ward').trigger('change');
            })
        });
        $('#ward').change(function () {
            getAddressString();
            let province_code = $('#province').children("option:selected").val();
            let district_code = $('#district').children("option:selected").val();
            $.ajax({
                type: 'POST',
                url: '{{ route('cart.updateShipping') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    province_code: province_code,
                    district_code: district_code
                }
            }).then(function (res) {
                let tax = `${res.data.tax} VNĐ`;
                let total = `${res.data.total} VNĐ`;
                $('p.tax > span').text(tax);
                $('p.total > span').text(total);
            });
        });

        $("#province").select2({});
        $("#district").select2({});
        $("#ward").select2({});
        
        $('button[name="btnCheckout"]').click(function () {
            $('form[name="checkout"]').submit();
        });
    </script>
@endsection

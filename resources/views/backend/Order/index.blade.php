@extends('backend.layouts.app')

@section('css')
    <!-- Data Table CSS -->
    <link href="{{ asset('backend/vendors/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order</li>
            <input class="url" type="hidden" value="{{ route('orders.showOrderDetail') }}">
            {{ csrf_field() }}
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="container-fluid px-xxl-65 px-xl-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Danh sách đơn đặt hàng</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 15%">Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Trạng thái</th>
                                        <th>Tình trạng thanh toán</th>
                                        <th>Tình trạng giao hàng</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $index => $order)
                                        <tr>
                                            
                                            <td>{{ $order->fullname }}</td>
                                            <td>{{ $order->address }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{!! $order->status_text !!}</td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" title="click update status" data-placement="top" onclick="updateStatusPayment(this)">{!! $order->payment_status_text !!}</a>
                                                <select onchange="paymentChange(this)" data-id="{{ $order->id }}" hidden style="font-size: 14px" class="form-control custom-select" name="" id="statusShipping">
                                                    <option value="" selected>Vui lòng chọn trạng thái</option>
                                                    <option value="1"><span class="badge badge-info">Chưa thanh toán</span></option>
                                                    <option value="2"><span class="badge badge-warning">Đã thanh toán</span></option>
                                                    <option value="3"><span class="badge badge-success">Trả hàng</span></option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" title="click update status" data-placement="top" onclick="updateStatus(this)">{!! $order->shipping_status_text !!}</a>
                                                <select onchange="shippingChange(this)" data-id="{{ $order->id }}" hidden style="font-size: 14px" class="form-control custom-select" name="" id="statusShipping">
                                                    <option value="" selected>Vui lòng chọn trạng thái</option>
                                                    <option value="1"><span class="badge badge-info">Đang kiểm tra hàng</span></option>
                                                    <option value="2"><span class="badge badge-warning">Đang gửi</span></option>
                                                    <option value="3"><span class="badge badge-success">Gửi thành công</span></option>
                                                    <option value="4"><span class="badge badge-danger">Gửi thất bại</span></option>
                                                </select>
                                            </td>
                                            <td>{{ $order->created_at->diffForHumans() }}</td>
                                            <td>{{ $order->updated_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="#" onclick="loadModal({{ $order->id }})" class="mr-1"> <i class="icon-eye"></i> </a>
                                                <!-- <a href="{{ route('orders.edit', ['order' => $order->id]) }}" class="mr-15" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="icon-pencil"></i> </a> -->
                                                <a href="javascript:void(0)" class="mr-1" onclick="moveToTrash({{ $index }})" data-toggle="tooltip" data-placement="top" title="Move to trash"> <i class="icon-trash txt-danger"></i> </a>
                                                <form name="trash_{{ $index }}" action="{{ route('orders.destroy', ['order' => $order]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(!count($orders))
                                        <td colspan="10" class="text-center"><h3><i class="linea-icon linea-basic" data-icon="f"></i></h3> No Data</td>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="float-left">
                                {!! $orders->total() !!} orders
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="float-right">
                                {!! $orders->render() !!}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Row -->
        <!-- Modal -->
        @include('backend.includes.modal_order_detail')
    </div>
@endsection

@section('script')
    <!-- Data Table JavaScript -->
    <script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <!-- script order -->
    <script type="text/javascript" src="{{ asset('backend/js/order.js') }}"></script>
    <script>
        function updateStatus(obj)
        {
            var parent =$(obj).attr("hidden","hidden");
            var selectParent = parent.next().removeAttr("hidden");
        }

        function updateStatusPayment(obj)
        {
            var parent =$(obj).attr("hidden","hidden");
            var selectParent = parent.next().removeAttr("hidden");
        }

        function shippingChange(obj)
        {
            var orderId = $(obj).attr('data-id');
            var selected =  $(obj).children("option:selected").val();
            $.ajax({
                type: 'POST',
                url: '{{ route('orders.updateShipping') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    shipping_status: selected,
                    id: orderId,
                }
            }).then(function (res) {
                var parent =  $(obj).attr("hidden","hidden");
                parent.prev().removeAttr("hidden");
                location.reload();
            })
        }

        function paymentChange(obj)
        {
            var status = $(obj).attr('data-value');
            var orderId = $(obj).attr('data-id');
            var selected =  $(obj).children("option:selected").val();
            $.ajax({
                type: 'POST',
                url: '{{ route('orders.updatePayment') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    payment_status: selected,
                    id: orderId,
                }
            }).then(function (res) {
                var parent =  $(obj).attr("hidden","hidden");
                parent.prev().removeAttr("hidden");
                location.reload();
            })
        }
    </script>
@endsection


@extends('layout7')
@section('content')

    <main class="page shopping-cart-page" style="height: 100%;">
        <section class="clean-block clean-cart dark" style="padding-top: 50px;height: 150%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xl-3" style="background-color: #ffffff;margin: 0px 10px;min-height: 30rem;">
                        <div></div>
                        <h3 style="margin-top: 20px;margin-right: 20px;margin-left: 20px;color: rgb(6,98,59);">Tài Khoản</h3>
                        <hr style="margin: 16px 20px;"><button class="btn dsthongtin thongtin" type="button" style="margin-left: 20px;"><a href="{{URL::to('/user',Auth::user()->id)}}"><span>Thông tin tài khoản</span></a></button>
                        <hr style="margin: 5px 20px;"><button class="btn dsthongtin suathongtin" type="button" style="margin-left: 20px;"><a href="{{URL::to('/edit-user')}}">Chỉnh sửa thông tin</a></button>
                        <hr style="margin: 5px 20px;"><button class="btn dsthongtin list-group-item-success" type="button" style="margin-left: 20px;"><a href="{{URL::to('/order-placed',Auth::user()->id)}}">Đơn hàng đã đặt</a></button></div>
                    @foreach($transaction as $t)
                    <div class="col" style="background-color: rgba(255,255,255,0);padding: 0px 0px;">
                        <div style="background-color: #ffffff;padding: 20px;margin-bottom: 20px;">

                            <h3 style="margin-left: 20px;color: rgb(6,98,59);">Chi tiết đơn hàng #{{$t->id}}</h3>

                        </div>
                        <div class="d-flex" style="margin: 0px;">
                            <div style="background-color: #ffffff;padding: 10px;margin-right: 5px;max-width: 50%;width: 50%;">
                                <h3 style="margin-left: 20px;color: rgb(6,98,59);">{{$t->tr_name}}</h3>
                                <hr>
                                <div style="margin: 10px;background-color: rgba(216,255,218,0);">
                                    <div class="row" style="margin: 0px 0px;">
                                        <div class="col-3" style="height: auto;">
                                            <h5 class="left">Địa chỉ:</h5>
                                        </div>
                                        <div class="col-9">
                                            <h6><strong>{{$t->tr_address}}</strong></h6>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 0px 0px;">
                                        <div class="col-3" style="height: auto;">
                                            <h5 class="left">Điện thoại:</h5>
                                        </div>
                                        <div class="col-9">
                                            <h5><strong>{{$t->tr_phone}}</strong></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div style="background-color: #ffffff;padding: 15px;margin-left: 5px;width: 50%;">
                                <h4 style="margin-left: 20px;">Hình thức thanh toán</h4>
                                <hr>
                                <div style="margin: 20px;background-color: rgba(216,255,218,0);">
                                    <div style="margin: 0px 0px;">
                                        <div style="height: auto;">
                                            <h5 class="left">Thanh toán khi nhận hàng</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="background-color: #ffffff;padding: 20px;margin-bottom: 20px;margin-top: 20px;">
                            <div class="border-success d-flex flex-row items" style="padding: 10px 5px;margin: 5px 0px;">
                                <div class="d-xl-flex justify-content-start align-items-center justify-content-xl-start col-sm-7" style="padding: 0px 35px;">
                                    <h5><b>Sản phẩm</b></h5>
                                </div>
                                <div class="d-flex justify-content-center align-items-center justify-content-xl-start col-sm-2" style="padding: 0px 25px;">
                                    <h5 class="text-center"><b>Giá tiền</b></h5>
                                </div>
                                <div class="d-flex justify-content-center align-items-center col-sm-1">
                                    <h5 class="text-center"><b>Số lượng</b></h5>
                                </div>
                                <div class="d-flex justify-content-center align-items-center justify-content-xl-center col-sm-2" style="padding: 0px 25px;">
                                    <h5 class="text-center"><b>Tổng tiền</b></h5>
                                </div>
                            </div>
                            <hr>
                            @foreach($order_by_id as $order)
                            <div class="border-success d-flex flex-row items" style="padding: 10px 5px;margin: 5px 0px;">
                                <div class="d-xl-flex justify-content-start align-items-center justify-content-xl-start col-sm-7" style="padding: 0px 35px;padding-left: 0px;">
                                    <div class="col-sm-4"><img class="img-fluid" src="{{URL::to('/public/uploads/product/',$order->product_image_link)}}" alt="sanpham" height="70" width="70px"></div>
                                    <div class="col-sm-8">
                                        <h4 class="text-left" id="namebook">{{$order->product_name}}</h4>
                                        <div><span style="font-size: 12px;margin-right: 10px;"><b>Nguồn:</b></span><span style="font-size: 12px;">{{$order->product_source}}</span></div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center justify-content-xl-start col-sm-2" style="padding: 0px 25px;">
                                    <h6 class="text-center">{{number_format($order->or_price).' '.'VNĐ'}}</h6>
                                </div>
                                <div class="d-flex justify-content-center align-items-center col-sm-1">
                                    <h6 class="text-center">x {{$order->or_qty}}</h6>
                                </div>
                                <div class="d-flex justify-content-center align-items-center justify-content-xl-center col-sm-2" style="padding: 0px 25px;">
                                    <h6 class="text-center"><?php
                                        $subtotal = ($order->or_price*$order->or_qty);
                                        echo number_format($subtotal).' '.'VNĐ';
                                        ?></h6>
                                </div>
                            </div>
                            @endforeach
                            <hr>
                            <div class="d-flex flex-column align-items-end" style="padding: 10px;padding-top: 0px;padding-bottom: 0px;">
                                <div class="d-flex flex-row justify-content-between" style="min-width: 40%;max-width: 70%;">
                                    <h5 style="margin-bottom: 5px;margin-top: 5px;margin-right: 0px;">Tổng tiền hàng</h5>
                                    <h5 style="margin-top: 5px;margin-bottom: 5px;">{{number_format($order->tr_total).' '.'VNĐ'}}<br></h5>
                                </div>
                                <div class="d-flex flex-row justify-content-between" style="min-width: 40%;max-width: 70%;">
                                    <h5 style="margin-bottom: 5px;margin-top: 5px;margin-right: 0px;">Phí vận chuyển</h5>
                                    <h5 style="margin-top: 5px;margin-bottom: 5px;">Free<br></h5>
                                </div>
                                <div class="d-flex flex-row justify-content-between" style="min-width: 40%;max-width: 70%;">
                                    <h4 style="margin-bottom: 5px;margin-top: 5px;margin-right: 0px;">Tổng thanh toán</h4>
                                    <h3 id="tongtien" style="margin-top: 5px;margin-bottom: 5px;">&nbsp; {{number_format($order->tr_total).' '.'VNĐ'}}<br></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
    @endsection

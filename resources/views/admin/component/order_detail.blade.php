@extends('admin_layout')
@section('content')
    <div id="layoutSidenav_content">
        <main>

            <div class="container-fluid">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{URL::to('/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{URL::to('/order-product')}}">Đơn hàng</a></li>
                    @foreach($transaction as $t)
                    <li class="breadcrumb-item active">Chi tiết đơn hàng #{{$t->id}}</li>
                        @endforeach
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order_by_id as $m)
                                    <tr>

                                        <td>#{{$m->id}}</td>
                                        <td>{{$m->product_name}}</td>
                                        <td><img class="img-fluid" src="{{URL::to('/public/uploads/product/'.$m->product_image_link)}}" alt="sanpham" height="50px" width="70px"></td>
                                        <td>x {{$m->or_qty}}</td>
                                        <td>{{number_format($m->or_price).' '.'VNĐ'}}</td>
                                        <td>
                                            <?php
                                            $subtotal = ($m->or_price*$m->or_qty);
                                            echo number_format($subtotal).' '.'VNĐ';
                                            ?>
                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-3" >
                        <div style="text-align: right">

                            <h4 ><span>Thành tiền: </span><span>{{number_format($m->tr_total).' '.'VNĐ'}}</span></h4>
                        </div>
                    </div>
                </div>

            </div>

        </main>


    @endsection
    <!--
@extends('layout5')
@section('content')


    <div id="danhsachsanpham" class="items" style="padding: 5px 15px;background-color: #ffffff;">
            @foreach($order_by_id as $m)
            <div class="border rounded border-success d-flex flex-row items" style="padding: 10px 5px;margin: 5px 0px;">
                <div class="d-xl-flex justify-content-start align-items-center justify-content-xl-start col-sm-5" style="padding: 0px 35px;">
                    <div class="col-sm-4"><img class="img-fluid" src="{{URL::to('/public/uploads/product/'.$m->product_image_link)}}" alt="sanpham" width="100px"></div>
                    <div class="col-sm-8">
                        <h4 class="text-left" id="namebook">{{$m->product_name}}</h4>
                        <div><span style="font-size: 12px;margin-right: 10px;">ID:</span><span style="font-size: 12px;">{{$m->id}}</span></div>

                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center justify-content-xl-start col-sm-2" style="padding: 0px 25px;">
                    <h6 class="text-center">
                        {{number_format($m->or_price).' '.'VNĐ'}}
                    </h6>
                </div>

                <div style="max-width: 10%;">

                        <input  style="margin-top: 20px" type="number" id="number" class="form-control quantity-input" name="cart_quatity" value="{{$m->or_qty}}" min="1">
                        <input type="hidden" value="" name="rowId_cart" class="form-control">
                        <input type="hidden" value="Cập nhật" name="update_qty">
                </div>

                <div class="d-flex justify-content-center align-items-center justify-content-xl-center col-sm-3" style="padding: 0px 25px;">
                    <h6 class="text-center">
                        <?php
                        $subtotal = ($m->or_price*$m->or_qty);
                        echo number_format($subtotal).' '.'VNĐ';
                        ?>
                    </h6>
                </div>

            </div>
        @endforeach
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="summary" style="padding: 20px;margin-left: 5px;">

                        <h4><span class="text">Thành tiền: </span><span class="price">{{number_format($m->tr_total).' '.'VNĐ'}}</span></h4></div>
                </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
-->



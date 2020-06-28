@extends('layout2')
@section('content')

<?php
$content = Cart::content();
?>
@if(Cart::count() == 0)
    <span style="color: red">Giỏ hàng hiện tại chưa có sản phẩm nào</span>
@else

    <div id="danhsachsanpham" class="items" style="padding: 5px 15px;background-color: #ffffff;">
        @foreach ($content as $key=>$v_content)
            <div class="border rounded border-success d-flex flex-row items" style="padding: 10px 5px;margin: 5px 0px;">
                <div class="d-xl-flex justify-content-start align-items-center justify-content-xl-start col-sm-5" style="padding: 0px 35px;">
                    <div class="col-sm-4"><img class="img-fluid" src="{{URL::to('/public/uploads/product/'.$v_content->options->image)}}" alt="sanpham" width="100px"></div>
                    <div class="col-sm-8">
                        <h4 class="text-left" id="namebook">{{$v_content->name}}</h4>
                        <div><span style="font-size: 12px;margin-right: 10px;">ID:</span><span style="font-size: 12px;">{{$v_content->id}}</span></div>

                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center justify-content-xl-start col-sm-2" style="padding: 0px 25px;">
                    <h6 class="text-center">
                        {{number_format($v_content->price).' '.'VNĐ'}}
                    </h6>
                </div>

                <div style="max-width: 10%;">
                    <form action="{{URL::to('/update-cart-quatity')}}" method="POST">
                        {{ csrf_field() }}

                        <input style="margin-top: 40px" type="number" id="number" class="form-control quantity-input" name="cart_quatity" value="{{$v_content->qty}}" min="1">

                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                        <input style="margin-top: 5px" class="btn btn-secondary" type="hidden" value="Cập nhật" name="update_qty">
                    </form>
                </div>

                <div class="d-flex justify-content-center align-items-center justify-content-xl-center col-sm-3" style="padding: 0px 25px;">
                    <h6 class="text-center">
                        <?php
                        $subtotal = ($v_content->price*$v_content->qty);
                        echo number_format($subtotal).' '.'VNĐ';
                        ?>
                    </h6>
                </div>
                <div class="d-flex justify-content-center align-items-center col-sm-1">
                    <h6 class="text-center text-danger">
                        <a onclick="return confirm('Bạn có chắc muốn xóa khỏi giỏ hàng không?')" href="{{URL::to('/detele-to-cart',$v_content->rowId)}}" style="color:red" class="fa fa-trash-o" > Xóa</a>
                    </h6>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    <div class="col-md-12 col-lg-4 col-xl-3">
        <div class="summary" style="padding: 20px;margin-left: 5px;">
            <h3>Summary</h3>
            <h4><span class="text">Tổng</span><span class="price">{{(Cart::subtotal()).' '.'VNĐ'}}</span></h4>
            <h4><span class="text">Phí vận chuyển</span><span class="price">
                Free
            </span></h4>
            <h4><span class="text">Thành tiền</span><span class="price">
                {{(Cart::subtotal()).' '.'VNĐ'}}
            </span></h4><a class="btn btn-primary btn-block btn-lg" role="button" href="{{route('get.form.pay')}}" style="margin-top: 20px;max-width: 100%;width: 100%;">Thanh toán</a></div>
    </div>
    </div>
    </div>
    </div>
@endif


@endsection

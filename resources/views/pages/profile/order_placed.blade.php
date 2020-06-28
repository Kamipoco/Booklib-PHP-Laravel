@extends('layout')
@section('content')

    <main class="page shopping-cart-page" style="height: 100%;">
        <section class="clean-block clean-cart dark" style="padding-top: 50px;height: 100%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xl-3" style="background-color: #ffffff;margin: 0px 10px;min-height: 30rem;">
                        <div></div>
                        <h3 style="margin-top: 20px;margin-right: 20px;margin-left: 20px;color: rgb(6,98,59);">Tài Khoản</h3>
                        <hr style="margin: 16px 20px;"><button class="btn dsthongtin thongtin" type="button" style="margin-left: 20px;"><a href="{{URL::to('/user',Auth::user()->id)}}"><span>Thông tin tài khoản</span></a></button>
                        <hr style="margin: 5px 20px;"><button class="btn dsthongtin suathongtin" type="button" style="margin-left: 20px;"><a href="{{URL::to('/edit-user')}}">Chỉnh sửa thông tin</a></button>
                        <hr style="margin: 5px 20px;"><button class="btn dsthongtin list-group-item-success" type="button" style="margin-left: 20px;"><a href="{{URL::to('/order-placed',Auth::user()->id)}}">Đơn hàng đã đặt</a></button></div>
                    <div class="col-xl-8" style="background-color: rgba(255,255,255,0);padding: 0px 0px;">
                        <div style="background-color: #ffffff;padding: 20px;margin-bottom: 20px;">
                            <h3 style="margin-left: 20px;color: rgb(6,98,59);">Thông tin các đơn hàng</h3>
                            <hr>
                            @if(count($order_by_id) ==0)
                                <span style="color: red">Bạn chưa có bất kì đơn hàng nào trong cửa hàng</span>
                            @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="madonhang">Mã đơn hàng</th>
                                        <th class="ngaymua">Ngày mua</th>
                                        <th class="tongtien">Tổng tiền</th>
                                        <th class="trangthai">Trạng thái</th>
                                        <th class="thaotac">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order_by_id as $value)
                                    <tr>
                                        <td class="madonhang">#{{$value->id}}</td>
                                        <td class="ngaymua">{{$value->created_at}}<br></td>
                                        <td class="tongtien">{{number_format($value->tr_total).' '.'VNĐ'}}</td>
                                        <td class="trangthai">
                                            @if($value->tr_status == 1)
                                                <a href="#" class="badge badge-success">Đã nhận</a>
                                            @else
                                                <a href="#" class="badge badge-secondary">Đang chờ xử lí</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a  class="btn_customer_action js_order_item"  href="{{URL::to('/view-order',$value->id)}}">Xem chi tiết</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                                @endif
                        </div>
                        {!! $order_by_id->links() !!}
                    </div>
                </div>
            </div>

        </section>
    </main>

    @endsection

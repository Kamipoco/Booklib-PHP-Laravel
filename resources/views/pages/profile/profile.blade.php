@extends('layout')
@section('content')


<main class="page shopping-cart-page" style="height: 100%;">
    <section class="clean-block clean-cart dark" style="padding-top: 50px;height: 100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-3" style="background-color: #ffffff;margin: 0px 10px;min-height: 30rem;">
                    <div></div>
                    <h3 style="margin-top: 20px;margin-right: 20px;margin-left: 20px;color: rgb(6,98,59);">Tài Khoản</h3>
                    <hr style="margin: 16px 20px;"><button class="btn dsthongtin thongtin list-group-item-success" type="button" style="margin-left: 20px;"><a href="{{URL::to('/user/{id}')}}">Thông tin tài khoản</a></button>
                    <hr style="margin: 5px 20px;"><button class="btn dsthongtin suathongtin " type="button" style="margin-left: 20px;"><a href="{{URL::to('/edit-user')}}">Chỉnh sửa thông tin</a></button>
                    <hr style="margin: 5px 20px;"><button class="btn dsthongtin" type="button" style="margin-left: 20px;"><a href="{{URL::to('/order-placed',Auth::user()->id)}}">Đơn hàng đã đặt</a></button></div>
                <div class="col" style="background-color: rgba(255,255,255,0);padding: 0px 0px;">
                    <div style="background-color: #ffffff;padding: 20px;margin-bottom: 20px;">
                        <h3 style="margin-left: 20px;color: rgb(6,98,59);">Thông tin Tài Khoản</h3>
                        <hr>
                        <div style="margin: 20px;padding: 20px;background-color: #d8ffda;">
                            <div class="row" style="margin: 0px 0px;">
                                <div class="col-3" style="height: auto;">
                                    <h5 class="left">Họ và tên:</h5>
                                </div>
                                <div class="col-9">
                                    <h5 class="right">{{$user['name']}}</h5>
                                </div>
                            </div>
                            <div class="row" style="margin: 0px 0px;">
                                <div class="col-3" style="height: auto;">
                                    <h5 class="left">Ngày sinh:</h5>
                                </div>
                                <div class="col-9">
                                    <h5 class="right">{{$user['date_of_birth']}}</h5>
                                </div>
                            </div>
                            <div class="row" style="margin: 0px 0px;">
                                <div class="col-3" style="height: auto;">
                                    <h5 class="left">Số điện thoại:</h5>
                                </div>
                                <div class="col-9">
                                    <h5 class="right">0{{$user['phone']}}</h5>
                                </div>
                            </div>
                            <div class="row" style="margin: 0px 0px;">
                                <div class="col-3" style="height: auto;">
                                    <h5 class="left">Email:</h5>
                                </div>
                                <div class="col-9">
                                    <h5 class="right">{{$user['email']}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="background-color: #ffffff;padding: 20px;margin-bottom: 20px;">
                        <h3 style="margin-left: 20px;color: rgb(6,98,59);">Sổ địa chỉ</h3>
                        <hr>
                        <div style="margin: 20px;background-color: rgba(216,255,218,0);">
                            <div class="row" style="margin: 0px 0px;">
                                <div class="col-3" style="height: auto;">
                                    <h5 class="left">Địa chỉ hiện tại:</h5>
                                </div>
                                <div class="col-9">
                                    <h5 class="right"><strong>{{$user['address']}}</strong></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
    @endsection

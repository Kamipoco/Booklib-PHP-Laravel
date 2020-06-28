@extends('layout')
@section('content')

<main class="page shopping-cart-page">
    <section class="clean-block clean-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Chỉnh sửa thông tin</h2>
            </div>

            <div class="border rounded content" style="margin-top: 45px;">
                <div class="row no-gutters">
                    <div class="col-xl-3" style="padding: 0px;">
                        <div style="padding: 20px;">
                            <ul class="list-group border rounded border-primary">
                                <li class="list-group-item"><a href="{{URL::to('/user',Auth::user()->id)}}"><span>Thông tin tài khoản</span></a></li>
                                <li class="list-group-item list-group-item-success"><a href="{{URL::to('/edit-user')}}"><strong><span class="text-success">Chỉnh sửa thông tin</span></strong></a></li>
                                <li class="list-group-item"><a href="{{URL::to('/order-placed',Auth::user()->id)}}">Đơn hàng đã đặt</a></li>
                            </ul>
                        </div>
                    </div>



                    <div class="col">
                        <div style="padding: 20px;">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        <li>{{$err}}</li>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{route('user.update')}}" method="post" class="border rounded border-success" style="padding: 20px;">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group col-md-6"><label for="inputFirstName">Họ Tên</label><input class="form-control" value="{{$user['name']}}" name="name" type="text" id="inputFirstName" ></div>
                                    <div class="form-group col-md-6"><label for="inputFirstName">SĐT</label><input class="form-control" name="phone" value="{{'0'.$user['phone']}}" type="text" ></div>
                                </div>
                                <div class="form-group"><label for="email">Email</label><input class="form-control is-valid" name="email" value="{{$user['email']}}" type="email" id="email"></div>
                                <div class="form-group"><label for="password">Ngày sinh</label><input class="form-control" value="{{$user['date_of_birth']}}" name="date_of_birth" type="date"></div>
                                <div class="form-row">
                                    <div class="form-group col-md-12"><label>Địa chỉ</label><input class="form-control" name="address" value="{{$user['address']}}" type="text"></div>
                                    <!--
                                    <div class="form-group col-md-6"><label for="password2">Password Again</label><input class="form-control" type="password" id="pasword2"></div>
                                    -->
                                </div>
                                <div class="d-flex flex-row-reverse"><button class="btn btn-success" type="submit" style="min-width: 30%;">Save</button></div>
                            </form>
                            <!--
                            <form class="border rounded border-success" style="padding: 20px;margin-top: 30px;">
                                <div class="form-row">
                                    <div class="form-group col-md-6"><label for="inputFirstName">Họ</label><input class="form-control" type="text" id="inputFirstName" placeholder="Nguyễn Văn"></div>
                                    <div class="form-group col-md-6"><label for="inputlastName">Tên</label><input class="form-control" type="text" id="inputLastName" placeholder="Anh"></div>
                                </div>
                                <div class="form-group"><label for="inputFirstName">Số điện thoại</label><input class="form-control" type="tel"></div>
                                <div class="form-group"><label for="inputFirstName">Địa chỉ nhà</label><input class="form-control" type="text"></div>
                                <div class="form-row">
                                    <div class="form-group col-md-4"><label for="inputFirstName">Xã/Phường</label><input class="form-control" type="text" id="inputFirstName" placeholder="Tân Chánh Hiệp"></div>
                                    <div class="form-group col-md-4"><label for="inputlastName">Huyện/Quận</label><input class="form-control" type="text" id="inputLastName" placeholder="Quận 12"></div>
                                    <div class="form-group col-md-4"><label for="inputlastName">Tỉnh/Thành Phố</label><input class="form-control" type="text" id="inputLastName" placeholder="TP. Hồ Chí Minh"></div>
                                </div>
                                <div class="d-flex flex-row-reverse"><button class="btn btn-success" type="submit" style="min-width: 30%;">Save</button></div>
                            </form>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

    @endsection

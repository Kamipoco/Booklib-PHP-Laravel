@extends('layout')
@section('content')
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">

                @if(Session::has('thanhcong'))
                    <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                    @endif

                <div class="block-heading">
                    <h2 class="text-info">Đăng kí thành viên</h2>
                </div>
                <form action="{{ route('post.register') }}" class="login" method="post">
                    {{ csrf_field() }}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('flag'))
                        <div class="alert alert-{{Session::get('flag')}}">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <!--
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}
                            @endforeach
                        </div>
                    @endif
                    -->

                        <div class="form-group"><label for="name">Họ Tên</label><input class="form-control item" name="name" type="text" id="name" ></div>
                    <div class="form-group"><label for="email">Email</label><input class="form-control item" name="email" type="email" id="email" ></div>
                    <div class="form-group"><label for="password">Mật khẩu</label><input class="form-control item" name="password" type="password" id="password"></div>
                    <div class="form-group"><label for="password">Nhập lại mật khẩu</label><input class="form-control item" name="re_password" type="password" id="password"></div>
                    <div class="form-group"><label for="password">Ngày sinh</label><input class="form-control" name="date_of_birth" type="date"></div>
                    <div class="form-group"><label for="name">Địa chỉ</label><input class="form-control item" name="address" type="text" ></div>
                    <div class="form-group"><label for="phone">Số điện thoại</label><input class="form-control" name="phone" type="tel" id="phone"></div><button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                </form>
            </div>
        </section>
    </main>
    @endsection

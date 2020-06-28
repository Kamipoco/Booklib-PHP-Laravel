@extends('layout4')
@section('content')
    <div class="contact-clean" style="padding: 0px;padding-top: 200px;padding-bottom: 200px;height: 100%;">
        <div class="row">
            <div class="col-4"></div>
            <div class="text-center col-4" style="background-color: #ffffff;padding: 20px;"><img src="{{asset('public/frontend/img/ui%20(2).png')}}" style="margin: 20px;">
                <h2 style="color: rgb(0,187,108);">Thành công!</h2>
                <h5 style="font-weight: 600;">Cám ơn quý khách đã đặt hàng tại BookLib!</h5>
                <h6>Chúng tôi sẽ&nbsp; liên hệ quý khách để xác nhận đơn hàng trong thời gian sớm nhất!</h6>
                <h5 style="font-weight: 600;">Xin chân thành cảm ơn!</h5>
                <hr><a class="tieptuc" href="{{route('home')}}">Tiếp tục mua hàng</a></div>
            <div class="col-4"></div>
        </div>
    </div>
    @endsection

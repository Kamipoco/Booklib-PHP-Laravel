@extends('layout')
@section('content')

    <div class="contact-clean" style="padding: 0px;padding-top: 200px;padding-bottom: 200px;">

        <form action="" method="post">
            {{ csrf_field() }}
            @if(Session::has('thanhcong'))
                <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
            @endif
            <h2 class="text-center">Điền thông tin liên hệ</h2>
            <label>Họ và tên</label>
            <div class="form-group"><input class="form-control" type="text" name="c_name" required></div>
            <label>Email<sup>*</sup></label>
            <div class="form-group"><input class="form-control" type="email" name="c_email" required></div>
            <label>Tiêu đề</label>
            <div class="form-group"><input class="form-control" type="title" name="c_title" required></div>
            <hr>
            <label>Nội dung<sup>*</sup></label>
            <div class="form-group"><textarea class="form-control" name="c_content" placeholder="Message" rows="14" required></textarea></div>
            <div class="form-group"><button class="btn btn-primary" type="submit">send </button></div>
        </form>
    </div>

    @endsection

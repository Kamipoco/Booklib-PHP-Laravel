@extends('layout')
@section('content')

<main class="page registration-page">
<div class="contact-clean">

    <form method="post">
        {{ csrf_field() }}
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            </div>
        @endif
        <h2 class="text-center">Reset Password</h2>
        @if(Session::has('flag'))
            <div class="alert alert-{{Session::get('flag')}}">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="form-group"><label for="password">Mật khẩu mới</label><input class="form-control item" name="password" type="password" id="email"></div>
        <div class="form-group"><label for="password">Xác nhận mật khẩu</label><input class="form-control item" name="password_confirm" type="password" id="password_confirm"></div>

        <div class="form-group d-flex"><button class="btn btn-primary" type="submit" style="width: 100%;">send </button></div>
    </form>
</div>
</main>
    @endsection

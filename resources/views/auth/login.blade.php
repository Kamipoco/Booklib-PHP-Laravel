@extends('layout')
@section('content')

    <div class="login-clean">

        <form method="post" action="{{route('post.login')}}">
            {{ csrf_field() }}

            <h2 class="sr-only">Login Form</h2>
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
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block"  name="login" type="submit">Log In</button></div><a class="forgot" href="{{ route('get.reset.password') }}">Forgot password?</a>
        </form>
    </div>

    @endsection

@extends('layout4')
@section('content')

    <main class="page registration-page"></main>
    <div class="contact-clean">

        <form method="post">
            {{ csrf_field() }}

            <h3 class="text-center">Nhập vào Email của bạn</h3><br>
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
            <div class="form-group"><input class="form-control is-invalid" type="email" name="email" placeholder="nguyenvana@gmail.com"></div>
            <div class="form-group d-flex"><button class="btn btn-primary" type="submit" style="width: 100%;">send </button></div>
        </form>
    </div>

@endsection

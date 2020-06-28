<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BookLib</title>
    <link rel="icon" href="https://cdn0.fahasa.com/media/favicon/default/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="https://cdn0.fahasa.com/media/favicon/default/favicon.ico" type="image/x-icon" />
    <link rel="icon" type="image/svg+xml" sizes="45x48" href="{{asset('public/frontend/img/star.svg')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="{{asset('public/frontend/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/Contact-Form-Clean.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/Login-Form-Clean.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/Navbar---Apple-1.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/Navbar---Apple.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/Navigation-with-Search.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/Simple-Slider.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/smoothproducts.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/Topbar.css')}}">
</head>

<body>
<nav class="navbar navbar-light navbar-expand-md" style="background-color: #06623b;height: 30px;padding: 0px;">
    <div class="container-fluid">
        <div style="padding: 0px;"><a href="{{route('home')}}" style="color: rgb(255,255,255);font-size: 12px;padding: 7px 10px;">Trang Chủ</a><a href="{{route('get.introduction')}}" style="color: rgb(255,255,255);font-size: 12px;padding: 7px 10px;">Giới thiệu</a><a href="{{route('get.contact')}}" style="color: rgb(255,255,255);font-size: 12px;padding: 7px 10px;">Liên hệ</a></div>
        <div style="padding: 0px;">
            @if(Auth::check())
                <a href="{{route('user.profile',Auth::user()->id)}}" style="color: rgb(255,255,255);font-size: 13px;padding: 7px 10px;"><i class="fa fa-user" aria-hidden="true"> {{Auth::user()->name}}</i></a>
                <a class="fa fa-sign-out" aria-hidden="true" href="{{route('get.logout.user')}}" style="color: white;font-size: 13px;padding: 7px 10px;"> Đăng xuất</a>
            @else
                <a class="fa fa-unlock-alt header-item" href="{{ route('get.login') }}" style="color: rgb(255,255,255);font-size: 13px;padding: 7px 10px;"> Đăng Nhập</a> |
                <a class="fa fa-pencil-square-o header-item" href="{{ route('get.register') }}" style="color: rgb(255,255,255);font-size: 13px;padding: 7px 10px;"> Đăng Ký</a>
            @endif
        </div>
    </div>
</nav>
<nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="background-color: t;">
    <div class="container"><a class="navbar-brand" style="letter-spacing: 5px;font-size: 25px;color: #21bf73;" href="{{route('home')}}">BookLib</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div
            class="collapse navbar-collapse" id="navcol-1">

            <div></div>
            <!--
            @if(Auth::check())
                <div class="d-flex flex-row align-items-start"><a class="btn btn-light action-button" role="button" href="{{URL::to('/show-cart')}}" style="background-color: #21bf73;">Cart</a><span id="numcart" style="color: rgb(255,0,0);font-size: 20px;">{{ Cart::count() }}</span></div>
            @endif
            -->
            <div>
                <div class="nav-item dropdown"></div>
            </div>
        </div>
    </div>

</nav>

@yield('content')

<!-- footer  -->
<footer class="page-footer dark">
    <div class="footer-copyright">
        <p>© 2020 BoobLib</p>
    </div>
</footer>
<script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('public/frontend/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="{{asset('public/frontend/js/smoothproducts.min.js')}}"></script>
<script src="{{asset('public/frontend/js/theme.js')}}"></script>
<script src="{{asset('public/frontend/js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
<script src="{{asset('public/frontend/js/Navbar---Apple.js')}}"></script>
<script src="{{asset('public/frontend/js/Simple-Slider.js')}}"></script>
</body>

</html>
<script>
    $(function () {
        $('.orderby').change(function () {
            $("#form_order").submit();
        })
    })
</script>

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
            <form action="{{URL::to('/tim-kiem')}}" method="POST" class="form-inline mr-auto" target="_self" style="width: 100%;margin-left: 60px;">
                {{ csrf_field()}}
                <div class="form-group" style="width: 100%;">
                    <!--
                    <label for="search-field"><i class="fa fa-search" style="font-size: 26px;color: #21bf73;"></i></label>
                    -->
                    <input class="border rounded border-success form-control search-field" type="text"
                           id="search-field" name="keywords_submit" placeholder="Tìm kiếm" style="margin-left: 10px;height: 32px;width: 80%;">
                    <button style="border: none;background-color: white" for="search-field"><i type="submit" value="Search" class="fa fa-search" style="font-size: 26px;color: #21bf73;"></i></button>
                    <!--
                    <label for="search-field"><i type="submit" value="Search" class="fa fa-search" style="font-size: 26px;color: #21bf73;"></i></label>

                     <input type="submit" class="search_items" value="Search">
                    -->

                </div>
            </form>
            <div></div>

                <!--
                <div class="d-flex flex-row align-items-start"><a class="btn btn-light action-button" role="button" href="{{URL::to('/show-cart')}}" style="background-color: #21bf73;">Cart</a><span id="numcart" style="color: rgb(255,0,0);font-size: 20px;">{{ Cart::count() }}</span></div>
                -->
                    <div class="header-cart" style="display: block">
                        <a href="{{URL::to('/show-cart')}}">
                            <img src="{{asset('public/frontend/img/giohang.png')}}" height="30" width="30">
                            <span class="circle" id="numcart">{{ Cart::count() }}</span>
                            <p style="display: inline-block" class="hidden-xs hidden-sm text-cart">Giỏ hàng</p>
                        </a>
                    </div>

            <div>
                <div class="nav-item dropdown"></div>
            </div>
        </div>
    </div>
</nav>
<main class="page shopping-cart-page">
    <section class="clean-block clean-cart dark">
        <div class="container" style="max-width: 90%;"><div class="block-heading" style="padding: 20px 0px 0px 0px">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="max-height: 300px">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('public/frontend/img/banner/banner1.jpg')}}" alt="First slide" style="max-height: 300px">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('public/frontend/img/banner/banner2.jpg')}}" alt="Second slide" style="max-height: 300px">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('public/frontend/img/banner/banner3.jpg')}}" alt="Third slide" style="max-height: 300px">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="shadow-none content" style="background-color: rgba(255,255,255,0);">
                <div class="row no-gutters">
                    <div class="col-md-12 col-lg-8 col-xl-9" style="background-color: rgba(255,255,255,0);padding: 0px;">
                        <div class="d-flex flex-row items" id="chuthich" style="padding: 10px 5px;background-color: #ffffff;margin-bottom: 10px;">
                            <div class="d-xl-flex justify-content-start align-items-center justify-content-xl-start col-sm-5" style="padding: 0px 35px;">
                                <h6 class="text-center text-info chuthich">Sản Phẩm</h6>
                            </div>
                            <div class="d-flex justify-content-center align-items-center justify-content-xl-start col-sm-2" style="padding: 0px 25px;">
                                <h6 class="text-center text-info chuthich">Đơn Giá</h6>
                            </div>
                            <div class="d-flex justify-content-center align-items-center col-sm-1">
                                <h6 class="text-center text-info chuthich">Số Lượng</h6>
                            </div>
                            <div class="d-flex justify-content-center align-items-center justify-content-xl-center col-sm-3" style="padding: 0px 25px;">
                                <h6 class="text-center text-info chuthich">Thành tiền</h6>
                            </div>
                            <div class="d-flex justify-content-center align-items-center col-sm-1">
                                <h6 class="text-center text-info chuthich">Thao Tác</h6>
                            </div>
                        </div>
                        @yield('content')

    </section>
</main>
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

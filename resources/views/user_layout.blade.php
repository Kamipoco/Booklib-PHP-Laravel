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
    <link rel="stylesheet" href="{{asset('public/frontend/fonts/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/Contact-Form-Clean.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/Login-Form-Clean.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/Navigation-with-Search.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/Simple-Slider.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/smoothproducts.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><a class="navbar-brand" href="{{route('home')}}" style="letter-spacing: 5px;font-size: 25px;color: #21bf73;">BookLib</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div
            class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <!-- user dropdown -->
                <div>
                    <li class="nav-item dropdown" style="list-style: none;">
                        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            @if(Auth::check())
                                <a class="dropdown-item" style="background-color: dodgerblue" style="color: white" href="{{route('user.profile',Auth::user()->id)}}">{{Auth::user()->name}}</a>
                                <a class="dropdown-item" href="{{URL::to('admin')}}">Admin Login</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('get.logout.user')}}">Logout</a>
                            @else
                                <a class="dropdown-item" href="{{ route('get.login') }}">Login</a>
                                <a class="dropdown-item" href="{{ route('get.register') }}">Register</a>
                                <a class="dropdown-item" href="{{URL::to('admin')}}">Admin Login</a>
                            @endif
                        </div>
                    </li>
                </div>
        </div>
    </div>
</nav>
<main class="page registration-page"></main>

@yield('content')

<!-- footer  -->
<footer class="page-footer dark">
    <div class="footer-copyright">
        <p>© 2020 BookLib</p>
    </div>
</footer>
<script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('public/frontend/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/bs-init.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="{{asset('public/frontend/js/smoothproducts.min.js')}}"></script>
<script src="{{asset('public/frontend/js/theme.js')}}"></script>
<script src="{{asset('public/frontend/js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
<script src="{{asset('public/frontend/js/Simple-Slider.js')}}"></script>
</body>

</html>

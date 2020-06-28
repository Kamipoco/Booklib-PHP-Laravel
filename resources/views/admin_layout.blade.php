<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BookLib - Admin</title>

    <link rel="icon" href="https://cdn0.fahasa.com/media/favicon/default/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="https://cdn0.fahasa.com/media/favicon/default/favicon.ico" type="image/x-icon" />
    <link rel="icon" type="image/svg+xml" sizes="45x48" href="{{asset('public/frontend/img/star.svg')}}">
    <link href="{{asset('public/frontend/css/admin/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/backend/fontawesome/css/all.css')}}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="{{URL::to('dasboard')}}">BookLib - ADMIN</a><button
            class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
                <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown" style="list-style: none;">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{URL::to('/logout')}}">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{URL::to('dasboard')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Administration
                        </a>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="{{URL::to('/order-product')}}">
                            <div class="sb-nav-link-icon"><img src="https://img.icons8.com/pastel-glyph/64/000000/purchase-order.png" width="32" height="32"/></div>
                            Đơn Hàng
                        </a>
                        <a class="nav-link" href="{{URL::to('/thanh-vien')}}">
                            <div class="sb-nav-link-icon"><img src="https://img.icons8.com/pastel-glyph/64/000000/gender-neutral-user.png" width="35" height="35"/></div>

                            Thành Viên
                        </a>
                        <a class="nav-link" href="{{URL::to('/all-product')}}">
                            <div class="sb-nav-link-icon"><img src="https://img.icons8.com/pastel-glyph/64/000000/product.png"height="35" width="35"/></div>
                            Sản Phẩm
                        </a>
                        <a class="nav-link" href="{{URL::to('/all-tl-product')}}">
                            <div class="sb-nav-link-icon"><img src="https://img.icons8.com/carbon-copy/100/000000/category.png" width="35" height="35"/></div>
                           Thể Loại
                        </a>
                        <a class="nav-link" href="{{URL::to('/lien-he-admin')}}">
                            <div class="sb-nav-link-icon"><img src="https://img.icons8.com/android/24/000000/contact-card.png" width="33" height="33"/></div>
                            Liên hệ
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
            @yield('admin_content')

            <!-- footer -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">BookLib &copy; My Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{asset('public/frontend/js/scripts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('public/frontend/js/admin/chart-area-demo.js')}}"></script>
    <script src="{{asset('public/frontend/js/admin/chart-bar-demo.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('public/frontend/js/admin/datatables-demo.jss')}}"></script>
</body>

</html>

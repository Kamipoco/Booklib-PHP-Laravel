@extends('admin_layout')
@section('admin_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Sản phẩm</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{URL::to('/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Sản Phẩm</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">Đây là trang quản lí sản phẩm của cửa hàng sách BookLib</a>.</div>
                </div>

                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-align" style="color:forestgreen;">'."&nbsp".$message.'</span>';
                    Session::put('message',null);
                }
                ?>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sách</th>
                        <th>Thể loại</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>
                            <a href="{{URL::to('add-product')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Thêm</a>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($all_product as $key => $category_pro)
                    <tr>
                        <td>#{{$category_pro->product_id}}</td>
                        <td>{{$category_pro->product_name}}</td>
                        <td>{{$category_pro->category_tl}}</td>
                        <td>{{$category_pro->product_price}} VNĐ</td>
                        <td><img src="public/uploads/product/{{$category_pro->product_image_link}}" width="100" height="100"></td>
                        <td>x {{$category_pro->product_amount}}</td>
                        <td>
                            <a href="{{URL::to('edit-product/'.$category_pro->product_id)}}">Sửa</a> | <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="{{URL::to('delete-product/'.$category_pro->product_id)}}" >Xóa</a>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
            <main>
@endsection

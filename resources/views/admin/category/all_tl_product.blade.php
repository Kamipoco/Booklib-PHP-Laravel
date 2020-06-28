@extends('admin_layout')
@section('admin_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liệt kê thể loại</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{URL::to('/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Liệt kê thể loại</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">Đây là trang quản lí thể loại sản phẩm của cửa hàng sách BookLib</a>.</div>
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
                                    <th>Thể loại</th>
                                    <th>Mô tả</th>
                                    <th><a href="{{URL::to('add-tl-product')}}" class="btn btn-primary btn-sm" role="button"
                                           aria-pressed="true">Thêm</a></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($all_tl_product as $key => $cate_tl)
                                    <tr>
                                        <td>{{$cate_tl->category_id}}</td>
                                        <td>{{$cate_tl->category_tl}}</td>
                                        <td>{{$cate_tl->category_desc}}</td>
                                        <td><a href="{{URL::to('/edit-tl-product/'.$cate_tl->category_id)}}">Edit</a> | <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="{{URL::to('/delete-tl-product/'.$cate_tl->category_id)}}">Delete</a></td>
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

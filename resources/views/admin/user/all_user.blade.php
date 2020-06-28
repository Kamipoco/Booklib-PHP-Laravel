@extends('admin_layout')
@section('admin_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Thành viên</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{URL::to('/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Thành viên</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">Đây là trang quản lí thành viên của cửa hàng bán sách mang tên Booklib</a></div>
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
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th><a>Thao tác</a></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($all_user as $all)
                                <tr>
                                    <td>#{{$all->id}}</td>
                                    <td>{{$all->name}}</td>
                                    <td>{{$all->email}}</td>
                                    <td>{{'0'.$all->phone}}</td>
                                    <td>{{$all->address}}</td>
                                    <th><a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="{{URL::to('delete-user/'.$all->id)}}" role="button"
                                           aria-pressed="true">Xóa</a></th>
                                </tr>
                                @endforeach
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Tổng tiền</th>
                                        <th>Ngày</th>
                                        <th><a>Edit</a></th>
                                        <th><a>Delete</a></th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {!! $all_user->links() !!}

        </main>
@endsection

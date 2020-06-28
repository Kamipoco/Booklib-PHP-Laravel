@extends('admin_layout')
@section('admin_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Liên hệ</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{URL::to('/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Liên hệ</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">Đây là trang quản lí những phản hồi của khách hàng của cửa hàng bán sách mang tên Booklib</a></div>
                </div>
                @if(Session::has('thanhcong'))
                    <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                @endif
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
                                    <th>Họ và Tên</th>
                                    <th>Email</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                    <th>Thời điểm liên hệ</th>
                                    <th>
                                        Trạng thái
                                    </th>

                                    <th><a>Thao tác</a></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($all_contact as $all)
                                    <tr>

                                        <td>{{$all->id}}</td>
                                        <td>{{$all->c_name}}</td>
                                        <td>{{$all->c_email}}</td>
                                        <td>{{$all->c_title}}</td>
                                        <td>{{$all->c_content}}</td>
                                        <td>{{$all->created_at}}</td>
                                        <td>
                                                @if($all->c_status == 1)
                                                    <a href="" class="badge badge-success">>Đã xử lý</a>
                                                @else
                                                    <a href="{{route('admin.get.active.contact',$all->id)}}" class="badge badge-secondary">Chờ xử lý</a>
                                                @endif
                                        </td>
                                        <th><a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="{{URL::to('delete-contact/'.$all->id)}}" role="button"
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
        </main>
@endsection

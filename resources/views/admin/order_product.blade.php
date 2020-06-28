@extends('admin_layout')
@section('admin_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Đơn hàng</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{URL::to('/dasboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Đơn hàng</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">Đây là trang quản lí đơn hàng của cửa hàng bán sách mang tên Booklib</div>
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
                                    <th>Tên Khách Hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>SĐT</th>
                                    <th>Nội dung</th>
                                    <th>Thời gian đặt hàng</th>
                                    <th>Trạng thái</th>
                                    <th><a>Thao tác</a></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                <tr>

                                    <td>#{{$transaction->id}}</td>
                                    <td>{{$transaction->tr_name}}</td>
                                    <td>{{$transaction->tr_address}}</td>
                                    <td>{{$transaction->tr_phone}}</td>
                                    <td>{{$transaction->tr_note}}</td>
                                    <td>{{$transaction->created_at}}</td>
                                    <td>
                                        @if($transaction->tr_status == 1)
                                            <a href="" class="badge badge-success">>Đã xử lý</a>
                                        @else
                                            <a href="{{route('admin.get.active.transaction',$transaction->id)}}" class="badge badge-secondary">Chờ xử lý</a>
                                        @endif

                                    </td>
                                    <th>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="{{URL::to('/delete-order/'.$transaction->id)}}" role="button" aria-pressed="true">Xóa</a> |
                                        <a  class="btn_customer_action js_order_item" data-id="{{$transaction->id}}" href="{{route('admin.get.view.order',$transaction->id)}}"><i class="fas fa-eye"></i></a>
                                    </th>

                                </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        {!! $transactions->links() !!}

        <div class="modal fade" data-toggle="modal" data-target="myModal" role="dialog">
            <div class="modal-dialog  modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Chi tiết mã đơn hàng #<b class="transaction_id"></b></h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @stop

@section('script')
                    <script>
                        $(function () {
                            $(".js_order_item").click(function(event){
                                event.preventDefault();
                                let $this = $(this);
                                let url = $this.attr('href');
                                $(".transaction_id").text().text($this.attr('data-id'));

                                $("#myModal").modal('show');
                                console.log(url);
                            });
                        })
                    </script>
                @stop

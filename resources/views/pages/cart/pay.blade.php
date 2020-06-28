@extends('layout')
@section('content')


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <?php
    $content = Cart::content();
    ?>

    <div class="container wrapper">

        <div class="row cart-body">

            <form class="form-horizontal" method="post">
                {{csrf_field()}}
                @if(Session::has('thanhcong'))
                    <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                @endif
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Danh sách sản phẩm <div class="pull-right"><small>
                                    <a class="afix-1" href="{{URL::to('/show-cart')}}">Cập nhật</a>
                                </small></div>
                        </div>
                        <div class="panel-body">
                            @foreach($products as $p)
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="{{URL::to('/public/uploads/product/'.$p->options->image)}}" height="50" width="50" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"><strong>{{$p->name}}</strong></div>
                                    <div class="col-xs-12"><small>Số lượng x <span>{{$p->qty}}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span></span>{{number_format($p->price).' '.'VNĐ'}}</h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            @endforeach
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng</strong>
                                    <div class="pull-right"><span></span><span>{{(Cart::subtotal()).' '.'VNĐ'}}</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small><strong>Phí vận chuyển</strong></small>
                                    <div class="pull-right"><span>
                                            Free
                                        </span></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Thành tiền</strong>
                                    <div class="pull-right"><span></span><span><strong>
                                                {{(Cart::subtotal()).' '.'VNĐ'}}
                                            </strong></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Thông tin thanh toán</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Tên Khách Hàng:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control" value="{{$user['name']}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="{{$user['address']}}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone" class="form-control" value="0{{$user['phone']}}" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                <div class="col-md-12"><input type="text" name="email" class="form-control" value="{{$user['email']}}" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Ghi chú:</strong></div>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="note" cols="30" rows="4"></textarea>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Xác nhận thông tin</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->

                </div>

            </form>
        </div>
        <div class="row cart-footer">

        </div>
    </div>

    @endsection

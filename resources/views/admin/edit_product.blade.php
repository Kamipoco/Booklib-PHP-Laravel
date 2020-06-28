@extends('admin_layout')
@section('admin_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Edit sản phẩm</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Sửa lại sản phẩm cũ trên hệ thống</li>
                </ol>
            </div>


            <!-- here -->
            <div class="themsp" style="padding: 20px; margin: 30px; border: 3px solid #202040; border-radius: 25px;">
                @foreach($edit_product as $key => $edit_pro)
                <form action="{{URL::to('/update-product',$edit_pro->product_id)}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="tensach">Tên sách</label>
                            <input name="product_name" value="{{$edit_pro->product_name}}" type="text" id="tensach" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="theloai">Thể loại</label>
                            <select name="product_category" id="theloai" class="form-control">
                                @foreach($cate_product as $key => $edit_value)
                                    @if($edit_value->category_id == $edit_pro->category_id)
                                    <option selected value="{{$edit_value->category_id}}">{{$edit_value->category_tl}}</option>
                                    @else
                                        <option value="{{$edit_value->category_id}}">{{$edit_value->category_tl}}</option>
                                        @endif
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nguonhang">Nguồn hàng</label>
                            <input name="product_source" value="{{$edit_pro->product_source}}" type="text" id="nguonhang" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="linkanh">Link Ảnh</label>
                            <input name="product_image_link" type="file" id="linkanh" class="form-control" value="{{$edit_pro->product_image_link}}">
                            <img src="{{URL::to('public/uploads/product',$edit_pro->product_image_link)}}" height="100" width="100">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="gia">Giá</label>
                            <input name="product_price" value="{{$edit_pro->product_price}}" type="number" id="gia" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="soluong">Số lượng</label>
                            <input name="product_amount" value="{{$edit_pro->product_amount}}" type="number" id="soluong" class="form-control" min="0">
                        </div>
                    </div>
                    <button name="product_update" type="submit" class="btn btn-primary" style="width: 30%;">Cập nhật</button>
                </form>
                @endforeach
            </div>
        </main>

    @endsection

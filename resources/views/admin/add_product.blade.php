@extends('admin_layout')
@section('admin_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Thêm sản phẩm</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Thêm sản phẩm mới vào hệ thống</li>
                </ol>
            </div>

        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span class="text-align" style="color:forestgreen;">'."&nbsp".$message.'</span>';
            Session::put('message',null);
        }
        ?>

            <!-- here -->
            <div class="themsp" style="padding: 20px; margin: 30px; border: 3px solid #202040; border-radius: 25px;">
                <form action="{{URL::to('save-product')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="tensach">Tên sách</label>
                            <input name="product_name" type="text" id="tensach" class="form-control"
                                   placeholder="Ví dụ như thơ xuân diệu">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="theloai">Thể loại</label>
                            <select name="product_category" id="theloai" class="form-control">
                                @foreach($cate_product as $key => $tl_pro)
                                <option value="{{$tl_pro->category_id}}">{{$tl_pro->category_tl}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nguonhang">Nguồn hàng</label>
                            <input name="product_source" type="text" id="nguonhang" class="form-control" placeholder="NXB Kim Đồng">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="linkanh">Link Ảnh</label>
                            <input name="product_image_link" type="file" id="linkanh" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="gia">Giá</label>
                            <input name="product_price" type="number" id="gia" class="form-control" placeholder="13000" min="1">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="soluong">Số lượng</label>
                            <input name="product_amount" type="number" id="soluong" class="form-control" placeholder="1000" min="1">
                        </div>
                    </div>
                    <button name="add_product" type="submit" class="btn btn-primary" style="width: 30%;">Thêm</button>
                </form>
            </div>
@endsection

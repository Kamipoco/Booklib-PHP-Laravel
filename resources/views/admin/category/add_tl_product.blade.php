@extends('admin_layout')
@section('admin_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Thêm thể loại sản phẩm</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Thêm thể loại sản phẩm mới vào hệ thống</li>
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
                <form action="{{URL::to('/save-tl-product')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="tensach">Thể loại</label>
                            <input name="category_tl" type="text" id="theloai" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="theloai">Mô tả</label>
                            <textarea style="resize: none" rows="8" name="category_desc" class="form-control" id="mo-ta" placeholder="Phần mô tả"></textarea>
                        </div>
                    </div>
                    <button name="add_category" type="submit" class="btn btn-primary" style="width: 30%;">Thêm</button>
                </form>
            </div>
@endsection

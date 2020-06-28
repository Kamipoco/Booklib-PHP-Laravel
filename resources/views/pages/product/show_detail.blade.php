@extends('layout3')
@section('content')

<div class="row">
    @foreach($detail_product as $key => $detail)
    <div class="text-center border rounded-0 col-4" id="anhbia" style="background-color: #ffffff;max-height: 300rem;padding: 15px;"><img src="{{URL::to('/public/uploads/product/',$detail->product_image_link)}}" width="300" height="380"></div>
    <div class="col-8 thongtin" style="padding: 20px;background-color: #ffffff;">
        <div style="max-height: 40%;padding: 10px;padding-left: 30px;height: 40%;padding-bottom: 0px;">
            <form action="{{URL::to('/save-cart')}}" method="post">
                {{ csrf_field() }}
            <h3 class="text-break" style="max-width: 80%;margin-bottom: 20px;">{{$detail->product_name}}

                @if($detail->product_amount == 0)
                <span style="color: red">(Hết hàng)<span>
                @endif

            </h3>

                <div class="d-flex">
                    <h6 style="margin-right: 10px;">ID:</h6>
                    <h6>{{$detail->product_id}}</h6>
                </div>

            <div class="d-flex flex-row" id="tacgia">
                <h5 class="left" style="margin-right: 10px;">Thể loại:</h5>
                <h5 class="right">{{$detail->category_tl}}</h5>
            </div>
            <div class="d-flex flex-row" id="nxb">
                <h5 class="left" style="margin-right: 10px;">Nguồn:</h5>
                <h5 class="right">{{$detail->product_source}}</h5>
            </div>
            <div class="d-flex flex-row" id="giatien" style="color: #027a4e;padding: 0px;margin-left: 0px;margin-top: 15px;">
                <h1 class="left">{{number_format($detail->product_price).' '.'VNĐ'}}</h1>
            </div>
            <div>
                <div class="d-flex flex-row" id="soluong" style="padding: 0px;margin-left: 0px;margin-top: 15px;padding-bottom: 10px;">
                    <h4 class="left" style="margin-right: 16px;">Số lượng:</h4>
                    <input type="number" name="qty" style="max-width: 13%;" value="1" min="1" max="{{$detail->product_amount}}">
                    <input type="hidden" name="productid_hidden" value="{{$detail->product_id}}">
                </div>
                    <button class="btn btn-primary" type="submit" style="width: 40%;font-weight: 600;background-color: rgb(32,168,118);">Thêm giỏ hàng</button>
            </div>
            </form>
            <hr>
        </div>
        <div style="padding: 0px;padding-left: 30px;"></div>
    </div>
</div>
@endforeach

<div class="d-flex flex-column row" style="margin-top: 10px;margin-bottom: 10px;background-color: #ffffff;padding: 20px;">
    <h3>Sản phẩm mới</h3>
    <hr style="width: 100%;">
    <div class="d-flex flex-row row" id="danhsachsanpham" style="padding: 5px 15px;background-color: #ffffff;margin-left: 0px;margin-right: 0px;">
        @foreach($show_product as $show)
        <div class="d-flex flex-row col-3 sanpham" style="padding: 10px 5px;margin: 5px 0px;" href="product-detail.html">
            <div class="anhsp" style="padding: 5px;"><a href="{{URL::to('/chi-tiet-san-pham',$show->product_id)}}"><img class="img-fluid" src="{{URL::to('/public/uploads/product/',$show->product_image_link)}}" alt="sanpham" width="100px"></a></div>
            <div class="thongtinsanpham" style="padding: 10px;">
                <h6 class="text-left namebook"><a href="{{URL::to('/chi-tiet-san-pham',$show->product_id)}}">{{$show->product_name}}</a></h6>
                <!--
                <div style="height: 16px;"><span style="font-size: 10px;margin-right: 10px;">ID:</span><span style="font-size: 10px;">{{$show->product_id}}</span></div>
                -->
                <div style="height: 16px;"><span style="font-size: 10px;margin-right: 10px;"><b>Thể loại:</b></span><span style="font-size: 10px;">{{$show->category_tl}}</span></div>
                <div style="height: 16px;"><span style="font-size: 10px;margin-right: 10px;"><b>Nguồn:</b></span><span style="font-size: 10px;">{{$show->product_source}}</span></div><br>
                <div class="giasanpham" style="height: 16px;margin-top: 5px;"><span style="font-size: 16px;margin-right: 3px;">{{number_format($show->product_price).' '.'VNĐ'}}</span><span style="font-size: 10px;"></span></div>
            </div>
        </div>
        @endforeach

    </div>
</div>
<div class="d-flex flex-column row" style="margin-top: 10px;margin-bottom: 10px;background-color: #ffffff;padding: 20px 30px;">
    <h3>Tóm tắt thể loại</h3>
    <hr style="width: 100%;">
    <div><span class="text-break text-justify"><br>{{$detail->category_desc}}<br><br></span></div>
</div>
</div>
@endsection

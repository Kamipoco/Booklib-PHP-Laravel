@extends('final_layout')
@section('content')

    @if(Session::has('flag'))
        <div class="alert alert-{{Session::get('flag')}}">
            {{Session::get('message')}}
        </div>
    @endif


    <div class="d-flex flex-row row" id="danhsachsanpham" style="padding: 5px 15px;background-color: #ffffff;margin-left: 0px;margin-right: 0px;">
        @foreach($all_product as $key => $product)
        <a class="d-block flex-column col-3 sanpham" href="{{URL::to('/chi-tiet-san-pham',$product->product_id)}}" style="color: initial;text-decoration: initial;">
            <div class="d-inline-block d-xl-flex justify-content-xl-center anhsp" style="padding: 5px;min-height: 60%;"><img class="img-fluid" src="{{URL::to('public/uploads/product',$product->product_image_link)}}" alt="sanpham" width="100px"></div>
            <div class="flex-column thongtinsanpham"><br>
                <h4 class="text-break text-capitalize text-left namebook" style="height: 10px;">{{$product->product_name}}<br></h4>
                <div class="giasanpham" style="height: 16px;margin-top: 5px;"><span style="font-size: 16px;margin-right: 3px;">{{number_format($product->product_price).' '.'VNĐ'}}</span><span style="font-size: 10px;"></span></div>
                <div class="rating">
                    <img src="{{asset('public/frontend/img/star.svg')}}" height="12" width="12">
                    <img src="{{asset('public/frontend/img/star.svg')}}" height="12" width="12">
                    <img src="{{asset('public/frontend/img/star.svg')}}" height="12" width="12">
                    <img src="{{asset('public/frontend/img/star-half-empty.svg')}}" height="12" width="12">
                    <img src="{{asset('public/frontend/img/star-empty.svg')}}" height="12" width="12">
                </div>
            </div>
        </a>
            @endforeach
    </div>
    {!! $all_product->links() !!}

@endsection

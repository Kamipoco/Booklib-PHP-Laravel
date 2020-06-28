@extends('final_layout')
@section('content')
    <!-- hien thi san pham -->
<!--
    <div class="col-md-9">
        <div class="products">
            <div class="row no-gutters">
                @foreach($category_by_id as $key => $product)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="clean-product-item">
                            <div class="image"><a href="{{URL::to('/chi-tiet-san-pham',$product->product_id)}}"><img class="img-fluid d-block mx-auto" src="{{URL::to('public/uploads/product',$product->product_image_link)}}"></a><a href="#"></a></div>
                            <div class="product-name"><a href="#">{{$product->product_name}}</a></div>
                            <div class="about">
                                <div class="rating"><img src="{{asset('public/frontend/img/star.svg')}}"><img src="{{asset('public/frontend/img/star.svg')}}"><img src="{{asset('public/frontend/img/star.svg')}}"><img src="{{asset('public/frontend/img/star-half-empty.svg')}}"><img src="{{asset('public/frontend/img/star-empty.svg')}}"></div>
                                <div class="price">
                                    <h3>{{number_format($product->product_price).' '.'VNĐ'}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    -->
    <div class="d-flex flex-row row" id="danhsachsanpham" style="padding: 5px 15px;background-color: #ffffff;margin-left: 0px;margin-right: 0px;">
        @foreach($category_by_id as $key => $product)
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

@endsection

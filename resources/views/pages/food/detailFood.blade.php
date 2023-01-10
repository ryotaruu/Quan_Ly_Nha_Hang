@extends('layout')
@section('content')
    @foreach($detailFood as $data)
    <div class="product-details"><!--product-details-->
        <h2 class="title text-center" style="color: black; margin-top: 10px">Chi tiết món ăn</h2>
        <div class="col-sm-5" style="margin-bottom: 20px;">
            <div class="view-product">
                <img src="{{URL::to('public/upload/food/'.$data->dishes_image)}}" alt="" />
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <a href=""><img src="{{URL::to('public/upload/food/'.$data->dishes_image)}}" alt="" style="max-width: 30%"></a>
                        <a href=""><img src="{{URL::to('public/upload/food/'.$data->dishes_image)}}" alt="" style="max-width: 20%"></a>
                        <a href=""><img src="{{URL::to('public/upload/food/'.$data->dishes_image)}}" alt="" style="max-width: 20%"></a>
                    </div>
{{--                    <div class="item">--}}
{{--                        <a href=""><img src="{{URL::to('public/upload/food/'.$data->dishes_image)}}" alt=""></a>--}}
{{--                        <a href=""><img src="{{URL::to('public/upload/food/'.$data->dishes_image)}}" alt=""></a>--}}
{{--                        <a href=""><img src="{{URL::to('public/upload/food/'.$data->dishes_image)}}" alt=""></a>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <a href=""><img src="{{URL::to('public/upload/food/'.$data->dishes_image)}}" alt=""></a>--}}
{{--                        <a href=""><img src="{{URL::to('public/upload/food/'.$data->dishes_image)}}" alt=""></a>--}}
{{--                        <a href=""><img src="{{URL::to('public/upload/food/'.$data->dishes_image)}}" alt=""></a>--}}
{{--                    </div>--}}

                </div>

                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left" style="color: black"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right" style="color: black"></i>
                </a>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information" ><!--/product-information-->
                <img src="{{asset('Front_End/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                <h2 style="color: black">{{$data->dishes_name}}</h2>
                <p style="color: black">Đánh giá: <img src="{{asset('Front_End/images/product-details/rating.png')}}" alt="" /></p>
                <form action="{{URL::to('/Save-Cart')}}" method="POST">
                    @csrf
                    <span >
                        <span style="color: black">{{number_format($data->dishes_price).' VNĐ'}}</span>
                        <label>Số lượng:</label>
                        <input name="Quantity" type="number" min="1" value="1" />
                        <input name="FoodIDHidden" type="hidden" value="{{$data->dishes_id}}"/>
                        <button type="submit" class="btn btn-fefault cart" style="color: black">
                            <i class="fa fa-shopping-cart"></i>Thêm vào đơn
                        </button>
                    </span>
                </form>
                <p style="color: black"><b style="color: black">Trạng thái:</b> Còn món</p>
                <p style="color: black"><b style="color: black">Danh mục:</b> {{$data->category_name}}</p>
                <p style="color: black"><b style="color: black">Địa danh:</b> Món ăn {{$data->local_name}}</p>
                <p style="color: black"><b style="color: black">Loại:</b> Món ăn dạng {{$data->dishes_desc}}</p>
                <a href=""><img src="{{asset('Front_End/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
            </div><!--/product-information-->
        </div>
    </div>
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Mô tả món ăn</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Chi tiết món ăn</a></li>
                <li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in"  id="details" >
                <p>{!! $data->dishes_desc !!}</p>
            </div>
            <div class="tab-pane fade" id="companyprofile" >
                <p>{!! $data->dishes_content !!}</p>
            </div>
            <div class="tab-pane fade" id="reviews" >
                <div class="col-sm-12">
                    <ul>
                        <li><a href="" style="color: black"><i class="fa fa-user"></i>Khách hàng</a></li>
                        <li><a href="" style="color: black"><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href="" style="color: black"><i class="fa fa-calendar-o"></i>2023</a></li>
                    </ul>
                    <p>{{$data->dishes_content}}</p>
                    <p><b style="color: black">Viết đánh giá của bạn cho chúng tôi</b></p>

                    <form action="#">
										<span>
											<input type="text" placeholder="Tên của bạn"/>
											<input type="email" placeholder="Địa chỉ Email"/>
										</span>
                        <textarea name="" ></textarea>
                        <b>Đánh giá: </b> <img src="{{asset('Front_End/images/product-details/rating.png')}}" alt="" />
                        <button type="button" class="btn btn-default pull-right" style="color: black">
                            Gửi
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div><!--/category-tab-->
    @endforeach
    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center" style="color: black; margin-top: 10px">Món ăn đề xuất của quán</h2>
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach($relatedFood as $data)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ URL::to('public/upload/food/'.$data->dishes_image) }}" alt="" height="150px" />
                                    <h2 style="color: black">{{number_format($data->dishes_price).' VNĐ'}}</h2>
                                    <p style="color: black"> Danh mục {{$data->category_name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Thêm vào đơn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left" style="color: black"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right" style="color: black"></i>
            </a>
        </div>
    </div>
@endsection

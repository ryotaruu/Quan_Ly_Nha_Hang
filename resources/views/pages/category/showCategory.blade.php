@extends('layout')
@section('content')
    <div class="features_items">
        <!--features_items-->
        @foreach($title as $data)
        <h2 class="title text-center" style="color: black; margin-top: 10px">Danh mục {{$data->category_name}}</h2>
        @endforeach
        @foreach($food as $data)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ URL::to('/public/upload/food/'.$data->dishes_image) }}" alt="" height="200px" width="200px"/>
                            <h2 style="color: black">{{number_format($data->dishes_price).' VNĐ'}}</h2>
                            <p style="color: black">{{$data->dishes_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart" style="color: black"><i class="fa fa-shopping-cart"></i>Thêm vào đơn</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2 style="color: black">{{number_format($data->dishes_price)}}</h2>
                                <p style="color: black">{{$data->dishes_name}}</p>
                                <a style="color: black" href="{{URL::to('/Detail-Food/'.$data->dishes_id)}}" class="btn btn-default add-to-cart">Chi tiết món {{$data->dishes_name}}</a>
                                <a style="color: black" href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào đơn</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a style="color: black" href="#"><i class="fa fa-plus-square"></i>Thêm vào yêu thích</a>
                            </li>
                            <li><a style="color: black" href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--features_items-->
    {{--    <div class="category-tab">--}}
    {{--        <!--category-tab-->--}}
    {{--        <div class="col-sm-12">--}}
    {{--            <ul class="nav nav-tabs">--}}
    {{--                <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--        <div class="tab-content">--}}
    {{--            <div class="tab-pane fade active in" id="tshirt">--}}
    {{--                <div class="col-sm-3">--}}
    {{--                    <div class="product-image-wrapper">--}}
    {{--                        <div class="single-products">--}}
    {{--                            <div class="productinfo text-center">--}}
    {{--                                <img src="{{ asset('Front_End/images/home/gallery1.jpg') }}" alt="" />--}}
    {{--                                <h2>$56</h2>--}}
    {{--                                <p>Easy Polo Black Edition</p>--}}
    {{--                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add--}}
    {{--                                    to cart</a>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!--/category-tab-->
    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center" style="color: black; margin-top: 10px">Món ăn đề xuất của quán</h2>
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('Front_End/images/home/recommend1.jpg') }}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('Front_End/images/home/recommend1.jpg') }}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('Front_End/images/home/recommend1.jpg') }}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('Front_End/images/home/recommend1.jpg') }}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('Front_End/images/home/recommend1.jpg') }}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('Front_End/images/home/recommend1.jpg') }}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->
@endsection

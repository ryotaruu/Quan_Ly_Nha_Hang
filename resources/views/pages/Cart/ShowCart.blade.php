@extends('layout')
@section('content')
    <section id="cart_items">
        <div class="container" style="width: 100%">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#" style="color: black">Trang chủ</a></li>
                    <style>
                        .breadcrumbs .breadcrumb li a:after{
                            display: none;
                        }
                    </style>
                    <li class="active" style="color: black">Đơn đặt món</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <?php
                    $CartContent = Cart::content();

                ?>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image" style="color: black">Hình ảnh</td>
                        <td class="description" style="color: black">Tên món ăn</td>
                        <td class="description" style="color: black">Mô tả</td>
                        <td class="price" style="color: black">Giá</td>
                        <td class="quantity" style="color: black">Số lượng</td>
                        <td class="total" style="color: black">Tổng tiền</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($CartContent as $Data)
                        <tr>
                            <td>
                                <a href=""><img src="{{URL::to('public/upload/food/'.$Data->options['image'])}}" alt="" style="width: 140px; height: 100px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="" style="color:#000;font-size: 16px">{{$Data->name}}</a></h4>
                            </td>
                            <td class="cart_description">
                                <h4><a href="" style="color:#000;font-size: 16px">{{$Data->options->desc}}</a></h4>
                            </td>
                            <td class="cart_description">
                                <h4><a href="" style="color:#000;font-size: 16px">{{number_format($Data->price).' VNĐ'}}</a></h4>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button" style="margin-top: 5px">
                                    <a class="cart_quantity_up" href="" style="color:#000;"> + </a>
                                    <input style="color:#000;font-size: 16px" class="cart_quantity_input" type="text" name="quantity" value="{{$Data->qty}}" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href="" style="color:#000;"> - </a>
                                </div>
                            </td>
                            <td class="cart_description">
                                <p style="color:#000;font-size: 16px; margin-top: 20px">
                                    <?php
                                        $Total = $Data->price * $Data->qty;
                                        echo number_format($Total);
                                        ?> VNG
                                </p>
                            </td>
                            <td >
                                <a class="cart_quantity_delete align-items-center text-center" href=""><i class="fa-regular fa-trash-can" style="color:black; font-size: 18px"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section id="do_action">
        <div class="container" style="width: 100%">
            <div class="heading">
                <h3>Hình thức thanh toán</h3>
                <p>Chọn mã giảm giá, để được giảm chi phí vận chuyển</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <select onchange="checkAlert(event)" style="margin-left: 10px; color: black">
                            <option value="0" selected>Lựa chọn ăn tại quán hay vận chuyển</option>
                            <option value="1">Ăn tại quán</option>
                            <option value="2">Vận chuyển</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <div id="demo" style="color: black"><p class='text-center'>Quán cần bạn chọn phương thức thanh toán</p></div>
                        <ul>
                            <li style="color: black">Tổng tiền<span class="input-element">{{number_format((float)str_replace(',', '', Cart::subtotal())).' VNĐ'}}</span></li>
                            <script>
                                function checkAlert(evt) {
                                    if (evt.target.value == 1) {
                                        document.getElementById("demo").innerHTML = "<p class='text-center'>Bạn sẽ ăn tại quán</p>";
                                        document.getElementById("total").innerHTML = "<li style='color: black'>Số tiền phải thanh toán<span>{{number_format((float)str_replace(',', '', Cart::subtotal())).' VNĐ'}}</span></li>";
                                        document.getElementById("ButtonCheckOut").innerHTML = "<a class='btn btn-default check_out ' href='#ThanhToan' style='color: black'>Thanh toán</a>"
                                    }
                                    if (evt.target.value == 2) {
                                        document.getElementById("demo").innerHTML = "<p class='text-center'>Quán sẽ tính chi phí vận chuyển</p>";
                                        document.getElementById("tax").innerHTML = "<li style='color: black'>Chi phí đóng gói đồ ăn<span>{{number_format((float)str_replace(',', '', Cart::tax())).' VNĐ'}}</span></li>";
                                        document.getElementById("ship").innerHTML = "<li style='color: black'>Phí vận chuyển<span>Miễn phí</span></li>";
                                        document.getElementById("total").innerHTML = "<li style='color: black'>Số tiền phải thanh toán<span>{{number_format((float)str_replace(',', '', Cart::total())).' VNĐ'}}</span></li>";
                                        document.getElementById("ButtonCheckOut").innerHTML = "<a class='btn btn-default check_out ' href='#ThanhToan' style='color: black'>Thanh toán</a>"
                                    }
                                    // if (evt.target.value === "Lựa chọn ăn tại quán hay vận chuyển") {
                                    //     document.getElementById("demo").innerHTML = "<p class='text-center'>Quán cần bạn chọn phương thức thanh toán</p>";
                                    //     document.getElementById("tax").innerHTML = "<li style='color: black'>Chi phí đóng gói đồ ăn<span>0 VNĐ</span></li>";
                                    //     document.getElementById("ship").innerHTML = "<li style='color: black'>Phí vận chuyển<span>Miễn phí</span></li>";
                                    // }
                                    if(event.target.value == 0){
                                        document.getElementById("demo").innerHTML = "<p class='text-center'>Quán cần bạn chọn phương thức thanh toán</p>";
                                        document.getElementById("tax").innerHTML = "<li style='color: black'>Chi phí đóng gói đồ ăn<span>Đang tính. . .</span></li>";
                                        document.getElementById("ship").innerHTML = "<li style='color: black'>Phí vận chuyển<span>Đang tính. . .</span></li>";
                                        document.getElementById("total").innerHTML = "<li style='color: black'>Số tiền phải thanh toán<span>Đang tính. . .</span></li>";
                                        document.getElementById("ButtonCheckOut").innerHTML = "<a class='btn btn-default check_out disabled' href='#KhongTheThanhToan' style='color: black'>Thanh toán</a>"
                                    }
                                }
                            </script>
                            <div id="tax">
{{--                                <li style='color: black'>Chi phí đóng gói đồ ăn<span>Đang tính. . .</span></li>--}}
                            </div>
                            <div id="ship">
{{--                                <li style='color: black'>Phí vận chuyển<span>Đang tính. . .</span></li>--}}
                            </div>
                            <div id="total">
{{--                                <li style="color: black">Số tiền phải thanh toán<span>Đang tính. . .</span></li>--}}
                            </div>
                        </ul>
                        <a class="btn btn-default update" href="" style="color: black">Cập nhật</a>
                        <a id="ButtonCheckOut"></a>
{{--                        <a class='btn btn-default check_out disabled' href='' style='color: black;'>Thanh toán</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

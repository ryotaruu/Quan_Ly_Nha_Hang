@extends('layout');
@section('content')
    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2 style="color: black">Đăng nhập bằng tài khoản của bạn để thanh toán</h2>
                        <form action="#">
                            <input style="color: black" type="email" placeholder="Địa chỉ email" />
                            <input style="color: black" type="password" placeholder="Mật khẩu" />
                            <span style="color: black">
                                <input type="checkbox" class="checkbox">
                                Nhớ đăng nhập của tôi
                            </span>
                            <button style="color: black" type="submit" class="btn btn-default">Đăng nhập</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 style="color: black" class="or">Hoặc</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2 style="color: black">Đăng ký tài khoản mới</h2>
                        <form action="#">
                            <input style="color: black" type="email" placeholder="Địa chỉ email" />
                            <input style="color: black" type="password" placeholder="Mật khẩu" />
                            <input style="color: black" type="password" placeholder="Nhập lại mật khẩu" />
                            <button style="color: black" type="submit" class="btn btn-default">Đăng ký</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->
@endsection

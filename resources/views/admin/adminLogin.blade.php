<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login | SENFOOD</title>
    <link rel="stylesheet" href="{{ asset('Back_End/Css/DashboardAdmin.css') }}">
</head>

<body>
    <main class="main-content mt-0 ps">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('/Back_End/Image/BackgroupAdminLogin.jpg')">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container mt-5">
                <div class="row signin-margin">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Login</h4>
                                    <?php
                                    $message = session()->get('message');
                                    if ($message != null) {
                                        echo "<span class='text-alert' style='color: white; margin-left: 25px'>$message</span>";
                                        $message = session()->put('message', "");
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('Dashboard') }}"
                                    class="text-start">
                                    @csrf
                                    <div class="input-group input-group-outline mt-3 is-filled">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="admin_email"
                                            placeholder="Your Email" required="" onfocus="focused(this)"
                                            onfocusout="defocused(this)">
                                    </div>
                                    <div class="input-group input-group-outline mt-3 is-filled">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="admin_password"
                                            placeholder="Your Password" required="" onfocus="focused(this)"
                                            onfocusout="defocused(this)">
                                    </div>
                                    <div class="form-check form-switch d-flex align-items-center my-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember
                                            me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign
                                            in</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Don't have an account?
                                        <a href="" class="text-primary text-gradient font-weight-bold">Sign
                                            up</a>
                                    </p>
                                    <p class="text-sm text-center">
                                        Forgot your password? Reset your password
                                        <a href="" class="text-primary text-gradient font-weight-bold">here</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </main>
</body>

</html>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Log in | Chatvia - Responsive Bootstrap 5 Chat App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive Bootstrap 5 Chat App" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />


</head>

<body>


<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="text-center mb-4">
                    <h4>ورود</h4>
                    <p class="text-muted mb-4">به مدیر کانال بله وارد شوید </p>

                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <div class="p-3">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">ایمیل</label>
                                    <div class="input-group mb-3 bg-light-subtle rounded-3">
                                                <span class="input-group-text text-muted" id="basic-addon3">
                                                    <i class="ri-user-2-line"></i>
                                                </span>
                                        <input type="text" class="form-control form-control-lg border-light bg-light-subtle" placeholder="ایمیل خود را وارد کنید" aria-label="ایمیل خود را وارد کنید" aria-describedby="basic-addon3" name="email">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">رمز عبور</label>
                                    <div class="input-group mb-3 bg-light-subtle rounded-3">
                                                <span class="input-group-text text-muted" id="basic-addon4">
                                                    <i class="ri-lock-2-line"></i>
                                                </span>
                                        <input type="password" class="form-control form-control-lg border-light bg-light-subtle" placeholder="رمز عبور خود را وارد کنید" aria-label="رمز عبور خود را وارد کنید" aria-describedby="basic-addon4" name="password">
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">ورود</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end account-pages -->


<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>

</body>
</html>

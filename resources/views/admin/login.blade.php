<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App + jQuery">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>مدیریت - ورود</title>
    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="/themes/angle/vendor/_5f40fortawesome/fontawesome-free-webfonts/css/fa-brands.css">
    <link rel="stylesheet" href="/themes/angle/vendor/_5f40fortawesome/fontawesome-free-webfonts/css/fa-regular.css">
    <link rel="stylesheet" href="/themes/angle/vendor/_5f40fortawesome/fontawesome-free-webfonts/css/fa-solid.css">
    <link rel="stylesheet" href="/themes/angle/vendor/_5f40fortawesome/fontawesome-free-webfonts/css/fontawesome.css">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="/themes/angle/vendor/simple-line-icons/css/simple-line-icons.css">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="/themes/angle/css/bootstrap-rtl.css" id="bscss">
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="/themes/angle/css/app-rtl.css" id="maincss">
</head>

<body>
<div class="wrapper">
    <div class="block-center mt-4 wd-xl">
        <!-- START card-->
        <div class="card card-flat">
            <div class="card-header text-center">
                <a href="#">
                    <img class="block-center rounded" src="themes/angle/img/logo-single.png" alt="لوگو" width="80" height="80">
                </a>
            </div>
            <div class="card-body">
                @if (isset($errors) && count($errors)>0 )
                    <div class="logobox">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-styled-left alert-bordered" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">بستن</span></button>
                                <span class="text-semibold">خطا !</span>{{ $error }}
                            </div>
                        @endforeach
                    </div>
                @endif

                <p class="text-center py-2">وارد شوید!</p>
                <form class="mb-3" id="loginForm" method="post" novalidate>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-group with-focus">
                            <input class="form-control border-right-0" id="email" name="email" type="text" placeholder="ایمیل" autocomplete="off" required>
                            <div class="input-group-append">
                           <span class="input-group-text text-muted bg-transparent border-left-0">
                              <em class="fa fa-envelope"></em>
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group with-focus">
                            <input class="form-control border-right-0" id="password" name="password" type="password" placeholder="رمز عبور" required>
                            <div class="input-group-append">
                           <span class="input-group-text text-muted bg-transparent border-left-0">
                              <em class="fa fa-lock"></em>
                           </span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="checkbox c-checkbox float-left mt-0">
                            <label>
                                <input type="checkbox" value="" name="remember">
                                <span class="fa fa-check"></span> مرا بخاطر بسپار</label>
                        </div>
{{--                        <div class="float-right">--}}
{{--                            <a class="text-muted" href="recover.html">فراموشی رمز عبور</a>--}}
{{--                        </div>--}}
                    </div>
                    <button class="btn btn-block btn-primary mt-3" type="submit">ورود</button>
                </form>
            </div>
        </div>
        <!-- END card-->
    </div>
</div>
<!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
<script src="/themes/angle/vendor/modernizr/modernizr.custom.js"></script>
<!-- JQUERY-->
<script src="/themes/angle/vendor/jquery/dist/jquery.js"></script>
<!-- BOOTSTRAP-->
<script src="/themes/angle/vendor/bootstrap/dist/js/bootstrap.js"></script>
<!-- STORAGE API-->
<script src="/themes/angle/vendor/js-storage/js.storage.js"></script>
<!-- PARSLEY-->
<script src="/themes/angle/vendor/parsleyjs/dist/parsley.js"></script>
<!-- =============== APP SCRIPTS ===============-->
<script src="/themes/angle/js/app.js"></script>
</body>

</html>

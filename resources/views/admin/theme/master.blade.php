@php
$user = Request()->user('web')
@endphp
<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="پنل مدیریت">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>مدیریت | @yield('title')</title>
    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="/themes/angle/vendor/_5f40fortawesome/fontawesome-free-webfonts/css/fa-brands.css">
    <link rel="stylesheet" href="/themes/angle/vendor/_5f40fortawesome/fontawesome-free-webfonts/css/fa-regular.css">
    <link rel="stylesheet" href="/themes/angle/vendor/_5f40fortawesome/fontawesome-free-webfonts/css/fa-solid.css">
    <link rel="stylesheet" href="/themes/angle/vendor/_5f40fortawesome/fontawesome-free-webfonts/css/fontawesome.css">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="/themes/angle/vendor/simple-line-icons/css/simple-line-icons.css">
    <!-- ANIMATE.CSS-->
    <link rel="stylesheet" href="/themes/angle/vendor/animate.css/animate.css">
    <!-- WHIRL (spinners)-->
    <link rel="stylesheet" href="/themes/angle/vendor/whirl/dist/whirl.css">
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- WEATHER ICONS-->
    <link rel="stylesheet" href="/themes/angle/vendor/weather-icons/css/weather-icons.css">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="/themes/angle/css/bootstrap-rtl.css" id="bscss">
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="/themes/angle/css/app-rtl.css" id="maincss">
    <link rel="stylesheet" href="/themes/angle/vendor/sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" href="/themes/angle/vendor/toastr/toastr.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
@yield('modal')
<body>
<div class="wrapper">
    <!-- top navbar-->
    <header class="topnavbar-wrapper">
        <!-- START Top Navbar-->
        <nav class="navbar topnavbar">
            <!-- START navbar header-->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ Route('admin_dashboard') }}">
                    <div class="brand-logo">
{{--                        <img class="img-fluid" src="/themes/angle/img/logo.png" alt="logo">--}}
                    </div>
                </a>
            </div>
            <!-- END navbar header-->
            <!-- START Left navbar-->
            <ul class="navbar-nav mr-auto flex-row">
                <li class="nav-item">
                    <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                    <a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed">
                        <em class="fas fa-bars"></em>
                    </a>
                    <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                    <a class="nav-link sidebar-toggle d-md-none" href="#" data-toggle-state="aside-toggled" data-no-persist="true">
                        <em class="fas fa-bars"></em>
                    </a>
                </li>
                <!-- START User avatar toggle-->
                <li class="nav-item d-none d-md-block">
                    <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                    <a class="nav-link" id="user-block-toggle" href="#user-block" data-toggle="collapse">
                        <em class="icon-user"></em>
                    </a>
                </li>
                <!-- END User avatar toggle-->
{{--                <!-- START lock screen-->--}}
{{--                <li class="nav-item d-none d-md-block">--}}
{{--                    <a class="nav-link" href="/themes/angles/lock.html" title="Lock screen">--}}
{{--                        <em class="icon-lock"></em>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <!-- END lock screen-->--}}
            </ul>
            <!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="navbar-nav flex-row">
{{--                <!-- Search icon-->--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#" data-search-open="">--}}
{{--                        <em class="icon-magnifier"></em>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <!-- Fullscreen (only desktops)-->
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="#" data-toggle-fullscreen="">
                        <em class="fas fa-expand"></em>
                    </a>
                </li>
{{--                <!-- START Alert menu-->--}}
{{--                <li class="nav-item dropdown dropdown-list">--}}
{{--                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-toggle="dropdown">--}}
{{--                        <em class="icon-bell"></em>--}}
{{--                        <span class="badge badge-danger">11</span>--}}
{{--                    </a>--}}
{{--                    <!-- START Dropdown menu-->--}}
{{--                    <div class="dropdown-menu dropdown-menu-right animated flipInX">--}}
{{--                        <div class="dropdown-item">--}}
{{--                            <!-- START list group-->--}}
{{--                            <div class="list-group">--}}
{{--                                <!-- list item-->--}}
{{--                                <div class="list-group-item list-group-item-action">--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="align-self-start mr-2">--}}
{{--                                            <em class="fab fa-twitter fa-2x text-info"></em>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <p class="m-0">دنبال کننده های جدید</p>--}}
{{--                                            <p class="m-0 text-muted text-sm">1 دنبال کننده جدید</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- list item-->--}}
{{--                                <div class="list-group-item list-group-item-action">--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="align-self-start mr-2">--}}
{{--                                            <em class="fas fa-envelope fa-2x text-warning"></em>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <p class="m-0">ایمیل های جدید</p>--}}
{{--                                            <p class="m-0 text-muted text-sm">شما 10 ایمیل جدید دارید</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- list item-->--}}
{{--                                <div class="list-group-item list-group-item-action">--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="align-self-start mr-2">--}}
{{--                                            <em class="fas fa-tasks fa-2x text-success"></em>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <p class="m-0">وظایف محول شده</p>--}}
{{--                                            <p class="m-0 text-muted text-sm">11 وظیفه محول شده جدید</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- last list item-->--}}
{{--                                <div class="list-group-item list-group-item-action">--}}
{{--                                        <span class="d-flex align-items-center">--}}
{{--                                            <span class="text-sm">اعلامیه ها بیشتر</span>--}}
{{--                                            <span class="badge badge-danger ml-auto">14</span>--}}
{{--                                        </span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- END list group-->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- END Dropdown menu-->--}}
{{--                </li>--}}
{{--                <!-- END Alert menu-->--}}
{{--                <!-- START Offsidebar button-->--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#" data-toggle-state="offsidebar-open" data-no-persist="true">--}}
{{--                        <em class="icon-notebook"></em>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <!-- END Offsidebar menu-->--}}
            </ul>
            <!-- END Right Navbar-->
            <!-- START Search form-->
            <form class="navbar-form" role="search" action="search.html">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="عبارت مورد نظر را تایپ نمایید ...">
                    <div class="fas fa-times navbar-form-close" data-search-dismiss=""></div>
                </div>
                <button class="d-none" type="submit">ارسال</button>
            </form>
            <!-- END Search form-->
        </nav>
        <!-- END Top Navbar-->
    </header>
    @include('admin.theme.sidebar')
    <!-- offsidebar-->
    <aside class="offsidebar d-none">
        <!-- START Off Sidebar (right)-->
        <nav>
            <div role="tabpanel">
                <!-- Nav tabs-->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="#app-settings" aria-controls="app-settings" role="tab" data-toggle="tab">
                            <em class="icon-equalizer fa-lg"></em>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="#app-chat" aria-controls="app-chat" role="tab" data-toggle="tab">
                            <em class="icon-user fa-lg"></em>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes-->
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="app-settings" role="tabpanel">
                        <h3 class="text-center text-thin mt-4"> تنظیمات</h3>
                        <div class="p-2">
                            <h4 class="text-muted text-thin">تم ها</h4>
                            <div class="row row-flush mb-2">
                                <div class="col mb-2">
                                    <div class="setting-color">
                                        <label data-load-css="css/theme-a.css">
                                            <input type="radio" name="setting-theme" checked="checked">
                                            <span class="icon-check"></span>
                                            <span class="split">
                                                    <span class="color bg-info"></span>
                                                    <span class="color bg-info-light"></span>
                                                </span>
                                            <span class="color bg-white"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="setting-color">
                                        <label data-load-css="css/theme-b.css">
                                            <input type="radio" name="setting-theme">
                                            <span class="icon-check"></span>
                                            <span class="split">
                                                    <span class="color bg-green"></span>
                                                    <span class="color bg-green-light"></span>
                                                </span>
                                            <span class="color bg-white"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="setting-color">
                                        <label data-load-css="css/theme-c.css">
                                            <input type="radio" name="setting-theme">
                                            <span class="icon-check"></span>
                                            <span class="split">
                                                    <span class="color bg-purple"></span>
                                                    <span class="color bg-purple-light"></span>
                                                </span>
                                            <span class="color bg-white"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="setting-color">
                                        <label data-load-css="css/theme-d.css">
                                            <input type="radio" name="setting-theme">
                                            <span class="icon-check"></span>
                                            <span class="split">
                                                    <span class="color bg-danger"></span>
                                                    <span class="color bg-danger-light"></span>
                                                </span>
                                            <span class="color bg-white"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-flush mb-2">
                                <div class="col mb-2">
                                    <div class="setting-color">
                                        <label data-load-css="css/theme-e.css">
                                            <input type="radio" name="setting-theme">
                                            <span class="icon-check"></span>
                                            <span class="split">
                                                    <span class="color bg-info-dark"></span>
                                                    <span class="color bg-info"></span>
                                                </span>
                                            <span class="color bg-gray-dark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="setting-color">
                                        <label data-load-css="css/theme-f.css">
                                            <input type="radio" name="setting-theme">
                                            <span class="icon-check"></span>
                                            <span class="split">
                                                    <span class="color bg-green-dark"></span>
                                                    <span class="color bg-green"></span>
                                                </span>
                                            <span class="color bg-gray-dark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="setting-color">
                                        <label data-load-css="css/theme-g.css">
                                            <input type="radio" name="setting-theme">
                                            <span class="icon-check"></span>
                                            <span class="split">
                                                    <span class="color bg-purple-dark"></span>
                                                    <span class="color bg-purple"></span>
                                                </span>
                                            <span class="color bg-gray-dark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="setting-color">
                                        <label data-load-css="css/theme-h.css">
                                            <input type="radio" name="setting-theme">
                                            <span class="icon-check"></span>
                                            <span class="split">
                                                    <span class="color bg-danger-dark"></span>
                                                    <span class="color bg-danger"></span>
                                                </span>
                                            <span class="color bg-gray-dark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <h4 class="text-muted text-thin">Layout</h4>
                            <div class="clearfix">
                                <p class="float-left">Fixed</p>
                                <div class="float-right">
                                    <label class="switch">
                                        <input id="chk-fixed" type="checkbox" data-toggle-state="layout-fixed">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="clearfix">
                                <p class="float-left">Boxed</p>
                                <div class="float-right">
                                    <label class="switch">
                                        <input id="chk-boxed" type="checkbox" data-toggle-state="layout-boxed">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="clearfix">
                                <p class="float-left">RTL</p>
                                <div class="float-right">
                                    <label class="switch">
                                        <input id="chk-rtl" type="checkbox" checked="checked">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <h4 class="text-muted text-thin">Aside</h4>
                            <div class="clearfix">
                                <p class="float-left">Collapsed</p>
                                <div class="float-right">
                                    <label class="switch">
                                        <input id="chk-collapsed" type="checkbox" data-toggle-state="aside-collapsed">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="clearfix">
                                <p class="float-left">Collapsed Text</p>
                                <div class="float-right">
                                    <label class="switch">
                                        <input id="chk-collapsed-text" type="checkbox" data-toggle-state="aside-collapsed-text">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="clearfix">
                                <p class="float-left">Float</p>
                                <div class="float-right">
                                    <label class="switch">
                                        <input id="chk-float" type="checkbox" data-toggle-state="aside-float">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="clearfix">
                                <p class="float-left">Hover</p>
                                <div class="float-right">
                                    <label class="switch">
                                        <input id="chk-hover" type="checkbox" data-toggle-state="aside-hover">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="clearfix">
                                <p class="float-left">Show Scrollbar</p>
                                <div class="float-right">
                                    <label class="switch">
                                        <input id="chk-scroll" type="checkbox" data-toggle-state="show-scrollbar" data-target=".sidebar">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="app-chat" role="tabpanel">
                        <h3 class="text-center text-thin mt-4">Connections</h3>
                        <div class="list-group">
                            <!-- START list title-->
                            <div class="list-group-item border-0">
                                <small class="text-muted">ONLINE</small>
                            </div>
                            <!-- END list title-->
                            <div class="list-group-item list-group-item-action border-0">
                                <div class="media">
                                    <img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/05.jpg" alt="Image">
                                    <div class="media-body text-truncate">
                                        <a href="#">
                                            <strong>Juan Sims</strong>
                                        </a>
                                        <br>
                                        <small class="text-muted">Designeer</small>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="circle bg-success circle-lg"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action border-0">
                                <div class="media">
                                    <img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/06.jpg" alt="Image">
                                    <div class="media-body text-truncate">
                                        <a href="#">
                                            <strong>Maureen Jenkins</strong>
                                        </a>
                                        <br>
                                        <small class="text-muted">Designeer</small>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="circle bg-success circle-lg"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action border-0">
                                <div class="media">
                                    <img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/07.jpg" alt="Image">
                                    <div class="media-body text-truncate">
                                        <a href="#">
                                            <strong>Billie Dunn</strong>
                                        </a>
                                        <br>
                                        <small class="text-muted">Designeer</small>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="circle bg-danger circle-lg"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action border-0">
                                <div class="media">
                                    <img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/08.jpg" alt="Image">
                                    <div class="media-body text-truncate">
                                        <a href="#">
                                            <strong>Tomothy Roberts</strong>
                                        </a>
                                        <br>
                                        <small class="text-muted">Designeer</small>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="circle bg-warning circle-lg"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- START list title-->
                            <div class="list-group-item border-0">
                                <small class="text-muted">OFFLINE</small>
                            </div>
                            <!-- END list title-->
                            <div class="list-group-item list-group-item-action border-0">
                                <div class="media">
                                    <img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/09.jpg" alt="Image">
                                    <div class="media-body text-truncate">
                                        <a href="#">
                                            <strong>Lawrence Robinson</strong>
                                        </a>
                                        <br>
                                        <small class="text-muted">Designeer</small>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="circle bg-warning circle-lg"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action border-0">
                                <div class="media">
                                    <img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/10.jpg" alt="Image">
                                    <div class="media-body text-truncate">
                                        <a href="#">
                                            <strong>Tyrone Owens</strong>
                                        </a>
                                        <br>
                                        <small class="text-muted">Designeer</small>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="circle bg-warning circle-lg"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-3 py-4 text-center">
                            <!-- Optional link to list more users-->
                            <a class="btn btn-purple btn-sm" href="#" title="See more contacts">
                                <strong>بارگذاری بیشتر..</strong>
                            </a>
                        </div>
                        <!-- Extra items-->
                        <div class="px-3 py-2">
                            <p>
                                <small class="text-muted">پایان وظیفه</small>
                            </p>
                            <div class="progress progress-xs m-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    <span class="sr-only">80% تکمیل شده </span>
                                </div>
                            </div>
                        </div>
                        <div class="px-3 py-2">
                            <p>
                                <small class="text-muted">بارگذاری quota</small>
                            </p>
                            <div class="progress progress-xs m-0">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% تکمیل شده </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END Off Sidebar (right)-->
    </aside>
    <!-- Main section-->
    <section class="section-container">
        <!-- Page content-->
        <div class="content-wrapper">
            <div class="content-heading">
                <div>
                    @yield('title')
                    <small data-localize="dashboard.WELCOME"></small>
                </div>
                <div class="ml-auto">
                    <div class="btn-group">
                        @yield('buttons')
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </section>
    <!-- Page footer-->
    <footer class="footer-container">
        <span>&copy; copyright 2020</span>
    </footer>
</div>
<!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
<script src="/themes/angle/vendor/modernizr/modernizr.custom.js"></script>
<!-- JQUERY-->
<script src="/themes/angle/vendor/jquery/dist/jquery.js"></script>
<!-- BOOTSTRAP-->
<script src="/themes/angle/vendor/popper.js/dist/umd/popper.js"></script>
<script src="/themes/angle/vendor/bootstrap/dist/js/bootstrap.js"></script>
<!-- STORAGE API-->
<script src="/themes/angle/vendor/js-storage/js.storage.js"></script>
<!-- JQUERY EASING-->
<script src="/themes/angle/vendor/jquery.easing/jquery.easing.js"></script>
<!-- ANIMO-->
<script src="/themes/angle/vendor/animo/animo.js"></script>
<!-- SCREENFULL-->
<script src="/themes/angle/vendor/screenfull/dist/screenfull.js"></script>
<!-- LOCALIZE-->
<script src="/themes/angle/vendor/jquery-localize/dist/jquery.localize.js"></script>
<!-- =============== PAGE VENDOR SCRIPTS ===============-->
<!-- SLIMSCROLL-->
<script src="/themes/angle/vendor/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- SPARKLINE-->
<script src="/themes/angle/vendor/jquery-sparkline/jquery.sparkline.js"></script>
<!-- FLOT CHART-->
<script src="/themes/angle/vendor/flot/jquery.flot.js"></script>
<script src="/themes/angle/vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js"></script>
<script src="/themes/angle/vendor/flot/jquery.flot.resize.js"></script>
<script src="/themes/angle/vendor/flot/jquery.flot.pie.js"></script>
<script src="/themes/angle/vendor/flot/jquery.flot.time.js"></script>
<script src="/themes/angle/vendor/flot/jquery.flot.categories.js"></script>
<script src="/themes/angle/vendor/jquery.flot.spline/jquery.flot.spline.js"></script>
<!-- EASY PIE CHART-->
<script src="/themes/angle/vendor/easy-pie-chart/dist/jquery.easypiechart.js"></script>
<!-- MOMENT JS-->
<script src="/themes/angle/vendor/moment/min/moment-with-locales.js"></script>
<!-- =============== APP SCRIPTS ===============-->
<script src="/themes/angle/js/app.js"></script>
<script src="/themes/angle/vendor/sweetalert/dist/sweetalert.min.js"></script>
<script src="/themes/angle/vendor/toastr/toastr.min.js"></script>
<script type="text/javascript" src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js'></script>

@yield('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        tinymce.init({
            selector: 'textarea#editor',
            plugins : 'advlist link image lists',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullpage | ' +
                'forecolor backcolor emoticons | help',
        });
    });
</script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
</script>
</body>
</html>

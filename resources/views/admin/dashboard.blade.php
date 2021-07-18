@section('title', 'میزکار')
@section('content')
    <!-- START cards box-->
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-12">
            <!-- START card-->
            <div class="card flex-row align-items-center align-items-stretch border-0">
                <div class="col-4 d-flex align-items-center bg-green-dark justify-content-center rounded-left">
                    <em class="icon-bell fa-3x"></em>
                </div>
                <div class="col-8 py-3 bg-green rounded-right">
                    <div class="h2 mt-0">{{ $requestsCount }}
                        <small>عدد</small>
                    </div>
                    <div class="text-uppercase">درخواست های بازنشستگی</div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-12">
            <!-- START card-->
            <div class="card flex-row align-items-center align-items-stretch border-0">
                <div class="col-4 d-flex align-items-center bg-green-dark justify-content-center rounded-left">
                    <em class="icon-anchor fa-3x"></em>
                </div>
                <div class="col-8 py-3 bg-green rounded-right">
                    <div class="h2 mt-0">{{ $historiesCount }}
                        <small>عدد</small>
                    </div>
                    <div class="text-uppercase">درخواست های وضعیت بیمه</div>
                </div>
            </div>
        </div>



        <div class="col-xl-3 col-lg-6 col-md-12">
            <!-- START card-->
            <div class="card flex-row align-items-center align-items-stretch border-0">
                <div class="col-4 d-flex align-items-center bg-green-dark justify-content-center rounded-left">
                    <em class="icon-user fa-3x"></em>
                </div>
                <div class="col-8 py-3 bg-green rounded-right">
                    <div class="h2 mt-0">{{ $usersCount }}
                        <small>عدد</small>
                    </div>
                    <div class="text-uppercase">کاربران</div>
                </div>
            </div>
        </div>
    </div>

@endsection
@include('admin.theme.master')

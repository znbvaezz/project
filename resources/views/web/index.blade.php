@section('content')
<div style="width: 45%;float: right;margin-right: 3%">
    <h3 style="text-align: center">درخواست بازنشستگی</h3>

    <form method="post" action="">
        <input type="hidden" name="action" value="request">
        {{ csrf_field() }}
        <div class="form-group">
            <input type=text" class="form-control" value="" name="national_code" placeholder="کد ملی" />
        </div>

        <div class="form-group">
            <input type="text" class="form-control" value="" name="first_name" placeholder="نام" />
        </div>

        <div class="form-group">
            <input type="text" class="form-control" value="" name="last_name" placeholder="نام خانوادگی" />
        </div>

        <div class="form-group">
            <input type="tel" class="form-control" value="" name="insurance_number" placeholder="شماره بیمه" />
        </div>

        <div class="form-group" style="text-align: center">
        <input type="submit" class="btn" value="درخواست">
        </div>

    </form>

</div>

<div style="width: 45%;float: left;margin-left: 3%">
    <h3 style="text-align: center">دریافت سابقه بیمه</h3>

    <form method="post" action="">
        <input type="hidden" name="action" value="history">
        {{ csrf_field() }}
        <div class="form-group">
            <input type=tel" class="form-control" value="" name="national_code" placeholder="کد ملی" />
        </div>

        <div class="form-group">
            <input type="text" class="form-control" value="" name="first_name" placeholder="نام" />
        </div>

        <div class="form-group">
            <input type="text" class="form-control" value="" name="last_name" placeholder="نام خانوادگی" />
        </div>

        <div class="form-group">
            <input type="tel" class="form-control" value="" name="insurance_number" placeholder="شماره بیمه" />
        </div>

        <div class="form-group" style="text-align: center">
            <input type="submit" class="btn" value="درخواست">
        </div>

    </form>

</div>

@endsection
@include('web.theme.master')

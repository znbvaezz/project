<?php
$type = isset($agent) ? 'edit' : 'add';
?>
@section('title', $type == 'edit' ? 'ویرایش نمایندگی' : 'افزودن نمایندگی')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong>انجام شد!</strong> {{ Session('success') }}
        </div>
    @endif

    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <strong>خطا!</strong> {{ $error }}</div>
    @endforeach

    <div class="card card-default">
        <div class="card-body">

            <form method="post" action="">
                {{ csrf_field() }}

                <input type="hidden" value="@if($type == 'edit'){{ $agent->id }}@endif" name="id">
                <input type="hidden" name="action" value="{{ $type }}">

                <div class="form-group">
                    <label>نام:</label>
                    <input class="form-control" type="text" name="name"
                           value="@if($type == 'edit'){{ $agent->user->name }}@else{{ old('name') }}@endif"
                           placeholder=""
                           required>
                </div>

                <div class="form-group">
                    <label>ایمیل:</label>
                    <input class="form-control" type="text" name="email"
                           value="@if($type == 'edit'){{ $agent->user->email }}@else{{ old('email') }}@endif"
                           placeholder=""
                           required>
                </div>

                <div class="form-group">
                    <label>رمز عبور:</label>
                    <input class="form-control" type="password" name="password"
                           value="" placeholder="">
                </div>


                <button class="mb-5 btn-lg col-12 btn btn-outline-success" type="submit">ثبت</button>
            </form>
        </div>
    </div>
@endsection
@include('admin.theme.master')

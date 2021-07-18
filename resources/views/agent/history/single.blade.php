@section('title', 'جزئیات سابقه')
@section('content')

    <div class="card card-default">
        <div class="card-body">

            <div>
                <span>مبلغ: </span><b>{{ number_format($request->transaction->price) . ' تومان' }}</b>
                <hr/>
            </div>

            <div>
                <span>وضعیت پرداخت: </span>
                <span
                    class="badge @if($request->transaction->success){{ 'badge-success' }}@else{{ 'badge-warning' }}@endif">@if($request->transaction->success){{ 'موفق' }}@else{{ 'در انتظار پرداخت' }}@endif</span>
                <hr/>
            </div>

            <div>
                <span>تاریخ پرداخت: </span><b>{{ \Morilog\Jalali\Jalalian::fromDateTime($request->transaction->created_at)->format('%A, %d %B %Y') }}</b>
                <hr/>
            </div>

            <div>
                <span>کاربر: </span><b>{{ $request->insurance->full_name }}</b>
                <hr/>
            </div>

        </div>
    </div>
@endsection
@include('admin.theme.master')

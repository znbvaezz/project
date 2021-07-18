@section('title', 'جزئیات تراکنش')
@section('content')

    <div class="card card-default">
        <div class="card-body">

            <div>
                <span>مبلغ: </span><b>{{ number_format($transaction->price) . ' تومان' }}</b>
                <hr/>
            </div>

            <div>
                <span>وضعیت پرداخت: </span>
                <span
                    class="badge @if($transaction->success){{ 'badge-success' }}@else{{ 'badge-warning' }}@endif">@if($transaction->success){{ 'موفق' }}@else{{ 'در انتظار پرداخت' }}@endif</span>
                <hr/>
            </div>

            <div>
                <span>تاریخ پرداخت: </span><b>{{ \Morilog\Jalali\Jalalian::fromDateTime($transaction->created_at)->format('%A, %d %B %Y') }}</b>
                <hr/>
            </div>

            <div>
                <span>کد پیگیری: </span><b>{{ $transaction->trace }}</b>
                <hr/>
            </div>


            @if($transaction->request != null)
                <div>
                    <span>نوع درخواست: </span><b>درخواست بازنشستگی</b>
                    <hr/>
                </div>
            @else
                <div>
                    <span>نوع درخواست: </span><b>درخواست سابقه بیمه</b>
                    <hr/>
                </div>
            @endif

        </div>
    </div>
@endsection
@include('admin.theme.master')

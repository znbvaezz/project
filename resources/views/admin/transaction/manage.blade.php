@section('title', 'مدیریت تراکنش ها')
@section('content')

    <div class="card card-default">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">کاربر</th>
                <th scope="col">مبلغ</th>
                <th scope="col">وضعیت</th>
                <th scope="col" width="30%">عملیات</th>
            </tr>
            </thead>
            <tbody>

            @php
                $page = Request()->has('page') ? Request()->page : 1;
                $index = 1 + (($page - 1) * $transactions->perPage());
            @endphp
            @foreach($transactions as $transaction)
                <tr>
                    <th>{{ $index }}</th>
                    <td>
                        @if($transaction->request != null)
                            {{ $transaction->request->insurance->full_name }}
                        @else
                            {{ $transaction->history->insurance->full_name }}
                        @endif
                    </td>
                    <td>{{ number_format($transaction->price) . ' تومان' }}</td>
                    <td><span
                            class="badge @if($transaction->success){{ 'badge-success' }}@else{{ 'badge-warning' }}@endif">@if($transaction->success){{ 'موفق' }}@else{{ 'در انتظار پرداخت' }}@endif</span>
                    </td>
                    <td>
                        <button class="mb-1 btn btn-outline-dark" type="button"
                                onclick="window.location.href= '{{ Route('admin_transaction_single',['id' => $transaction->id]) }}'">
                            مشاهده جزئیات
                        </button>
                    </td>
                </tr>
                @php
                    $index++;
                @endphp
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-2">{{ $transactions->render() }}</div>
@endsection
@include('admin.theme.master')

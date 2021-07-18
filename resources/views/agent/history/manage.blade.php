@section('title', 'مدیریت تراکنش ها')
@section('content')

    <div class="card card-default">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">کاربر</th>
                <th scope="col">مبلغ پرداخت شده</th>
                <th scope="col">وضعیت</th>
                <th scope="col" width="30%">عملیات</th>
            </tr>
            </thead>
            <tbody>

            @php
                $page = Request()->has('page') ? Request()->page : 1;
                $index = 1 + (($page - 1) * $histories->perPage());
            @endphp
            @foreach($histories as $history)
                <tr>
                    <th>{{ $index }}</th>
                    <td>{{ $history->insurance->full_name }}</td>
                    <td>{{ number_format($history->transaction->price) . ' تومان' }}</td>
                    <td><span
                            class="badge @if($history->transaction->success){{ 'badge-success' }}@else{{ 'badge-warning' }}@endif">@if($history->transaction->success){{ 'موفق' }}@else{{ 'در انتظار پرداخت' }}@endif</span>
                    </td>

                    <td>
                        <button class="mb-1 btn btn-outline-dark" type="button"
                                onclick="window.location.href= '{{ Route('agent_history_single',['id' => $history->id]) }}'">
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

    <div class="mt-2">{{ $histories->render() }}</div>
@endsection
@include('admin.theme.master')

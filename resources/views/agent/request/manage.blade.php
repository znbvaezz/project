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
                $index = 1 + (($page - 1) * $requests->perPage());
            @endphp
            @foreach($requests as $request)
                <tr>
                    <th>{{ $index }}</th>
                    <td>{{ $request->insurance->full_name }}</td>
                    <td>{{ number_format($request->transaction->price) . ' تومان' }}</td>
                    <td><span
                            class="badge @if($request->transaction->success){{ 'badge-success' }}@else{{ 'badge-warning' }}@endif">@if($request->transaction->success){{ 'موفق' }}@else{{ 'در انتظار پرداخت' }}@endif</span>
                    </td>

                    <td>
                        <button class="mb-1 btn btn-outline-dark" type="button"
                                onclick="window.location.href= '{{ Route('agent_request_single',['id' => $request->id]) }}'">
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

    <div class="mt-2">{{ $requests->render() }}</div>
@endsection
@include('admin.theme.master')

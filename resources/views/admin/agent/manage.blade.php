@section('title', 'مدیریت کارگزاری ها')
@section('buttons')
    <button class="btn btn-secondary" type="button" onclick="window.location.href='{{ Route('admin_agent_add') }}'">
        افزودن نمایندگی
    </button>
@endsection
@section('content')

    <div class="card card-default">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">نام نمایندگی</th>
                <th scope="col">تاریخ عضویت</th>
                <th scope="col" width="30%">عملیات</th>
            </tr>
            </thead>
            <tbody>

            @php
                $page = Request()->has('page') ? Request()->page : 1;
                $index = 1 + (($page - 1) * $agents->perPage());
            @endphp
            @foreach($agents as $agent)
                <tr>
                    <th>{{ $index }}</th>
                    <td>
                        {{ $agent->user->name }}
                    </td>

                    <td>
                        {{ \Morilog\Jalali\Jalalian::fromDateTime($agent->created_at)->format('%A, %d %B %Y') }}
                    </td>

                    <td>
                        <button class="mb-1 btn btn-outline-dark" type="button"
                                onclick="window.location.href= '{{ Route('admin_agent_edit',['id' => $agent->id]) }}'">
                            ویرایش
                        </button>

                        <button class="mb-1 btn btn-outline-danger" type="button"
                                onclick="confirmDelete({{ $agent->id }})">حذف
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

    <div class="mt-2">{{ $agents->render() }}</div>
@endsection

@section('scripts')
    <script>
        function confirmDelete(id) {
            swal({
                title: "آیا مطمئن هستید؟",
                text: "در صورت تایید، این آیتم حذف خواهد شد. ادامه می دهید؟",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then(function (willDelete) {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: '',
                        dataType: "json",
                        data: {
                            '_token': $("meta[name='csrf-token']").attr('content'),
                            'id': id,
                            'action': 'delete'
                        },
                        success: function (data) {
                            if (data.success) {
                                toastr.success(data.message);
                                location.reload();
                            } else
                                toastr.error(data.message);
                        },
                        error: function () {
                            toastr.error("خطایی سمت سرور رخ داد. لطفا این موضوع را گزارش کنید.");
                        }
                    });
                }
            });
        }
    </script>
@endsection

@include('admin.theme.master')

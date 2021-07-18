@section('content')
    <div>
        <span>{{ $message }}</span>
        <hr/>
    </div>

    @if(!empty($trace))
        <div>
            <span>شماره پیگیری: </span>{{ $trace }}
            <hr/>
        </div>
    @endif

@endsection
@include('web.theme.master')

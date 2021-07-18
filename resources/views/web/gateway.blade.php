@section('content')

    <form method="post" action="{{ Route('gateway') }}">
        {{ csrf_field() }}
        <div>
            <span>نوع درخواست: </span>{{ $title }}
            <hr/>
        </div>

        <div>
            <span>مبلغ پرداخت: </span>{{ number_format($price) }} تومان
            <hr/>
        </div>

        <input type="hidden" name="insurance_id" value="{{ $insuranceId }}">
        <input type="hidden" name="action" value="{{ $action }}">
        <input type="hidden" name="price" value="{{ $price }}">

        @if($action == 'request')
            <div class="form-group">
                <input type="tel" class="form-control" value="" name="postal_code" placeholder="کد پستی"/>
            </div>

            <div class="form-group">
                <input type="tel" class="form-control" value="" name="address" placeholder="آدرس"/>
            </div>

            <div class="form-group">
                <input type="tel" class="form-control" value="" name="phone_number" placeholder="شماره تلفن"/>
            </div>

        @endif

        <div class="form-group">
            <label>انتخاب نمایندگی</label>
            <select name="agent_id">
                @foreach(\App\Models\Admin::where('type', 'agent')->get() as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="tel" class="form-control" value="" name="card_number" placeholder="شماره کارت"/>
        </div>

        <div class="form-group" style="text-align: center">
            <input type="submit" class="btn" value="پرداخت">
        </div>

    </form>
@endsection
@include('web.theme.master')

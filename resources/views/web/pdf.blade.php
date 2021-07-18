<div>
   <div> <span>FirstName: </span><b>{{ $insurance->first_name }}</b></div>
   <div> <span>LastName: </span><b>{{ $insurance->last_name }}</b></div>
   <div> <span>National Id: </span><b>{{ $insurance->national_id }}</b></div>
   <div> <span>Insurance Id: </span><b>{{ $insurance->insurance_number }}</b></div>
   <div> <span>Retired: </span><b>@if($insurance->retired){{ 'Yes' }}@else{{ 'No' }}@endif</b></div>
   <div> <span>Insurance history: </span><b>{{ \Carbon\Carbon::now()->diffInYears($insurance->insurance_time) }} Years</b></div>
</div>

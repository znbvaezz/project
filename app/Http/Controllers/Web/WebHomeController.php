<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebHomeController extends Controller
{
    function index(Request $request)
    {
        if ($request->isMethod('GET')) {
            $pageTitle = 'بیمه';
            return view('web.index', compact('pageTitle'));
        }

        $validator = Validator::make($request->all(), [
            'action' => 'required|in:history,request',
            'national_code' => 'required|numeric',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'insurance_number' => 'required|numeric',
        ]);

        if($validator->fails())
            return view('web.result')->with('message', 'خطا رخ داد.')
                ->with('pageTitle', 'خطا رخ داد.');

        $insurance = Insurance::where('national_id',$request->national_code)
            ->where('first_name', $request->first_name)
            ->where('last_name', $request->last_name)
            ->where('insurance_number', $request->insurance_number)
            ->first();

        if($validator->fails())
            return view('web.result')->with('message', 'کاربر یافت نشد.')
                ->with('pageTitle', 'خطا!');

        switch ($request->action) {
            case 'history':
                return view('web.gateway')->with('action', $request->action)
                    ->with('title', 'سابقه بیمه')
                    ->with('pageTitle', 'سابقه بیمه')
                    ->with('insuranceId', $insurance->id)
                    ->with('price', 10000);

            case 'request':
                if($insurance->retired)
                    return view('web.result')->with('message', 'شما قبلا بازنشست شده اید.')
                        ->with('pageTitle', 'خطا!');

                if(Carbon::now()->diffInYears($insurance->insurance_time) < 10)
                    return view('web.result')->with('message', 'سابقه شما زیر 10 سال است.')
                        ->with('pageTitle', 'خطا!');

                return view('web.gateway')->with('action', $request->action)
                    ->with('title', 'درخواست بازنشتسگی')
                    ->with('pageTitle', 'درخواست بازنشتسگی')
                    ->with('insuranceId', $insurance->id)
                    ->with('price', 20000);
        }

        return null;
    }
}

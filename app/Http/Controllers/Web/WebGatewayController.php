<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Insurance;
use App\Models\InsuranceHistory;
use App\Models\InsuranceRequest;
use App\Models\Transaction;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class WebGatewayController extends Controller
{
    public function index(Request $request)
    {

        $insurance = Insurance::findOrFail($request->insurance_id);
        $agent = Admin::where('type', 'agent')->findOrFail($request->agent_id);


        switch ($request->action) {
            case 'request':
                $validator = Validator::make($request->all(), [
                    'action' => 'required|in:request,history',
                    'insurance_id' => 'required|numeric',
                    'price' => 'required|numeric',
                    'card_number' => 'required|numeric',
                    'postal_code' => 'required|numeric',
                    'address' => 'required|string',
                    'phone_number' => 'required|string',
                    'agent_id' => 'required|numeric'
                ]);

                if ($validator->fails())
                    return view('web.result')->with('message', 'خطا رخ داد.')
                        ->with('pageTitle', 'خطا رخ داد.');

                $transaction = Transaction::create([
                    'price' => $request->price,
                    'success' => 1,
                    'card_number' => $request->card_number,
                    'trace' => $this->generateRandomString(8)
                ]);

                InsuranceRequest::create([
                    'insurance_id' => $insurance->id,
                    'transaction_id' => $transaction->id,
                    'postal_code' => $request->postal_code,
                    'address' => $request->address,
                    'phone_number' => $request->phone_number,
                    'agent_id' => $agent->id
                ]);

                return view('web.result')->with('message', 'پرداخت انجام شد. درخواست بازنشستگی ثبت شد.')
                    ->with('pageTitle', 'درخواست بازنشستگی')
                    ->with('trace', $transaction->trace);

            case 'history':
                $validator = Validator::make($request->all(), [
                    'action' => 'required|in:request,history',
                    'insurance_id' => 'required|numeric',
                    'price' => 'required|numeric'
                ]);

                if ($validator->fails())
                    return view('web.result')->with('message', 'خطا رخ داد.')
                        ->with('pageTitle', 'خطا رخ داد.');

                $data = [
                    'insurance' => $insurance
                ];

                $transaction = Transaction::create([
                    'price' => $request->price,
                    'success' => 1,
                    'card_number' => $request->card_number,
                    'trace' => $this->generateRandomString(8)
                ]);

                InsuranceHistory::create([
                    'insurance_id' => $insurance->id,
                    'transaction_id' => $transaction->id,
                    'agent_id' => $agent->id
                ]);

                $pdf = App::make('dompdf.wrapper');
                $pdf = $pdf->loadView('web.pdf', $data);
                return $pdf->download('invoice.pdf');
        }

        return null;
    }

    private function generateRandomString($length = 10): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

<?php

namespace App\Http\Controllers\Agent\Request;

use App\Http\Controllers\Controller;
use App\Models\InsuranceRequest;
use Illuminate\Http\Request;

class RequestSingleController extends Controller
{
    public function index($id, Request $request)
    {
        $agent = $request->user('web')->admin;
        $request = InsuranceRequest::with('transaction')->where('agent_id', $agent->id)->findOrFail($id);
        return view('agent.request.single', compact('request'));
    }
}

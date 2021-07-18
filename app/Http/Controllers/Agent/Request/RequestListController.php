<?php

namespace App\Http\Controllers\Agent\Request;

use App\Http\Controllers\Controller;
use App\Models\InsuranceRequest;
use Illuminate\Http\Request;

class RequestListController extends Controller
{
    public function index(Request $request)
    {
        $agent = $request->user('web')->admin;
        $requests = InsuranceRequest::where('agent_id', $agent->id)->orderByDesc('created_at')->paginate();
        return view('agent.request.manage', compact('requests'));
    }
}

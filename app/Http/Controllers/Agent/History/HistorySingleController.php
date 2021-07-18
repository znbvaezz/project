<?php

namespace App\Http\Controllers\Agent\History;

use App\Http\Controllers\Controller;
use App\Models\InsuranceHistory;
use Illuminate\Http\Request;

class HistorySingleController extends Controller
{
    public function index($id, Request $request)
    {
        $agent = $request->user('web')->admin;
        $request = InsuranceHistory::with('transaction')->where('agent_id', $agent->id)->findOrFail($id);
        return view('agent.history.single', compact('request'));
    }
}

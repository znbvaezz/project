<?php

namespace App\Http\Controllers\Agent\History;

use App\Http\Controllers\Controller;
use App\Models\InsuranceHistory;
use Illuminate\Http\Request;

class HistoryListController extends Controller
{
    public function index(Request $request)
    {
        $agent = $request->user('web')->admin;
        $histories = InsuranceHistory::where('agent_id', $agent->id)->orderByDesc('created_at')->paginate();
        return view('agent.history.manage', compact('histories'));
    }
}

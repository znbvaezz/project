<?php

namespace App\Http\Controllers\Admin\Agent;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AgentListController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('GET')) {
            $agents = Admin::with('user')->where('type', 'agent')->paginate();
            return view('admin.agent.manage', compact('agents'));
        }

        switch ($request->action) {
            case 'delete':
                Admin::where('type', 'agent')->findOrFail($request->id)->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'با موفقیت حذف شد.'
                ]);
        }

        return null;
    }
}

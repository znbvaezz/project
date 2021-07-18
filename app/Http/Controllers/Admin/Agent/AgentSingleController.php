<?php

namespace App\Http\Controllers\Admin\Agent;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AgentSingleController extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('GET'))
            return view('admin.agent.add');

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->all());

        if (User::where('email', $request->email)->exists())
            return redirect()->back()->withErrors('این ایمیل قبلا ثبت شده است.');


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $agent = Admin::create([
            'user_id' => $user->id,
            'type' => 'agent'
        ]);

        return redirect()->route('admin_agent_edit', ['id' => $agent->id])->with('success', 'نمایندگی با موفقیت افزوده شد.');
    }

    public function edit($id, Request $request)
    {
        $agent = Admin::with('user')->where('type', 'agent')->findOrFail($id);
        if ($request->isMethod('GET'))
            return view('admin.agent.add', compact('agent'));

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|string'
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->all());

        if (User::where('email', $request->email)
            ->where('id', '<>', $agent->user_id)
            ->exists())
            return redirect()->back()->withErrors('این ایمیل قبلا ثبت شده است.');

        $password = null;

        if (!empty($request->password))
            $password = Hash::make($request->password);

        $agent->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password == null ? $agent->user->password : $password
        ]);

        return redirect()->back()->with('success', 'ویرایش با موفقیت انجام شد.');
    }
}

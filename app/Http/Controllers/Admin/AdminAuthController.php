<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $user = Auth::guard('web')->user();

        if ($user != null && $user->is_admin)
            return redirect()->route('admin_dashboard');

        if ($request->isMethod('GET'))
            return view('admin.login');

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

         if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors())->withInput();

        if (!Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], true))
            return redirect()->back()->withErrors('ایمیل یا رمز عبور اشتباه است.');

        $user = Auth::guard('web')->user();
        if (!$user->is_admin)
            return redirect()->back()->withErrors('ایمیل یا رمز عبور اشتباه است.');

        return redirect(Route('admin_dashboard'));
    }

    public function logout()
    {
        if (Auth::guard('web')->check())
            Auth::guard('web')->logout();

        return redirect()->route('admin_login');
    }
}

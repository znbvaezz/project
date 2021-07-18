<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Contact;
use App\Models\InsuranceHistory;
use App\Models\InsuranceRequest;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $requestsCount = InsuranceRequest::count();
        $historiesCount = InsuranceHistory::count();
        return view('admin.dashboard', compact('usersCount', 'requestsCount', 'historiesCount'));
    }
}

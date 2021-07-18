<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionListController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::with(['history.insurance', 'request.insurance'])->orderByDesc('created_at')->paginate();
        return view('admin.transaction.manage', compact('transactions'));
    }
}

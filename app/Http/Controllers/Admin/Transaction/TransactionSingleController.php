<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionSingleController extends Controller
{
    public function index($id, Request $request) {
        $transaction = Transaction::with(['request', 'history'])->findOrFail($id);
        return view('admin.transaction.single', compact('transaction'));
    }
}

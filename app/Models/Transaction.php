<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['price', 'success', 'card_number', 'trace'];

    public function request()
    {
        return $this->belongsTo(InsuranceRequest::class, 'id', 'transaction_id');
    }

    public function history()
    {
        return $this->belongsTo(InsuranceHistory::class, 'id', 'transaction_id');
    }
}

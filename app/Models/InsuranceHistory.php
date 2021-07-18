<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsuranceHistory extends Model
{
    protected $table = 'insurance_histories';
    protected $fillable = ['insurance_id', 'transaction_id', 'path', 'agent_id'];

    public function insurance()
    {
        return $this->belongsTo(Insurance::class, 'insurance_id');
    }

    public function agent()
    {
        return $this->belongsTo(Admin::class, 'agent_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}

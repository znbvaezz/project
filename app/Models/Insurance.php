<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $table = 'insurances';
    protected $fillable = ['first_name', 'last_name', 'national_id', 'insurance_number', 'insurance_time'];
    protected $dates = ['insurance_time'];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}

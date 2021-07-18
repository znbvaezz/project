<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getIsAdminAttribute()
    {
        return Admin::where('user_id', $this->id)->exists();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id', 'user_id');
    }
}

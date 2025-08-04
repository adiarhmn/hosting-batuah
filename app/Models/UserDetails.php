<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'status',
        'user_id',
        'username',
        'code',
        'phone',
        'address',
        'expires_at'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'status' => 'string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

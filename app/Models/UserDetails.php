<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'phone',
        'address',
        'status', // New field added for user status
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

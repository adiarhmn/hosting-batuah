<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';
    protected $fillable = [
        'name_package',
        'bandwidth',
        'disk_space',
        'max_subdomains',
        'max_db_mysql',
        'status'
    ];
}

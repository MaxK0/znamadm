<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    protected $fillable = [
        'fio',
        'position',
        'intake',
        'contact',
    ];
}

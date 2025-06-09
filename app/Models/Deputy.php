<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deputy extends Model
{
    protected $fillable = [
        'fio',
        'birth_date',
        'position',
        'phone',
        'image'
    ];

    protected function casts()
    {
        return [
            'birth_date' => 'date',
        ];
    }
}

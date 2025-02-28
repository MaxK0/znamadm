<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'title',
        'published_at',
        'views',
        'is_relevant',
        'description',
        'is_active',
        'file_path',
        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo(DocumentType::class, 'type_id');
    }

    protected function casts()
    {
        return [
            'published_at' => 'date',
            'is_relevant' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}

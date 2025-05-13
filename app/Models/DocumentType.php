<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentType extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'type_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    protected $casts = [
        'files' => 'array',
    ];
    
    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }
}

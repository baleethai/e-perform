<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonnelResearch extends Model
{
    use HasFactory;

    protected $casts = [
        'published' => 'date',
    ];
    
    public function personnel(): BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }
}

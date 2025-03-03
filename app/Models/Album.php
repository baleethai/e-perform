<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Album extends Model
{
    use HasFactory;

    protected $casts = [
        'files' => 'array',
    ];

    public function albumType(): BelongsTo
    {
        return $this->belongsTo(AlbumType::class);
    }
}

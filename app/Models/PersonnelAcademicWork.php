<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelAcademicWork extends Model
{
    use HasFactory;

    protected $casts = [
        'documents' => 'array',
    ];

    public function personnel(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }
}

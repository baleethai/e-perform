<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonnelEducation extends Model
{
    use HasFactory;

    protected $casts = [
        'educational_evidence' => 'array',
    ];

    public function personnel(): BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }

    public function personnelEducationLevel(): BelongsTo
    {
        return $this->belongsTo(PersonnelEducationLevel::class);
    }

}

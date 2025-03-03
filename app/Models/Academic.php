<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;

    protected $casts = [
        'documents' => 'array',
    ];

    public function academicType()
    {
        return $this->belongsTo(AcademicType::class);
    }
}

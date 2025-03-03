<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PersonnelEducationLevel extends Model
{
    use HasFactory;

    public function personnelEducations(): HasMany
    {
        return $this->hasMany(PersonnelEducation::class);
    }
}

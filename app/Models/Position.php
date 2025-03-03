<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class Position extends Model
{
    use HasFactory;

    public static function boot() {
        parent::boot();
        self::creating(function ($model) {
            $model->code = UniqueIdGenerator::generate(['table' => 'positions', 'field' => 'code', 'length' => 16, 'prefix' =>'POS' . date('ym')]);
        });
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function personnels(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Personnel::class);
    }
}

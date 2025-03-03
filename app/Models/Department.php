<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class Department extends Model
{
    use HasFactory;

    public static function boot() {
        parent::boot();
        self::creating(function ($model) {
            $model->code = UniqueIdGenerator::generate(['table' => 'departments', 'field' => 'code', 'length' => 16, 'prefix' =>'DEP' . date('ym')]);
        });
    }

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }
}

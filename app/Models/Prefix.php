<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class Prefix extends Model
{
    use HasFactory;

    public static function boot() {
        parent::boot();
        self::creating(function ($model) {
            $model->code = UniqueIdGenerator::generate(['table' => 'prefixes', 'field' => 'code', 'length' => 16, 'prefix' =>'PRE' . date('ym')]);
        });
    }

    public function personnels(): HasMany
    {
        return $this->hasMany(Personnel::class);
    }
}

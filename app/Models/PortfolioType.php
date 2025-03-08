<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class PortfolioType extends Model
{
    use HasFactory;

    public static function boot() {
        parent::boot();
        self::creating(function ($model) {
            $model->code = UniqueIdGenerator::generate(['table' => 'portfolio_types', 'field' => 'code', 'length' => 16, 'prefix' =>'PTY' . date('ym')]);
        });
    }

    public function portfolioItems(): HasMany
    {
        return $this->hasMany(PortfolioItem::class);
    }
}

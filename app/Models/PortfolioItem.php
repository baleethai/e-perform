<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class PortfolioItem extends Model
{
    use HasFactory;

    public static function boot() {
        parent::boot();
        self::creating(function ($model) {
            $model->code = UniqueIdGenerator::generate(['table' => 'portfolio_items', 'field' => 'code', 'length' => 16, 'prefix' =>'POI' . date('ym')]);
        });
    }

    public function portfolioType(): BelongsTo
    {
        return $this->belongsTo(PortfolioType::class);
    }

    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class);
    }
}

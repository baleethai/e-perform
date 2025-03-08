<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class Portfolio extends Model
{
    use HasFactory;

    public static function boot() {
        parent::boot();
        self::creating(function ($model) {
            $model->code = UniqueIdGenerator::generate(['table' => 'portfolios', 'field' => 'code', 'length' => 16, 'prefix' =>'POT' . date('ym')]);
        });
    }

    protected $casts = [
        'started_at' => 'date:Y-m-d',
        'ended_at' => 'date:Y-m-d',
    ];

    public function personnel(): BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }

    public function portfolioItems(): HasMany
    {
        return $this->hasMany(PortfolioItem::class);
    }

}

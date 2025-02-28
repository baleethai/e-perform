<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum WorkStatus: string implements HasLabel
{
    case PERFORMWORK = 'performwork';
    case RESIGN = 'resign';
    case RETIREMENT = 'retirement';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PERFORMWORK => 'Performwork',
            self::RESIGN => 'Resign',
            self::RETIREMENT => 'Retirement',
        };
    }
    
    public function getColor(): string | array | null
    {
        return match ($this) {
            self::PERFORMWORK => 'success',
            self::RESIGN => 'warning',
            self::RETIREMENT => 'gray',
        };
    }    
}
<?php

namespace App\Models;

use App\Enums\WorkStatus;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected function casts(): array
    {
        return [
            'work_status' => WorkStatus::class,
        ];
    }
}

<?php

namespace App\Filament\Resources\TaskItemResource\Pages;

use App\Filament\Resources\TaskItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTaskItem extends CreateRecord
{
    protected static string $resource = TaskItemResource::class;
}

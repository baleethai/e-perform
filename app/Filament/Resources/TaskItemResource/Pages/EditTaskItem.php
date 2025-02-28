<?php

namespace App\Filament\Resources\TaskItemResource\Pages;

use App\Filament\Resources\TaskItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTaskItem extends EditRecord
{
    protected static string $resource = TaskItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

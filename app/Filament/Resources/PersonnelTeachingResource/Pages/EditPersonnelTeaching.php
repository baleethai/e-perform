<?php

namespace App\Filament\Resources\PersonnelTeachingResource\Pages;

use App\Filament\Resources\PersonnelTeachingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersonnelTeaching extends EditRecord
{
    protected static string $resource = PersonnelTeachingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

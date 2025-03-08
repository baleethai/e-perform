<?php

namespace App\Filament\Resources\PersonnelEducationLevelResource\Pages;

use App\Filament\Resources\PersonnelEducationLevelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersonnelEducationLevel extends EditRecord
{
    protected static string $resource = PersonnelEducationLevelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

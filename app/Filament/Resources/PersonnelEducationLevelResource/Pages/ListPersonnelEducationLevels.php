<?php

namespace App\Filament\Resources\PersonnelEducationLevelResource\Pages;

use App\Filament\Resources\PersonnelEducationLevelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersonnelEducationLevels extends ListRecords
{
    protected static string $resource = PersonnelEducationLevelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

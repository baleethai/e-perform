<?php

namespace App\Filament\Resources\PersonnelEducationResource\Pages;

use App\Filament\Resources\PersonnelEducationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersonnelEducation extends ListRecords
{
    protected static string $resource = PersonnelEducationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

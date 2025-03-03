<?php

namespace App\Filament\Resources\PersonnelAcademicWorkResource\Pages;

use App\Filament\Resources\PersonnelAcademicWorkResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersonnelAcademicWorks extends ListRecords
{
    protected static string $resource = PersonnelAcademicWorkResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

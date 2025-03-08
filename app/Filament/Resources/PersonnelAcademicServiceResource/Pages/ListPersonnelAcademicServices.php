<?php

namespace App\Filament\Resources\PersonnelAcademicServiceResource\Pages;

use App\Filament\Resources\PersonnelAcademicServiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersonnelAcademicServices extends ListRecords
{
    protected static string $resource = PersonnelAcademicServiceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PersonnelWorkResource\Pages;

use App\Filament\Resources\PersonnelWorkResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersonnelWorks extends ListRecords
{
    protected static string $resource = PersonnelWorkResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PersonnelResearchResource\Pages;

use App\Filament\Resources\PersonnelResearchResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersonnelResearch extends ListRecords
{
    protected static string $resource = PersonnelResearchResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

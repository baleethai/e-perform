<?php

namespace App\Filament\Resources\PersonnelPreservingResource\Pages;

use App\Filament\Resources\PersonnelPreservingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersonnelPreservings extends ListRecords
{
    protected static string $resource = PersonnelPreservingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

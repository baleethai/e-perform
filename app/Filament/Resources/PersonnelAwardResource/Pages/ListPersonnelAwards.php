<?php

namespace App\Filament\Resources\PersonnelAwardResource\Pages;

use App\Filament\Resources\PersonnelAwardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersonnelAwards extends ListRecords
{
    protected static string $resource = PersonnelAwardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

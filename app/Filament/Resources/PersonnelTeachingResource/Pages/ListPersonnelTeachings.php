<?php

namespace App\Filament\Resources\PersonnelTeachingResource\Pages;

use App\Filament\Resources\PersonnelTeachingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersonnelTeachings extends ListRecords
{
    protected static string $resource = PersonnelTeachingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

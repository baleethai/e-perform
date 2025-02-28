<?php

namespace App\Filament\Resources\AcamedicTypeResource\Pages;

use App\Filament\Resources\AcamedicTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcamedicTypes extends ListRecords
{
    protected static string $resource = AcamedicTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

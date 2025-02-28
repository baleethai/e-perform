<?php

namespace App\Filament\Resources\PortfolioAcamedicAdministrativeWorkResource\Pages;

use App\Filament\Resources\PortfolioAcamedicAdministrativeWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioAcamedicAdministrativeWorks extends ListRecords
{
    protected static string $resource = PortfolioAcamedicAdministrativeWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

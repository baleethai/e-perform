<?php

namespace App\Filament\Resources\PortfolioAcamedicServiceResource\Pages;

use App\Filament\Resources\PortfolioAcamedicServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioAcamedicServices extends ListRecords
{
    protected static string $resource = PortfolioAcamedicServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

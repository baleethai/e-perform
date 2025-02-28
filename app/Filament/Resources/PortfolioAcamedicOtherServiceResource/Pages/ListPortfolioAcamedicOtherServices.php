<?php

namespace App\Filament\Resources\PortfolioAcamedicOtherServiceResource\Pages;

use App\Filament\Resources\PortfolioAcamedicOtherServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioAcamedicOtherServices extends ListRecords
{
    protected static string $resource = PortfolioAcamedicOtherServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

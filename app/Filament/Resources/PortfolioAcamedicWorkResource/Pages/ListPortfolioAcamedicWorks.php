<?php

namespace App\Filament\Resources\PortfolioAcamedicWorkResource\Pages;

use App\Filament\Resources\PortfolioAcamedicWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioAcamedicWorks extends ListRecords
{
    protected static string $resource = PortfolioAcamedicWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

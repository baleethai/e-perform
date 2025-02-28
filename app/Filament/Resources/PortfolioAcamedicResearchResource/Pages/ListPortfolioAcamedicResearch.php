<?php

namespace App\Filament\Resources\PortfolioAcamedicResearchResource\Pages;

use App\Filament\Resources\PortfolioAcamedicResearchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioAcamedicResearch extends ListRecords
{
    protected static string $resource = PortfolioAcamedicResearchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

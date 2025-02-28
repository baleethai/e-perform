<?php

namespace App\Filament\Resources\PortfolioAcamedicOtherWorkResource\Pages;

use App\Filament\Resources\PortfolioAcamedicOtherWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioAcamedicOtherWorks extends ListRecords
{
    protected static string $resource = PortfolioAcamedicOtherWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

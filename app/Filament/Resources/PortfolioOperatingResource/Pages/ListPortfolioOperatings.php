<?php

namespace App\Filament\Resources\PortfolioOperatingResource\Pages;

use App\Filament\Resources\PortfolioOperatingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioOperatings extends ListRecords
{
    protected static string $resource = PortfolioOperatingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

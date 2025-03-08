<?php

namespace App\Filament\Resources\PortfolioTypeResource\Pages;

use App\Filament\Resources\PortfolioTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioTypes extends ListRecords
{
    protected static string $resource = PortfolioTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

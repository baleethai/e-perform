<?php

namespace App\Filament\Resources\PortfolioAcamedicOtherAwardResource\Pages;

use App\Filament\Resources\PortfolioAcamedicOtherAwardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioAcamedicOtherAwards extends ListRecords
{
    protected static string $resource = PortfolioAcamedicOtherAwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

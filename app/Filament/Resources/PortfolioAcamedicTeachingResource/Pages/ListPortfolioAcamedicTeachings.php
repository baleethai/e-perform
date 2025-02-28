<?php

namespace App\Filament\Resources\PortfolioAcamedicTeachingResource\Pages;

use App\Filament\Resources\PortfolioAcamedicTeachingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioAcamedicTeachings extends ListRecords
{
    protected static string $resource = PortfolioAcamedicTeachingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

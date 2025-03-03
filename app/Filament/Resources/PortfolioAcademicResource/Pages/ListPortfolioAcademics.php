<?php

namespace App\Filament\Resources\PortfolioAcademicResource\Pages;

use App\Filament\Resources\PortfolioAcademicResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioAcademics extends ListRecords
{
    protected static string $resource = PortfolioAcademicResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

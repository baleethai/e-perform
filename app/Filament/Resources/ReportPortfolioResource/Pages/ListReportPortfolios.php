<?php

namespace App\Filament\Resources\ReportPortfolioResource\Pages;

use App\Filament\Resources\ReportPortfolioResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportPortfolios extends ListRecords
{
    protected static string $resource = ReportPortfolioResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

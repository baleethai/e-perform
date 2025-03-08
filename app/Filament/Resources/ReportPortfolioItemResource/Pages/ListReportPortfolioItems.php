<?php

namespace App\Filament\Resources\ReportPortfolioItemResource\Pages;

use App\Filament\Resources\ReportPortfolioItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportPortfolioItems extends ListRecords
{
    protected static string $resource = ReportPortfolioItemResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

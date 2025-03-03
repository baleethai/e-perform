<?php

namespace App\Filament\Resources\ReportPersonnelSummaryResource\Pages;

use App\Filament\Resources\ReportPersonnelSummaryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportPersonnelSummaries extends ListRecords
{
    protected static string $resource = ReportPersonnelSummaryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

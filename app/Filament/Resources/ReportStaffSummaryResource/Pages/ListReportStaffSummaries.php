<?php

namespace App\Filament\Resources\ReportStaffSummaryResource\Pages;

use App\Filament\Resources\ReportStaffSummaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportStaffSummaries extends ListRecords
{
    protected static string $resource = ReportStaffSummaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

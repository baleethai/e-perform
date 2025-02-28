<?php

namespace App\Filament\Resources\ReportStaffSummaryResource\Pages;

use App\Filament\Resources\ReportStaffSummaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReportStaffSummary extends EditRecord
{
    protected static string $resource = ReportStaffSummaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

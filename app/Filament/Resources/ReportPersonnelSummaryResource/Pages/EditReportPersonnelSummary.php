<?php

namespace App\Filament\Resources\ReportPersonnelSummaryResource\Pages;

use App\Filament\Resources\ReportPersonnelSummaryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReportPersonnelSummary extends EditRecord
{
    protected static string $resource = ReportPersonnelSummaryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\ReportEducationLevelResource\Pages;

use App\Filament\Resources\ReportEducationLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReportEducationLevel extends EditRecord
{
    protected static string $resource = ReportEducationLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

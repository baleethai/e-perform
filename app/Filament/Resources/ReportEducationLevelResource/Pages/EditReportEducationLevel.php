<?php

namespace App\Filament\Resources\ReportEducationLevelResource\Pages;

use App\Filament\Resources\ReportEducationLevelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReportEducationLevel extends EditRecord
{
    protected static string $resource = ReportEducationLevelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

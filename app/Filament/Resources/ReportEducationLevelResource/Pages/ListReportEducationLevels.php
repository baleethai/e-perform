<?php

namespace App\Filament\Resources\ReportEducationLevelResource\Pages;

use App\Filament\Resources\ReportEducationLevelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportEducationLevels extends ListRecords
{
    protected static string $resource = ReportEducationLevelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

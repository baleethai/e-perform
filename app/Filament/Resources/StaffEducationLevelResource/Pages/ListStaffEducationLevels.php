<?php

namespace App\Filament\Resources\StaffEducationLevelResource\Pages;

use App\Filament\Resources\StaffEducationLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaffEducationLevels extends ListRecords
{
    protected static string $resource = StaffEducationLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

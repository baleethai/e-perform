<?php

namespace App\Filament\Resources\StaffEducationResource\Pages;

use App\Filament\Resources\StaffEducationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaffEducation extends ListRecords
{
    protected static string $resource = StaffEducationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\StaffAcamedicWorkResource\Pages;

use App\Filament\Resources\StaffAcamedicWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaffAcamedicWorks extends ListRecords
{
    protected static string $resource = StaffAcamedicWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

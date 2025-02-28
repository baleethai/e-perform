<?php

namespace App\Filament\Resources\StaffAcamedicServiceResource\Pages;

use App\Filament\Resources\StaffAcamedicServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaffAcamedicServices extends ListRecords
{
    protected static string $resource = StaffAcamedicServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

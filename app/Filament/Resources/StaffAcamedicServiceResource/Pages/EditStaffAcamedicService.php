<?php

namespace App\Filament\Resources\StaffAcamedicServiceResource\Pages;

use App\Filament\Resources\StaffAcamedicServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaffAcamedicService extends EditRecord
{
    protected static string $resource = StaffAcamedicServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

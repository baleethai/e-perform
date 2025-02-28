<?php

namespace App\Filament\Resources\StaffAcamedicWorkResource\Pages;

use App\Filament\Resources\StaffAcamedicWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaffAcamedicWork extends EditRecord
{
    protected static string $resource = StaffAcamedicWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

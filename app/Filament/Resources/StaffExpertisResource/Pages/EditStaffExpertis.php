<?php

namespace App\Filament\Resources\StaffExpertisResource\Pages;

use App\Filament\Resources\StaffExpertisResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaffExpertis extends EditRecord
{
    protected static string $resource = StaffExpertisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

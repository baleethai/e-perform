<?php

namespace App\Filament\Resources\StaffWorkResource\Pages;

use App\Filament\Resources\StaffWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaffWork extends EditRecord
{
    protected static string $resource = StaffWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

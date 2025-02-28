<?php

namespace App\Filament\Resources\StaffAwardResource\Pages;

use App\Filament\Resources\StaffAwardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaffAward extends EditRecord
{
    protected static string $resource = StaffAwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

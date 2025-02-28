<?php

namespace App\Filament\Resources\StaffTeachingResource\Pages;

use App\Filament\Resources\StaffTeachingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaffTeaching extends EditRecord
{
    protected static string $resource = StaffTeachingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

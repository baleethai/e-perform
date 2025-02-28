<?php

namespace App\Filament\Resources\StaffEducationResource\Pages;

use App\Filament\Resources\StaffEducationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaffEducation extends EditRecord
{
    protected static string $resource = StaffEducationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

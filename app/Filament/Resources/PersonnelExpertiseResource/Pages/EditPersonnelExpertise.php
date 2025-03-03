<?php

namespace App\Filament\Resources\PersonnelExpertiseResource\Pages;

use App\Filament\Resources\PersonnelExpertiseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersonnelExpertise extends EditRecord
{
    protected static string $resource = PersonnelExpertiseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

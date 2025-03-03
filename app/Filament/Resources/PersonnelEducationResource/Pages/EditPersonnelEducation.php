<?php

namespace App\Filament\Resources\PersonnelEducationResource\Pages;

use App\Filament\Resources\PersonnelEducationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersonnelEducation extends EditRecord
{
    protected static string $resource = PersonnelEducationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

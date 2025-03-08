<?php

namespace App\Filament\Resources\PersonnelAcademicWorkResource\Pages;

use App\Filament\Resources\PersonnelAcademicWorkResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersonnelAcademicWork extends EditRecord
{
    protected static string $resource = PersonnelAcademicWorkResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

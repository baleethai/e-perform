<?php

namespace App\Filament\Resources\PersonnelAcademicServiceResource\Pages;

use App\Filament\Resources\PersonnelAcademicServiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersonnelAcademicService extends EditRecord
{
    protected static string $resource = PersonnelAcademicServiceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

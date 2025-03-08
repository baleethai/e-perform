<?php

namespace App\Filament\Resources\AcademicTypeResource\Pages;

use App\Filament\Resources\AcademicTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAcademicType extends EditRecord
{
    protected static string $resource = AcademicTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

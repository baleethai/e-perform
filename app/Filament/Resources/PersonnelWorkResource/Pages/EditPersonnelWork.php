<?php

namespace App\Filament\Resources\PersonnelWorkResource\Pages;

use App\Filament\Resources\PersonnelWorkResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersonnelWork extends EditRecord
{
    protected static string $resource = PersonnelWorkResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

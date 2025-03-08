<?php

namespace App\Filament\Resources\PersonnelAwardResource\Pages;

use App\Filament\Resources\PersonnelAwardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPersonnelAward extends EditRecord
{
    protected static string $resource = PersonnelAwardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

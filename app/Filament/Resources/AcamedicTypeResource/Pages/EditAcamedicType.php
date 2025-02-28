<?php

namespace App\Filament\Resources\AcamedicTypeResource\Pages;

use App\Filament\Resources\AcamedicTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAcamedicType extends EditRecord
{
    protected static string $resource = AcamedicTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

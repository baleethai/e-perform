<?php

namespace App\Filament\Resources\AcamedicResource\Pages;

use App\Filament\Resources\AcamedicResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAcamedic extends EditRecord
{
    protected static string $resource = AcamedicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

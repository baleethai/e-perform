<?php

namespace App\Filament\Resources\PrefixResource\Pages;

use App\Filament\Resources\PrefixResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrefix extends EditRecord
{
    protected static string $resource = PrefixResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

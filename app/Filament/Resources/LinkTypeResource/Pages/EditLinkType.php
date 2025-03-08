<?php

namespace App\Filament\Resources\LinkTypeResource\Pages;

use App\Filament\Resources\LinkTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLinkType extends EditRecord
{
    protected static string $resource = LinkTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

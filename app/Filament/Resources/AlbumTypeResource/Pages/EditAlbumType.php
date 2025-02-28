<?php

namespace App\Filament\Resources\AlbumTypeResource\Pages;

use App\Filament\Resources\AlbumTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlbumType extends EditRecord
{
    protected static string $resource = AlbumTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

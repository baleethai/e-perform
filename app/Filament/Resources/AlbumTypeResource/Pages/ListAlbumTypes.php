<?php

namespace App\Filament\Resources\AlbumTypeResource\Pages;

use App\Filament\Resources\AlbumTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlbumTypes extends ListRecords
{
    protected static string $resource = AlbumTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

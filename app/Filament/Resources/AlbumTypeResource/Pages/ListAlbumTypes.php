<?php

namespace App\Filament\Resources\AlbumTypeResource\Pages;

use App\Filament\Resources\AlbumTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlbumTypes extends ListRecords
{
    protected static string $resource = AlbumTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

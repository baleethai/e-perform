<?php

namespace App\Filament\Resources\PrefixResource\Pages;

use App\Filament\Resources\PrefixResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrefixes extends ListRecords
{
    protected static string $resource = PrefixResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

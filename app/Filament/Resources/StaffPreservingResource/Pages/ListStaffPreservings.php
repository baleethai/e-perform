<?php

namespace App\Filament\Resources\StaffPreservingResource\Pages;

use App\Filament\Resources\StaffPreservingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaffPreservings extends ListRecords
{
    protected static string $resource = StaffPreservingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

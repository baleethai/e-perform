<?php

namespace App\Filament\Resources\StaffTeachingResource\Pages;

use App\Filament\Resources\StaffTeachingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaffTeachings extends ListRecords
{
    protected static string $resource = StaffTeachingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

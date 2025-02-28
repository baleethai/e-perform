<?php

namespace App\Filament\Resources\StaffAwardResource\Pages;

use App\Filament\Resources\StaffAwardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaffAwards extends ListRecords
{
    protected static string $resource = StaffAwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

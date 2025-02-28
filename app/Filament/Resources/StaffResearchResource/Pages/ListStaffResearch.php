<?php

namespace App\Filament\Resources\StaffResearchResource\Pages;

use App\Filament\Resources\StaffResearchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaffResearch extends ListRecords
{
    protected static string $resource = StaffResearchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

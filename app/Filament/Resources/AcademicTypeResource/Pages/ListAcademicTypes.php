<?php

namespace App\Filament\Resources\AcademicTypeResource\Pages;

use App\Filament\Resources\AcademicTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcademicTypes extends ListRecords
{
    protected static string $resource = AcademicTypeResource::class;

    protected function getActions(): array
    {
        return [
            (Actions\CreateAction::make())
                ->label(__('filament.new-record', ['record' => $this->getModelLabel()])),
        ];
    }
}

<?php

namespace App\Filament\Resources\AcademicResource\Pages;

use App\Filament\Resources\AcademicResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcademics extends ListRecords
{
    protected static string $resource = AcademicResource::class;

    protected function getActions(): array
    {
        return [
            (Actions\CreateAction::make())
                ->label(__('filament.new-record', ['record' => $this->getModelLabel()])),
        ];
    }
}

<?php

namespace App\Filament\Resources\PortfolioAcamedicStudentAdvisorResource\Pages;

use App\Filament\Resources\PortfolioAcamedicStudentAdvisorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioAcamedicStudentAdvisors extends ListRecords
{
    protected static string $resource = PortfolioAcamedicStudentAdvisorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

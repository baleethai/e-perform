<?php

namespace App\Filament\Resources\PortfolioAcamedicStudentActivityAdvisorResource\Pages;

use App\Filament\Resources\PortfolioAcamedicStudentActivityAdvisorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioAcamedicStudentActivityAdvisors extends ListRecords
{
    protected static string $resource = PortfolioAcamedicStudentActivityAdvisorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

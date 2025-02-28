<?php

namespace App\Filament\Resources\PortfolioAcamedicStudentActivityAdvisorResource\Pages;

use App\Filament\Resources\PortfolioAcamedicStudentActivityAdvisorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioAcamedicStudentActivityAdvisor extends EditRecord
{
    protected static string $resource = PortfolioAcamedicStudentActivityAdvisorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

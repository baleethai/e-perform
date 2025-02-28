<?php

namespace App\Filament\Resources\PortfolioAcamedicStudentAdvisorResource\Pages;

use App\Filament\Resources\PortfolioAcamedicStudentAdvisorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioAcamedicStudentAdvisor extends EditRecord
{
    protected static string $resource = PortfolioAcamedicStudentAdvisorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

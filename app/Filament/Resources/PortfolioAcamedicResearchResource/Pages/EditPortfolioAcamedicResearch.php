<?php

namespace App\Filament\Resources\PortfolioAcamedicResearchResource\Pages;

use App\Filament\Resources\PortfolioAcamedicResearchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioAcamedicResearch extends EditRecord
{
    protected static string $resource = PortfolioAcamedicResearchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

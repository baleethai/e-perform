<?php

namespace App\Filament\Resources\PortfolioAcamedicOtherImpressedResource\Pages;

use App\Filament\Resources\PortfolioAcamedicOtherImpressedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioAcamedicOtherImpressed extends EditRecord
{
    protected static string $resource = PortfolioAcamedicOtherImpressedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

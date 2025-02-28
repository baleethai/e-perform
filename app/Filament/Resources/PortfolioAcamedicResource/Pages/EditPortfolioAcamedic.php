<?php

namespace App\Filament\Resources\PortfolioAcamedicResource\Pages;

use App\Filament\Resources\PortfolioAcamedicResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioAcamedic extends EditRecord
{
    protected static string $resource = PortfolioAcamedicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

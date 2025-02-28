<?php

namespace App\Filament\Resources\PortfolioAcamedicWorkResource\Pages;

use App\Filament\Resources\PortfolioAcamedicWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioAcamedicWork extends EditRecord
{
    protected static string $resource = PortfolioAcamedicWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

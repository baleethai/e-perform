<?php

namespace App\Filament\Resources\PortfolioAcamedicOtherWorkResource\Pages;

use App\Filament\Resources\PortfolioAcamedicOtherWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioAcamedicOtherWork extends EditRecord
{
    protected static string $resource = PortfolioAcamedicOtherWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PortfolioAcamedicOtherServiceResource\Pages;

use App\Filament\Resources\PortfolioAcamedicOtherServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioAcamedicOtherService extends EditRecord
{
    protected static string $resource = PortfolioAcamedicOtherServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PortfolioOperatingResource\Pages;

use App\Filament\Resources\PortfolioOperatingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioOperating extends EditRecord
{
    protected static string $resource = PortfolioOperatingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

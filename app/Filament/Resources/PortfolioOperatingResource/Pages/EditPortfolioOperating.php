<?php

namespace App\Filament\Resources\PortfolioOperatingResource\Pages;

use App\Filament\Resources\PortfolioOperatingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioOperating extends EditRecord
{
    protected static string $resource = PortfolioOperatingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

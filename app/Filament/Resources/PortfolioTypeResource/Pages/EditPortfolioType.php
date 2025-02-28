<?php

namespace App\Filament\Resources\PortfolioTypeResource\Pages;

use App\Filament\Resources\PortfolioTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioType extends EditRecord
{
    protected static string $resource = PortfolioTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

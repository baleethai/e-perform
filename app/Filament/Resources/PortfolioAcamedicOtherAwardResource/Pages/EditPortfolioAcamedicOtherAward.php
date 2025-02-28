<?php

namespace App\Filament\Resources\PortfolioAcamedicOtherAwardResource\Pages;

use App\Filament\Resources\PortfolioAcamedicOtherAwardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioAcamedicOtherAward extends EditRecord
{
    protected static string $resource = PortfolioAcamedicOtherAwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PortfolioAcamedicTeachingResource\Pages;

use App\Filament\Resources\PortfolioAcamedicTeachingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioAcamedicTeaching extends EditRecord
{
    protected static string $resource = PortfolioAcamedicTeachingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

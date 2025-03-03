<?php

namespace App\Filament\Resources\PortfolioAcademicResource\Pages;

use App\Filament\Resources\PortfolioAcademicResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioAcademic extends EditRecord
{
    protected static string $resource = PortfolioAcademicResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

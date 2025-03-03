<?php

namespace App\Filament\Resources\ReportPortfolioResource\Pages;

use App\Filament\Resources\ReportPortfolioResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReportPortfolio extends EditRecord
{
    protected static string $resource = ReportPortfolioResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

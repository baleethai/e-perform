<?php

namespace App\Filament\Widgets;

use App\Models\Academic;
use App\Models\Personnel;
use App\Models\Portfolio;
use App\Models\PortfolioAcademic;
use App\Models\PortfolioOperating;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getCards(): array
    {
        return [
            Card::make('จำนวนวิชาการ', Academic::count())
                ->descriptionIcon('heroicon-s-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Card::make('จำนวนบุคลากร', Personnel::count())
                ->descriptionIcon('heroicon-s-trending-down')
                ->chart([17, 16, 14, 15, 14, 13, 12])
                ->color('danger'),
            Card::make('ประมวลผลงานวิชาการ', PortfolioAcademic::count())
                ->descriptionIcon('heroicon-s-trending-down')
                ->chart([17, 16, 14, 15, 14, 13, 12])
                ->color('success'),
            Card::make('ประมวลผลงานปฏิบัติการ', PortfolioOperating::count())
                ->descriptionIcon('heroicon-s-trending-down')
                ->chart([17, 16, 14, 15, 14, 13, 12])
                ->color('success'),
        ];
    }
}

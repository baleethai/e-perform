<?php

namespace App\Filament\Widgets;

use App\Models\PortfolioAcademic;
use App\Models\PortfolioItem;
use App\Models\PortfolioOperating;
use Flowframe\Trend\Trend;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class PortfolioOperatingChart extends ApexChartWidget
{

    protected static ?int $sort = 1;
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'portfolioChart';

    protected function getHeading(): ?string
    {
        return 'เฉลี่ยประมวลผลงานปฏิบัติการ';
    }

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        // Totals per month
        $trend = Trend::model(PortfolioOperating::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'BasicBarChart',
                    'data' => $trend->pluck('aggregate')->toArray(),
                ],
            ],
            'xaxis' => [
                'categories' => ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'colors' => ['#6366f1'],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 3,
                    'horizontal' => true,
                ],
            ],
        ];
    }
}

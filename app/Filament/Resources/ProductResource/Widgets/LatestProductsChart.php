<?php

namespace App\Filament\Resources\ProductResource\Widgets;


use Filament\Widgets\ChartWidget;

class LatestProductsChart extends ChartWidget
{
    public string $title = 'Latest Products';

    public $type = 'line';


    public function getData(): array
    {
        return [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Products',
                    'data' => [65, 59, 80, 81, 56, 55, 40],
                    'fill' => false,
                    'borderColor' => 'rgb(75, 192, 192)',
                    'lineTension' => 0.1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
}

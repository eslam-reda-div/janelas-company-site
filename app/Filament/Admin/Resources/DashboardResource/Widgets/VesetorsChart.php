<?php

namespace App\Filament\Admin\Resources\DashboardResource\Widgets;

use App\Models\Visitors;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class VesetorsChart extends ChartWidget
{
    protected static ?string $heading = 'Visitors statistics';

    protected static ?string $pollingInterval = '5s';

    protected int|string|array $columnSpan = 'full';

    protected static string $color = 'primary';

    protected static ?string $maxHeight = '300px';

    public ?string $filter = 'today';

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }

    public function getDescription(): ?string
    {
        return 'The number of visitors per day.';
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $labels = [];
        $finalData = [];

        if ($activeFilter == 'today') {
            $labels = range(1, 24);
            $data = Visitors::where('date', '>', now()->startOfDay())->get()->map(function ($visitor) {
                $visitor->date = \Carbon\Carbon::parse($visitor->date)->format('G');

                return $visitor;
            })->toArray();
            $data = collect($data)->groupBy('date')->map(fn ($item) => $item->count())->toArray();

            //            dd($data);
            foreach ($labels as $label) {
                $finalData[] = $data[$label] ?? 0;
            }
        } elseif ($activeFilter == 'week') {
            $labels = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
            $data = Visitors::where('date', '>', now()->subWeek())->get()->map(function ($visitor) {
                $visitor->date = \Carbon\Carbon::parse($visitor->date)->format('l');

                return $visitor;
            })->toArray();
            $data = collect($data)->groupBy('date')->map(fn ($item) => $item->count())->toArray();

            foreach ($labels as $label) {
                $finalData[] = $data[$label] ?? 0;
            }
        } elseif ($activeFilter == 'month') {
            $labels = range(1, Carbon::now()->daysInMonth);
            $data = Visitors::where('date', '>', now()->subMonth())->get()->map(function ($visitor) {
                $visitor->date = \Carbon\Carbon::parse($visitor->date)->format('j');

                return $visitor;
            })->toArray();
            $data = collect($data)->groupBy('date')->map(fn ($item) => $item->count())->toArray();

            foreach ($labels as $label) {
                $finalData[] = $data[$label] ?? 0;
            }
        } elseif ($activeFilter == 'year') {
            $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            $data = Visitors::where('date', '>', now()->subYear())->get()->map(function ($visitor) {
                $visitor->date = \Carbon\Carbon::parse($visitor->date)->format('F');

                return $visitor;
            })->toArray();
            $data = collect($data)->groupBy('date')->map(fn ($item) => $item->count())->toArray();

            foreach ($labels as $label) {
                $finalData[] = $data[$label] ?? 0;
            }
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Visitors',
                    'data' => array_values($finalData),
                    'fill' => true,
                    'borderColor' => 'rgb(75, 192, 192)',
                    //                    'lineTension' => 1,
                    //                    'stepped' => '1',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

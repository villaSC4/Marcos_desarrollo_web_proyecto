<?php

namespace App\Filament\Widgets;

use App\Models\Colaborador;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class EvolucionColaboradores extends ChartWidget
{
    protected static ?string $heading = 'Nuevos Colaboradores por Mes';
    
    protected int | string | array $columnSpan = 'full';

    protected function getFilters(): ?array
    {
        return [
            '3_meses' => 'Últimos 3 meses',
            '2_meses' => 'Últimos 2 meses',
            'mes_actual' => 'Mes actual',
        ];
    }

    protected function getDefaultFilter(): ?string
    {
        return '3_meses';
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $fechaInicio = match ($activeFilter) {
            'mes_actual' => Carbon::now()->startOfMonth(),
            '2_meses' => Carbon::now()->subMonths(1)->startOfMonth(),
            default => Carbon::now()->subMonths(2)->startOfMonth(),
        };

        $fechaFin = Carbon::now()->endOfMonth();

        $resultados = Colaborador::whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->get()
            ->groupBy(function ($colaborador) {
                return $colaborador->created_at->format('Y-%m');
            })
            ->map(function ($mes) {
                return $mes->count();
            })
            ->toArray();

        $labels = [];
        $data = [];

        $periodo = \Carbon\CarbonPeriod::create($fechaInicio, '1 month', $fechaFin);

        foreach ($periodo as $fecha) {
            $claveMes = $fecha->format('Y-%m');
            
            $labels[] = ucfirst($fecha->translatedFormat('F Y'));
            $data[] = $resultados[$claveMes] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Ciudadanos Registrados',
                    'data' => $data,
                    'backgroundColor' => 'rgba(34, 197, 94, 0.2)',
                    'borderColor' => '#22c55e',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}